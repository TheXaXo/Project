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
        $__internal_4d60d55ff6bd2b82513646f9f57dbd5ebfe80169ae62d50936cb5825a38d3d66 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4d60d55ff6bd2b82513646f9f57dbd5ebfe80169ae62d50936cb5825a38d3d66->enter($__internal_4d60d55ff6bd2b82513646f9f57dbd5ebfe80169ae62d50936cb5825a38d3d66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4d60d55ff6bd2b82513646f9f57dbd5ebfe80169ae62d50936cb5825a38d3d66->leave($__internal_4d60d55ff6bd2b82513646f9f57dbd5ebfe80169ae62d50936cb5825a38d3d66_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_5bf66752e374c999a655d6bfb6a0d5324b24cff846d88b123feb9e97e548f07e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5bf66752e374c999a655d6bfb6a0d5324b24cff846d88b123feb9e97e548f07e->enter($__internal_5bf66752e374c999a655d6bfb6a0d5324b24cff846d88b123feb9e97e548f07e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_5bf66752e374c999a655d6bfb6a0d5324b24cff846d88b123feb9e97e548f07e->leave($__internal_5bf66752e374c999a655d6bfb6a0d5324b24cff846d88b123feb9e97e548f07e_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_003110b92365e4d6168e830f9d5ac8251f43c481e67548246de799f2b909a3d1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_003110b92365e4d6168e830f9d5ac8251f43c481e67548246de799f2b909a3d1->enter($__internal_003110b92365e4d6168e830f9d5ac8251f43c481e67548246de799f2b909a3d1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_003110b92365e4d6168e830f9d5ac8251f43c481e67548246de799f2b909a3d1->leave($__internal_003110b92365e4d6168e830f9d5ac8251f43c481e67548246de799f2b909a3d1_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_17f407a77b173b5d071368e5b9450c729789803ad59f909672be58e31c8959bd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_17f407a77b173b5d071368e5b9450c729789803ad59f909672be58e31c8959bd->enter($__internal_17f407a77b173b5d071368e5b9450c729789803ad59f909672be58e31c8959bd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_17f407a77b173b5d071368e5b9450c729789803ad59f909672be58e31c8959bd->leave($__internal_17f407a77b173b5d071368e5b9450c729789803ad59f909672be58e31c8959bd_prof);

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
