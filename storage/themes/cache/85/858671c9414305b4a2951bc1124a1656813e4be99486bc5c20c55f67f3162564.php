<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* home.twig */
class __TwigTemplate_3665741f093c57a4e06d3286c18c9098da086fc8d59c15a608b8a06539600382 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo ($context["head"] ?? null);
        echo "

<div class=\"container\">
    <div class=\"row d-flex justify-content-center\">
        <div class=\"col-sm-12 col-md-7\">
            <div class=\"block-content\">
                <h1>Cadastro de usuários:</h1>
                <form class=\"add_user\" action=\"";
        // line 8
        echo twig_escape_filter($this->env, ($context["base"] ?? null), "html", null, true);
        echo "/user/add\" method=\"post\" enctype=\"multipart/form-data\">
                    <div class=\"ajax_response\">";
        // line 9
        echo twig_escape_filter($this->env, ($context["flash"] ?? null), "html", null, true);
        echo "</div>
                    ";
        // line 10
        echo ($context["csrf_input"] ?? null);
        echo "

                    ";
        // line 12
        if (($context["user_id"] ?? null)) {
            // line 13
            echo "                        <input type=\"hidden\" name=\"id\" value=\"";
            echo twig_escape_filter($this->env, ($context["user_id"] ?? null), "html", null, true);
            echo "\">
                    ";
        }
        // line 15
        echo "
                    ";
        // line 16
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "thumb", [], "any", false, false, false, 16)) {
            // line 17
            echo "                        <img class=\"img-thumbnail mb-3\" src=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('image')->getCallable(), [twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "thumb", [], "method", false, false, false, 17), 150]), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 17), "html", null, true);
            echo "\">
                    ";
        }
        // line 19
        echo "
                    <div class=\"form-group\">
                        <label for=\"thumb\">Foto</label>
                        <input type=\"file\" class=\"form-control-file\" name=\"thumb\" id=\"thumb\">
                    </div>

                    <div class=\"row\">
                        <div class=\"col\">
                            <div class=\"form-group\">
                                <label for=\"first_name\">Primeiro nome</label>
                                <input type=\"text\" class=\"form-control\" name=\"first_name\" id=\"first_name\"  value=\"";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "first_name", [], "any", false, false, false, 29), "html", null, true);
        echo "\" required>
                            </div>
                        </div>
                        <div class=\"col\">
                            <div class=\"form-group\">
                                <label for=\"last_name\">Sobrenome</label>
                                <input type=\"text\" class=\"form-control\" name=\"last_name\" id=\"last_name\" value=\"";
        // line 35
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "last_name", [], "any", false, false, false, 35), "html", null, true);
        echo "\">
                            </div>
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"email\">Email</label>
                        <input type=\"email\" class=\"form-control\" name=\"email\" id=\"email\" value=\"";
        // line 42
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 42), "html", null, true);
        echo "\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"password\">Senha</label>
                        <input type=\"password\" class=\"form-control\" name=\"password\" id=\"password\">
                    </div>

                    <div class=\"form-group\">
                        <label for=\"genre\">Gênero</label>
                        <select class=\"form-control\" name=\"genre\" id=\"genre\">
                            <option value=\"male\" ";
        // line 53
        echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "genre", [], "any", false, false, false, 53), "male"))) ? ("selected") : (""));
        echo ">Masculino</option>
                            <option value=\"female\" ";
        // line 54
        echo (((0 === twig_compare(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "genre", [], "any", false, false, false, 54), "female"))) ? ("selected") : (""));
        echo ">Feminino</option>
                        </select>
                    </div>

                    <div class=\"form-group\">
                        <label for=\"document\">Documento</label>
                        <input type=\"text\" class=\"form-control\" name=\"document\" id=\"document\" value=\"";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "document", [], "any", false, false, false, 60), "html", null, true);
        echo "\">
                    </div>

                    <button type=\"submit\" class=\"btn btn-success\">Salvar</button>
                </form>
            </div>

            ";
        // line 67
        if (($context["users"] ?? null)) {
            // line 68
            echo "                <div class=\"block-content\">
                    <h1>Lista de usuários:</h1>
                    <table class=\"table table-bordered\">
                        <thead>
                        <tr>
                            <th scope=\"col\">#</th>
                            <th scope=\"col\">Nome</th>
                            <th scope=\"col\">Email</th>
                            <th scope=\"col\">Documento</th>
                            <th scope=\"col\">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        ";
            // line 81
            $context["i"] = 0;
            // line 82
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 83
                echo "                            ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 84
                echo "                            <tr class=\"remove_user\" id=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 84), "html", null, true);
                echo "\">
                                <th scope=\"row\">";
                // line 85
                echo twig_escape_filter($this->env, ($context["i"] ?? null), "html", null, true);
                echo "</th>
                                <td>";
                // line 86
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "fullName", [], "any", false, false, false, 86), "html", null, true);
                echo "</td>
                                <td>";
                // line 87
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 87), "html", null, true);
                echo "</td>
                                <td>";
                // line 88
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "document", [], "any", false, false, false, 88), "html", null, true);
                echo "</td>
                                <td width=\"20%\">
                                    <a href=\"";
                // line 90
                echo twig_escape_filter($this->env, ($context["base"] ?? null), "html", null, true);
                echo "/&id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 90), "html", null, true);
                echo "\" title=\"Editar Usuário\" class=\"btn btn-sm btn-info\"><i class=\"bi bi-pencil\"></i></a>
                                    <span rel=\"remove_user\" id=\"";
                // line 91
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 91), "html", null, true);
                echo "\" title=\"Remover Usuário\" class=\"btn btn-sm btn-warning delete_action\"><i class=\"bi bi-x-circle\"></i></span>
                                    <span rel=\"remove_user\" id=\"";
                // line 92
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 92), "html", null, true);
                echo "\" callback=\"";
                echo twig_escape_filter($this->env, ($context["base"] ?? null), "html", null, true);
                echo "/user/remove/";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 92), "html", null, true);
                echo "\" title=\"Confirmar remoção Usuário\" class=\"btn btn-sm btn-danger delete_action_confirm\" style=\"display: none\"><i class=\"bi bi-x-circle\"></i></span>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 96
            echo "                        </tbody>
                    </table>
                </div>
            ";
        }
        // line 100
        echo "
        </div>
    </div>
</div>

<div class=\"ajax_load\">
    <div class=\"ajax_load_box\">
        <div class=\"ajax_load_box_circle\"></div>
        <p class=\"ajax_load_box_title\">Aguarde, carregando...</p>
    </div>
</div>

";
        // line 112
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  242 => 112,  228 => 100,  222 => 96,  208 => 92,  204 => 91,  198 => 90,  193 => 88,  189 => 87,  185 => 86,  181 => 85,  176 => 84,  173 => 83,  168 => 82,  166 => 81,  151 => 68,  149 => 67,  139 => 60,  130 => 54,  126 => 53,  112 => 42,  102 => 35,  93 => 29,  81 => 19,  73 => 17,  71 => 16,  68 => 15,  62 => 13,  60 => 12,  55 => 10,  51 => 9,  47 => 8,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "home.twig", "C:\\xampp7.4.9\\htdocs\\webart\\projeto\\themes\\web\\home.twig");
    }
}
