<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_47b554ed054502e761454dbf8286b0b0da5eb612def4fa7687541d73b9d4c24f extends Twig_Template
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
        $__internal_b1068b4b3054a8651bfb9cb12d6b9bb9b65f6e2a44b437213afb4f18f5a998f7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b1068b4b3054a8651bfb9cb12d6b9bb9b65f6e2a44b437213afb4f18f5a998f7->enter($__internal_b1068b4b3054a8651bfb9cb12d6b9bb9b65f6e2a44b437213afb4f18f5a998f7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b1068b4b3054a8651bfb9cb12d6b9bb9b65f6e2a44b437213afb4f18f5a998f7->leave($__internal_b1068b4b3054a8651bfb9cb12d6b9bb9b65f6e2a44b437213afb4f18f5a998f7_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4e4b398c5f81ea40f3f4b9e57620d7ad4cd928d07e17fe8fb81e7974e750e6b3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4e4b398c5f81ea40f3f4b9e57620d7ad4cd928d07e17fe8fb81e7974e750e6b3->enter($__internal_4e4b398c5f81ea40f3f4b9e57620d7ad4cd928d07e17fe8fb81e7974e750e6b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4e4b398c5f81ea40f3f4b9e57620d7ad4cd928d07e17fe8fb81e7974e750e6b3->leave($__internal_4e4b398c5f81ea40f3f4b9e57620d7ad4cd928d07e17fe8fb81e7974e750e6b3_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_33ba7ac8419471664be015f28500a1323cd99d5580949b2e50c580fd6923a416 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_33ba7ac8419471664be015f28500a1323cd99d5580949b2e50c580fd6923a416->enter($__internal_33ba7ac8419471664be015f28500a1323cd99d5580949b2e50c580fd6923a416_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_33ba7ac8419471664be015f28500a1323cd99d5580949b2e50c580fd6923a416->leave($__internal_33ba7ac8419471664be015f28500a1323cd99d5580949b2e50c580fd6923a416_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_13983dd8e3a03f23bfc678d8d084c8015495b7cc55f1cfbdd3b812025fe547ab = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_13983dd8e3a03f23bfc678d8d084c8015495b7cc55f1cfbdd3b812025fe547ab->enter($__internal_13983dd8e3a03f23bfc678d8d084c8015495b7cc55f1cfbdd3b812025fe547ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_13983dd8e3a03f23bfc678d8d084c8015495b7cc55f1cfbdd3b812025fe547ab->leave($__internal_13983dd8e3a03f23bfc678d8d084c8015495b7cc55f1cfbdd3b812025fe547ab_prof);

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

    public function getSource()
    {
        return "{% extends '@WebProfiler/Profiler/layout.html.twig' %}

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
";
    }
}
