<?php

namespace Source\Core;

use Source\Support\Log;
use Source\Support\Message;
use Exception;
use PDO;
use PDOException;
use stdClass;

/**
 * Class Model
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package Source\Core
 */
abstract class Model
{
    use CrudTrait;

    /** @var string $entity database table */
    private string $entity;

    /** @var string|null $primary table primary key field */
    private string $primary;

    /** @var array|null $required table required fields */
    private ?array $required;

    /** @var bool $timestamps control created and updated at */
    private bool $timestamps;

    /** @var string */
    protected $statement;

    /** @var string */
    protected $params;

    /** @var string */
    protected $group;

    /** @var string */
    protected $order;

    /** @var int */
    protected $limit;

    /** @var int */
    protected $offset;

    /** @var \PDOException|null */
    protected $fail;

    /** @var Message|null */
    protected $message;

    /** @var object|null */
    protected $data;

    /**
     * Model constructor.
     *
     * @param string $entity
     * @param array  $required
     * @param string $primary
     * @param bool   $timestamps
     */
    public function __construct(string $entity, array $required, string $primary = 'id', bool $timestamps = true)
    {
        $this->entity = $entity;
        $this->primary = $primary;
        $this->required = $required;
        $this->timestamps = $timestamps;
        $this->message = new Message();
    }

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        if (empty($this->data)) {
            $this->data = new stdClass();
        }

        $this->data->$name = $value;
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public function __isset($name)
    {
        return isset($this->data->$name);
    }

    /**
     * @param $name
     *
     * @return string|null
     */
    public function __get($name)
    {
        return ($this->data->$name ?? null);
    }

    /**
     * @return object|null
     */
    public function data(): ?object
    {
        return $this->data;
    }

    /**
     * @return PDOException|Exception|null
     */
    public function fail()
    {
        return $this->fail;
    }

    /**
     * @return Message|null
     */
    public function message(): ?Message
    {
        return $this->message;
    }

    /**
     * @param string|null $terms
     * @param string|null $params
     * @param string      $columns
     *
     * @return Model
     */
    public function find(?string $terms = null, ?string $params = null, string $columns = "*"): Model
    {
        if ($terms) {
            $this->statement = "SELECT {$columns} FROM {$this->entity} WHERE {$terms}";
            parse_str($params, $this->params);
            return $this;
        }

        $this->statement = "SELECT {$columns} FROM {$this->entity}";
        return $this;
    }

    /**
     * @param int    $id
     * @param string $columns
     *
     * @return Model|null
     */
    public function findById(int $id, string $columns = "*"): ?Model
    {
        $find = $this->find($this->primary . " = :id", "id={$id}", $columns);
        return $find->fetch();
    }

    /**
     * @param string $column
     *
     * @return Model|null
     */
    public function group(string $column): ?Model
    {
        $this->group = " GROUP BY {$column}";
        return $this;
    }

    /**
     * @param string $columnOrder
     *
     * @return Model|null
     */
    public function order(string $columnOrder): ?Model
    {
        $this->order = " ORDER BY {$columnOrder}";
        return $this;
    }

    /**
     * @param int $limit
     *
     * @return Model|null
     */
    public function limit(int $limit): ?Model
    {
        $this->limit = " LIMIT {$limit}";
        return $this;
    }

    /**
     * @param int $offset
     *
     * @return Model|null
     */
    public function offset(int $offset): ?Model
    {
        $this->offset = " OFFSET {$offset}";
        return $this;
    }

    /**
     * @param bool $all
     *
     * @return array|mixed|null
     */
    public function fetch(bool $all = false)
    {
        try {
            $stmt = Connect::getInstance()->prepare($this->statement . $this->group . $this->order . $this->limit . $this->offset);
            $stmt->execute($this->params);

            if (!$stmt->rowCount()) {
                return null;
            }

            if ($all) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
            }

            return $stmt->fetchObject(static::class);
        } catch (PDOException $exception) {
            (new Log(static::class))->error("Line: {$exception->getLine()} - File: {$exception->getFile()} - {$exception->getMessage()}");
            $this->fail = $exception;
            return null;
        }
    }

    /**
     * @return int
     */
    public function count(): int
    {
        $stmt = Connect::getInstance()->prepare($this->statement);
        $stmt->execute($this->params);
        return $stmt->rowCount();
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        $primary = $this->primary;
        $id = null;

        try {
            if (!$this->required()) {
                throw new Exception("Preencha os campos necessários");
            }

            /** Update */
            if (!empty($this->data->$primary)) {
                $id = $this->data->$primary;
                $this->update($this->safe(), $this->primary . " = :id", "id={$id}");
            }

            /** Create */
            if (empty($this->data->$primary)) {
                $id = $this->create($this->safe());
            }

            if (!$id) {
                return false;
            }

            $this->data = $this->findById($id)->data();
            return true;
        } catch (Exception $exception) {
            (new Log(static::class))->error("Line: {$exception->getLine()} - File: {$exception->getFile()} - {$exception->getMessage()}");
            $this->fail = $exception;
            return false;
        }
    }

    /**
     * Remove o registro filtrando pelo campo primário
     * @return bool
     */
    public function destroy(): bool
    {
        $primary = $this->primary;
        $id = $this->data->$primary;

        if (empty($id) || empty($this->data)) {
            return false;
        }

        return $this->delete($this->primary . " = :id", "id={$id}");
    }

    /**
     * Verifica se os campos obrigatórios foram preenchidos
     * @return bool
     */
    protected function required(): bool
    {
        $data = (array)$this->data();
        foreach ($this->required as $field) {
            if (empty($data[$field])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Retorna os dados que devem ser salvos ignorando o campo primário
     * @return array|null
     */
    protected function safe(): ?array
    {
        $safe = (array)$this->data;
        unset($safe[$this->primary]);

        return $safe;
    }
}