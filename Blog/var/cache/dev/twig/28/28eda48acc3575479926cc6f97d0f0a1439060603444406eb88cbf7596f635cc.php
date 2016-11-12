<?php

/* user/profile.html.twig */
class __TwigTemplate_8879fda4ef165e25ed2b8be0ebdd76507b86518b65d0db64173308ab046e2a13 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "user/profile.html.twig", 1);
        $this->blocks = array(
            'body_id' => array($this, 'block_body_id'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_39dec54da52ef09c898c0768d798187391de77bf6eaf32704d991d5f3f04b2e3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_39dec54da52ef09c898c0768d798187391de77bf6eaf32704d991d5f3f04b2e3->enter($__internal_39dec54da52ef09c898c0768d798187391de77bf6eaf32704d991d5f3f04b2e3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "user/profile.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_39dec54da52ef09c898c0768d798187391de77bf6eaf32704d991d5f3f04b2e3->leave($__internal_39dec54da52ef09c898c0768d798187391de77bf6eaf32704d991d5f3f04b2e3_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_5cc7c7770a02c9261e3045a7b11f36632efa84b18901634331ed107a642cb4a9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5cc7c7770a02c9261e3045a7b11f36632efa84b18901634331ed107a642cb4a9->enter($__internal_5cc7c7770a02c9261e3045a7b11f36632efa84b18901634331ed107a642cb4a9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "profile";
        
        $__internal_5cc7c7770a02c9261e3045a7b11f36632efa84b18901634331ed107a642cb4a9->leave($__internal_5cc7c7770a02c9261e3045a7b11f36632efa84b18901634331ed107a642cb4a9_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_82b2ecb28b3d0bea4a86026f97f659a83befffbaf5dbdae3bf3df91179d56138 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_82b2ecb28b3d0bea4a86026f97f659a83befffbaf5dbdae3bf3df91179d56138->enter($__internal_82b2ecb28b3d0bea4a86026f97f659a83befffbaf5dbdae3bf3df91179d56138_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <div>
        ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
        echo "
        <br>
        ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName", array()), "html", null, true);
        echo "
    </div>
";
        
        $__internal_82b2ecb28b3d0bea4a86026f97f659a83befffbaf5dbdae3bf3df91179d56138->leave($__internal_82b2ecb28b3d0bea4a86026f97f659a83befffbaf5dbdae3bf3df91179d56138_prof);

    }

    public function getTemplateName()
    {
        return "user/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 9,  56 => 7,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block body_id 'profile' %}

{% block main %}
    <div>
        {{ user.email }}
        <br>
        {{ user.fullName }}
    </div>
{% endblock %}
";
    }
}
