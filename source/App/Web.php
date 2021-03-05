<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Models\User;
use Source\Support\Seo;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class App
 * @author William Alvares <william.alvares@wapstore.com.br>
 * @package Source\App
 */
class Web extends Controller
{
    /**
     * @return false|string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function head()
    {
        $this->replaces["header"] = $this->header();

        $seo = new Seo();
        $this->replaces["schema"] = $seo->getSchema();
        $this->replaces["seo"] = $seo->getSeo()->render();

        return $this->view->render("head", $this->replaces);
    }

    /**
     * @return false|string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function header()
    {
        return $this->view->render("header", $this->replaces);
    }

    /**
     * @return false|string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function footer()
    {
        return $this->view->render("footer", $this->replaces);
    }

    /**
     * SITE HOME
     */
    public function home(): void
    {
        $this->replaces["head"] = $this->head();
        $this->replaces["footer"] = $this->footer();

        $userId = filter_input(INPUT_GET, "id") ?? 0;
        if ($userId) {
            $this->replaces["user_id"] = $userId;
            $this->replaces["user"] = (new User())->findById($userId);
        }

        $this->replaces["users"] = (new User())->find()->limit(5)->fetch(true);

        echo $this->view->render("home", $this->replaces);
    }

    /**
     * Responsável por criar e atualizar usuários
     * @param array|null $data
     * @Route("/user/add", methods={"POST"})
     *
     * @throws \Exception
     */
    public function user(?array $data): void
    {
        if (!empty($data['csrf'])) {
            if (!csrf_verify($data)) {
                $json['message'] = $this->message->error("Erro ao enviar, favor use o formulário")->render();
                echo json_encode($json);
                return;
            }

            $user = (empty($data["id"]) ? new User() : (new User())->findById($data["id"]));

            if (empty($user)) {
                $json['message'] = $this->message->error("Usuário não encontrado")->render();
                echo json_encode($json);
                return;
            }

            if (!empty($_FILES["thumb"])) {
                $file = $_FILES["thumb"];
                $upload = new Upload();

                if ($user->thumb()) {
                    (new Thumb())->flush("storage/{$user->thumb}");
                    $upload->remove("storage/{$user->thumb}");
                }

                if (!$user->thumb = $upload->image($file, "{$user->first_name} {$user->last_name} " . time(), 360)) {
                    $json["message"] = $upload->message()->before("Ooops {$user->first_name}! ")->after(".")->render();
                    echo json_encode($json);
                    return;
                }
            }

            $user->first_name = $data["first_name"];
            $user->last_name = $data["last_name"];
            $user->email = $data["email"];
            $user->password = $data["password"] ?: $user->password;
            $user->document = preg_replace("/[^0-9]/", "", $data["document"]);
            $user->genre = $data["genre"];

            if ($user->save()) {
                $json['redirect'] = url();
                $json['message'] = $user->message()->success("Usuário salvo com sucesso.")->render();
            } else {
                $json['message'] = $user->message()->before("Ooops! ")->render();
            }

            echo json_encode($json);
        }
    }

    /**
     * @param array|null $data
     */
    public function remove_user(?array $data)
    {
        $user = (new User())->findById($data["id"]);
        if (empty($user)) {
            $json["message"] = $this->message->warning("Usuário não encontrado.")->render();
            echo json_encode($json);
            return;
        }

        if ($user->thumb()) {
            (new Thumb())->flush("storage/{$user->thumb}");
            (new Upload())->remove("storage/{$user->thumb}");
        }

        if ($user->destroy()) {
            $json['success'] = true;
            $json["message"] = $this->message->success("Usuário removido com sucesso.")->render();
            echo json_encode($json);
        }
    }

    /**
     * @param array|null $data
     *
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function error(?array $data)
    {
        $this->replaces = array();
        $this->replaces["head"] = $this->head();
        $this->replaces["footer"] = $this->footer();

        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está disponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:william.alvares@wapstore.com.br";
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indisponível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;
        }

        $this->replaces["erro"] = $error;

        echo $this->view->render("404", $this->replaces);
    }
}