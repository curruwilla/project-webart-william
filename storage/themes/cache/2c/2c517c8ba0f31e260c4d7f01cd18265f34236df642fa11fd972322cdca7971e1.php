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

/* head.twig */
class __TwigTemplate_eda4f980f2502b3f6627805447be60c615769084c216cfcc190975a2477b2231 extends Template
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
        echo "<!DOCTYPE html>
<!--[if IE 8 ]>
<html class=\"ie ie8\" lang=\"pt-br\"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang=\"pt-br\" ";
        // line 5
        if (($context["schema"] ?? null)) {
            echo "itemscope itemtype=\"https://schema.org/";
            echo twig_escape_filter($this->env, ($context["schema"] ?? null), "html", null, true);
            echo "\"";
        }
        echo "><!--<![endif]-->
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=5\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <link rel=\"base\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["base"] ?? null), "html", null, true);
        echo "\"/>

    ";
        // line 12
        echo ($context["seo"] ?? null);
        echo "

    <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/css/jquery-ui.min.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/css/style.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/css/message.css\">
</head>

<body>

";
        // line 23
        echo ($context["header"] ?? null);
    }

    public function getTemplateName()
    {
        return "head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 23,  78 => 18,  74 => 17,  69 => 15,  65 => 14,  60 => 12,  55 => 10,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "head.twig", "C:\\xampp7.4.9\\htdocs\\webart\\projeto\\themes\\web\\head.twig");
    }
}
