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

/* 404.twig */
class __TwigTemplate_412a0af02b11979f8b07b32de93055c17773f19d970ca7906408be8642a1e1fd extends Template
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

<div class=\"container mt-5\">
    <h1>";
        // line 4
        (((twig_get_attribute($this->env, $this->source, ($context["erro"] ?? null), "code", [], "any", true, true, false, 4) &&  !(null === twig_get_attribute($this->env, $this->source, ($context["erro"] ?? null), "code", [], "any", false, false, false, 4)))) ? (print (twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["erro"] ?? null), "code", [], "any", false, false, false, 4), "html", null, true))) : (print ("404")));
        echo "</h1>
    <p>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["erro"] ?? null), "message", [], "any", false, false, false, 5), "html", null, true);
        echo "</p>
</div>

";
        // line 8
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "404.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 8,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "404.twig", "C:\\xampp7.4.9\\htdocs\\webart\\projeto\\themes\\web\\404.twig");
    }
}
