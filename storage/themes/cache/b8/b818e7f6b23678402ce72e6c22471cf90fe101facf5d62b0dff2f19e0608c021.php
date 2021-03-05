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
class __TwigTemplate_1827224b734526a196e12e239825ae8c63affa4a6819225816c05841ffbd7cfd extends Template
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
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/js/jquery-3.5.1.min.js\"></script>
<script src=\"";
        // line 2
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/js/jquery.form.js\"></script>
<script src=\"";
        // line 3
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/js/jquery-ui.min.js\"></script>
<script src=\"";
        // line 4
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/js/bootstrap.min.js\"></script>
<script src=\"";
        // line 5
        echo twig_escape_filter($this->env, ($context["theme_path"] ?? null), "html", null, true);
        echo "/assets/js/scripts.js\"></script>

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
        return array (  54 => 5,  50 => 4,  46 => 3,  42 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.twig", "C:\\xampp7.4.9\\htdocs\\webart\\projeto\\themes\\web\\footer.twig");
    }
}
