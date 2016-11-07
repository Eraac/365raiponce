<?php

/* NelmioApiDocBundle::Components/motd.html.twig */
class __TwigTemplate_03b7974245892b50dea259b2b6449b89b60410b9917d44df6e7941bc4bda55b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_631180aed3d29c81bd376bb9875a754d01a4574b2f7f8fdd264581fb1bc6c78d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_631180aed3d29c81bd376bb9875a754d01a4574b2f7f8fdd264581fb1bc6c78d->enter($__internal_631180aed3d29c81bd376bb9875a754d01a4574b2f7f8fdd264581fb1bc6c78d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "NelmioApiDocBundle::Components/motd.html.twig"));

        // line 1
        echo "<div class=\"motd\"></div>
";
        
        $__internal_631180aed3d29c81bd376bb9875a754d01a4574b2f7f8fdd264581fb1bc6c78d->leave($__internal_631180aed3d29c81bd376bb9875a754d01a4574b2f7f8fdd264581fb1bc6c78d_prof);

    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::Components/motd.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"motd\"></div>
", "NelmioApiDocBundle::Components/motd.html.twig", "/Users/kevin/Code/365raiponce/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views/Components/motd.html.twig");
    }
}
