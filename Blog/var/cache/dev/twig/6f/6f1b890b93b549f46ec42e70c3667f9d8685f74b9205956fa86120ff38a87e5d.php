<?php

/* security/login.html.twig */
class __TwigTemplate_5d23012a4287d3e0599d22e9b3c7b8283bee912405c62cb9cc2053f1d87c2568 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "security/login.html.twig", 1);
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
        $__internal_67a884c8c9fdebba0f84f1403767a94050d6fed50db09fb06cb2034158603006 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_67a884c8c9fdebba0f84f1403767a94050d6fed50db09fb06cb2034158603006->enter($__internal_67a884c8c9fdebba0f84f1403767a94050d6fed50db09fb06cb2034158603006_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_67a884c8c9fdebba0f84f1403767a94050d6fed50db09fb06cb2034158603006->leave($__internal_67a884c8c9fdebba0f84f1403767a94050d6fed50db09fb06cb2034158603006_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_789e494a9b0f1633a12fed7ecdd8938a53a98aee3190174b3c29c456f66e1909 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_789e494a9b0f1633a12fed7ecdd8938a53a98aee3190174b3c29c456f66e1909->enter($__internal_789e494a9b0f1633a12fed7ecdd8938a53a98aee3190174b3c29c456f66e1909_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "login";
        
        $__internal_789e494a9b0f1633a12fed7ecdd8938a53a98aee3190174b3c29c456f66e1909->leave($__internal_789e494a9b0f1633a12fed7ecdd8938a53a98aee3190174b3c29c456f66e1909_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_7aef3323a7a9a37cd543ec2270d2779354b938931a1a948b7f887d7a2b917758 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7aef3323a7a9a37cd543ec2270d2779354b938931a1a948b7f887d7a2b917758->enter($__internal_7aef3323a7a9a37cd543ec2270d2779354b938931a1a948b7f887d7a2b917758_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("security_login");
        echo "\" method=\"post\">
        <fieldset>
            <legend>Login</legend>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                <div class=\"col-sm-4 \">
                    <input type=\"email\" class=\"form-control\" id=\"user_email\" placeholder=\"Email\" name=\"_username\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"password\">Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\"
                           name=\"_password\">
                </div>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderCsrfToken("authenticate"), "html", null, true);
        echo "\"/>
            <div class=\"form-group\">
                <div class=\"col-sm-4 col-sm-offset-4\">
                    <a class=\"btn btn-default\" href=\"";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("blog_index");
        echo "\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-success\">Login</button>
                </div>
            </div>
        </fieldset>
    </form>
";
        
        $__internal_7aef3323a7a9a37cd543ec2270d2779354b938931a1a948b7f887d7a2b917758->leave($__internal_7aef3323a7a9a37cd543ec2270d2779354b938931a1a948b7f887d7a2b917758_prof);

    }

    public function getTemplateName()
    {
        return "security/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 25,  73 => 22,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block body_id 'login' %}

{% block main %}
    <form class=\"form-horizontal\" action=\"{{ path('security_login') }}\" method=\"post\">
        <fieldset>
            <legend>Login</legend>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                <div class=\"col-sm-4 \">
                    <input type=\"email\" class=\"form-control\" id=\"user_email\" placeholder=\"Email\" name=\"_username\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"password\">Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"password\" placeholder=\"Password\"
                           name=\"_password\">
                </div>
            </div>
            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\"/>
            <div class=\"form-group\">
                <div class=\"col-sm-4 col-sm-offset-4\">
                    <a class=\"btn btn-default\" href=\"{{ path('blog_index') }}\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-success\">Login</button>
                </div>
            </div>
        </fieldset>
    </form>
{% endblock %}
";
    }
}
