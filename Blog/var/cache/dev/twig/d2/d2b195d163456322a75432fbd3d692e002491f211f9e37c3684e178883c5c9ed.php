<?php

/* user/register.html.twig */
class __TwigTemplate_685adea68df722847467b36f923c5e322ba7429a941f07a0843785581239afb5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "user/register.html.twig", 1);
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
        $__internal_e40cd36cce05b0fb5d709fc22efc414c4e520037a24d53fa4ff2cd6fbbeed83c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e40cd36cce05b0fb5d709fc22efc414c4e520037a24d53fa4ff2cd6fbbeed83c->enter($__internal_e40cd36cce05b0fb5d709fc22efc414c4e520037a24d53fa4ff2cd6fbbeed83c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "user/register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_e40cd36cce05b0fb5d709fc22efc414c4e520037a24d53fa4ff2cd6fbbeed83c->leave($__internal_e40cd36cce05b0fb5d709fc22efc414c4e520037a24d53fa4ff2cd6fbbeed83c_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_acc3494a21ed56dfa507ecf6088b8b80313d0fa0435b6c42abba2bb168a8be50 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_acc3494a21ed56dfa507ecf6088b8b80313d0fa0435b6c42abba2bb168a8be50->enter($__internal_acc3494a21ed56dfa507ecf6088b8b80313d0fa0435b6c42abba2bb168a8be50_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "register";
        
        $__internal_acc3494a21ed56dfa507ecf6088b8b80313d0fa0435b6c42abba2bb168a8be50->leave($__internal_acc3494a21ed56dfa507ecf6088b8b80313d0fa0435b6c42abba2bb168a8be50_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_93f9d56ecbbec05c9d3f92da8f5beaec3dde1b1f1cf9205ad0218382818ad543 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_93f9d56ecbbec05c9d3f92da8f5beaec3dde1b1f1cf9205ad0218382818ad543->enter($__internal_93f9d56ecbbec05c9d3f92da8f5beaec3dde1b1f1cf9205ad0218382818ad543_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 6
        echo "    <form class=\"form-horizontal\" action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_register");
        echo "\" method=\"post\">
        <fieldset>
            <legend>Register</legend>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                <div class=\"col-sm-4 \">
                    <input class=\"form-control\" id=\"user_email\" placeholder=\"Email\" name=\"user[email]\" required
                           type=\"email\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_fullName\">Full Name</label>
                <div class=\"col-sm-4 \">
                    <input type=\"text\" class=\"form-control\" id=\"user_fullName\" placeholder=\"Full Name\"
                           name=\"user[fullName]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_password_first\">Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"user_password_first\" placeholder=\"Password\"
                           name=\"user[password][first]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_password_second\">Confirm Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"user_password_second\" placeholder=\"Password\"
                           name=\"user[password][second]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-4 col-sm-offset-4\">
                    <a class=\"btn btn-default\" href=\"";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("blog_index");
        echo "\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-success\">Submit</button>
                </div>
            </div>

            ";
        // line 44
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
        </fieldset>
    </form>
";
        
        $__internal_93f9d56ecbbec05c9d3f92da8f5beaec3dde1b1f1cf9205ad0218382818ad543->leave($__internal_93f9d56ecbbec05c9d3f92da8f5beaec3dde1b1f1cf9205ad0218382818ad543_prof);

    }

    public function getTemplateName()
    {
        return "user/register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 44,  90 => 39,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block body_id 'register' %}

{% block main %}
    <form class=\"form-horizontal\" action=\"{{ path('user_register') }}\" method=\"post\">
        <fieldset>
            <legend>Register</legend>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                <div class=\"col-sm-4 \">
                    <input class=\"form-control\" id=\"user_email\" placeholder=\"Email\" name=\"user[email]\" required
                           type=\"email\">
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_fullName\">Full Name</label>
                <div class=\"col-sm-4 \">
                    <input type=\"text\" class=\"form-control\" id=\"user_fullName\" placeholder=\"Full Name\"
                           name=\"user[fullName]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_password_first\">Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"user_password_first\" placeholder=\"Password\"
                           name=\"user[password][first]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-4 control-label\" for=\"user_password_second\">Confirm Password</label>
                <div class=\"col-sm-4\">
                    <input type=\"password\" class=\"form-control\" id=\"user_password_second\" placeholder=\"Password\"
                           name=\"user[password][second]\" required>
                </div>
            </div>
            <div class=\"form-group\">
                <div class=\"col-sm-4 col-sm-offset-4\">
                    <a class=\"btn btn-default\" href=\"{{ path('blog_index') }}\">Cancel</a>
                    <button type=\"submit\" class=\"btn btn-success\">Submit</button>
                </div>
            </div>

            {{ form_row(form._token) }}
        </fieldset>
    </form>
{% endblock %}
";
    }
}
