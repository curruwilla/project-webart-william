<?php

namespace Source\Support;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;

/**
 * Class Log - Responsável por gerar logs de exceptions
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package _app\Core
 */
class Log
{
    /**
     * @var Logger
     */
    private Logger $logger;

    /**
     * Log constructor.
     *
     * @param string $name
     *
     * @throws \Exception
     */
    public function __construct(string $name)
    {
        $dateFormat = "d/m/Y H:i";
        $output = "%datetime% | %channel% | %level_name% | %message% | %context% | %extra%\n";
        $formatter = new LineFormatter($output, $dateFormat, true, true);

        $stream = new StreamHandler(__DIR__ . '/../../storage/logs/logs.log', Logger::WARNING);
        $stream->setFormatter($formatter);

        $this->logger = new Logger($name);
        $this->logger->pushHandler($stream);
    }

    /**
     * @param string $message
     * @param array  $content
     *
     * @return $this
     */
    public function info(string $message, array $content = []): Log
    {
        $this->logger->info($message, $content);
        return $this;
    }

    /**
     * @param string $message
     * @param array  $content
     *
     * @return $this
     */
    public function error(string $message, array $content = []): Log
    {
        $this->logger->error($message, $content);
        return $this;
    }

    /**
     * @param string $message
     * @param array  $content
     *
     * @return $this
     */
    public function warning(string $message, array $content = []): Log
    {
        $this->logger->warning($message, $content);
        return $this;
    }
}