<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_12678ccbe69ae1a3848e3f5ae47fdc9fd2b5e380e6c96953400b29e0876f414a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_d81177886bb9f42bf91bcfbbbac7ba722e273a507389bef22cbfc2eeaf391e79 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d81177886bb9f42bf91bcfbbbac7ba722e273a507389bef22cbfc2eeaf391e79->enter($__internal_d81177886bb9f42bf91bcfbbbac7ba722e273a507389bef22cbfc2eeaf391e79_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d81177886bb9f42bf91bcfbbbac7ba722e273a507389bef22cbfc2eeaf391e79->leave($__internal_d81177886bb9f42bf91bcfbbbac7ba722e273a507389bef22cbfc2eeaf391e79_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_f7b482f92389f368bcca22c49da37449417ceddcbbfc12ac2ab61835b5c28132 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f7b482f92389f368bcca22c49da37449417ceddcbbfc12ac2ab61835b5c28132->enter($__internal_f7b482f92389f368bcca22c49da37449417ceddcbbfc12ac2ab61835b5c28132_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_f7b482f92389f368bcca22c49da37449417ceddcbbfc12ac2ab61835b5c28132->leave($__internal_f7b482f92389f368bcca22c49da37449417ceddcbbfc12ac2ab61835b5c28132_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_0bdd816a108e75a7951f3f74dbc7598c8fcf7fd00bf394410abdc30c0af2ccd7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0bdd816a108e75a7951f3f74dbc7598c8fcf7fd00bf394410abdc30c0af2ccd7->enter($__internal_0bdd816a108e75a7951f3f74dbc7598c8fcf7fd00bf394410abdc30c0af2ccd7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_0bdd816a108e75a7951f3f74dbc7598c8fcf7fd00bf394410abdc30c0af2ccd7->leave($__internal_0bdd816a108e75a7951f3f74dbc7598c8fcf7fd00bf394410abdc30c0af2ccd7_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_eff4409dbe08a436e60820984843ad72222894b27a3cdccf759a59f328bfaf8b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_eff4409dbe08a436e60820984843ad72222894b27a3cdccf759a59f328bfaf8b->enter($__internal_eff4409dbe08a436e60820984843ad72222894b27a3cdccf759a59f328bfaf8b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_eff4409dbe08a436e60820984843ad72222894b27a3cdccf759a59f328bfaf8b->leave($__internal_eff4409dbe08a436e60820984843ad72222894b27a3cdccf759a59f328bfaf8b_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
";
    }
}
