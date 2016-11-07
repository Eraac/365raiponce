<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_8f5ce82c7523d29d0af4d7db1a97e0775981008f3b39c34ba939ba8a0f27492f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f701a6d56638ff51972ff069d41ded1ea5ce75e1b038d1f89466410103620bf4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f701a6d56638ff51972ff069d41ded1ea5ce75e1b038d1f89466410103620bf4->enter($__internal_f701a6d56638ff51972ff069d41ded1ea5ce75e1b038d1f89466410103620bf4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f701a6d56638ff51972ff069d41ded1ea5ce75e1b038d1f89466410103620bf4->leave($__internal_f701a6d56638ff51972ff069d41ded1ea5ce75e1b038d1f89466410103620bf4_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4b29689a9000f932096ffe21d6f0d21e6a88c744d4521d619d7c893bf7ce6c2b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4b29689a9000f932096ffe21d6f0d21e6a88c744d4521d619d7c893bf7ce6c2b->enter($__internal_4b29689a9000f932096ffe21d6f0d21e6a88c744d4521d619d7c893bf7ce6c2b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        
        $__internal_4b29689a9000f932096ffe21d6f0d21e6a88c744d4521d619d7c893bf7ce6c2b->leave($__internal_4b29689a9000f932096ffe21d6f0d21e6a88c744d4521d619d7c893bf7ce6c2b_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_8a078c0ba10133bd953540e63803b5aa99908aa53fccbaed1cdc882397cefcd6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a078c0ba10133bd953540e63803b5aa99908aa53fccbaed1cdc882397cefcd6->enter($__internal_8a078c0ba10133bd953540e63803b5aa99908aa53fccbaed1cdc882397cefcd6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_8a078c0ba10133bd953540e63803b5aa99908aa53fccbaed1cdc882397cefcd6->leave($__internal_8a078c0ba10133bd953540e63803b5aa99908aa53fccbaed1cdc882397cefcd6_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e5c6be22b2227ad63b576b76a6f6d65d137c1ce70449330cea0a4788e8cff227 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e5c6be22b2227ad63b576b76a6f6d65d137c1ce70449330cea0a4788e8cff227->enter($__internal_e5c6be22b2227ad63b576b76a6f6d65d137c1ce70449330cea0a4788e8cff227_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e5c6be22b2227ad63b576b76a6f6d65d137c1ce70449330cea0a4788e8cff227->leave($__internal_e5c6be22b2227ad63b576b76a6f6d65d137c1ce70449330cea0a4788e8cff227_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "@WebProfiler/Collector/router.html.twig", "/Users/kevin/Code/365raiponce/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
