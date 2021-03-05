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

/* footer.twig */
class __TwigTemplate_a28787f6c95d4f59ac1d053d1b86d1a5a2370853a88cc7e26c2f2bb127d5d5aa extends Template
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, ($context["base"] ?? null), "html", null, true);
        echo "/_cdn/jquery-3.5.1.min.js\"></script>
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/scripts/jquery-ui.min.js\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/scripts/bootstrap.min.js\"></script>

</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.twig", "C:\\xampp7.4.9\\htdocs\\webart\\projeto\\themes\\web\\footer.twig");
    }
}
