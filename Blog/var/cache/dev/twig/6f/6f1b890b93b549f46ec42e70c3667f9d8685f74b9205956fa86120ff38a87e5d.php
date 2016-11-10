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
        $__internal_6dbf054537fe82d952b57ae006062eebc0dbf942be70568f281f10be542d97d0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6dbf054537fe82d952b57ae006062eebc0dbf942be70568f281f10be542d97d0->enter($__internal_6dbf054537fe82d952b57ae006062eebc0dbf942be70568f281f10be542d97d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6dbf054537fe82d952b57ae006062eebc0dbf942be70568f281f10be542d97d0->leave($__internal_6dbf054537fe82d952b57ae006062eebc0dbf942be70568f281f10be542d97d0_prof);

    }

    // line 3
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_505053727e88b302d2f9460caf2046157e32b2ce93c27d3b644151727d37a2c3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_505053727e88b302d2f9460caf2046157e32b2ce93c27d3b644151727d37a2c3->enter($__internal_505053727e88b302d2f9460caf2046157e32b2ce93c27d3b644151727d37a2c3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        echo "login";
        
        $__internal_505053727e88b302d2f9460caf2046157e32b2ce93c27d3b644151727d37a2c3->leave($__internal_505053727e88b302d2f9460caf2046157e32b2ce93c27d3b644151727d37a2c3_prof);

    }

    // line 5
    public function block_main($context, array $blocks = array())
    {
        $__internal_444f6fc25bc8af826811b95ab200069e2ec4277e71dbdbc297a27cdfe5894db1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_444f6fc25bc8af826811b95ab200069e2ec4277e71dbdbc297a27cdfe5894db1->enter($__internal_444f6fc25bc8af826811b95ab200069e2ec4277e71dbdbc297a27cdfe5894db1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

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
        
        $__internal_444f6fc25bc8af826811b95ab200069e2ec4277e71dbdbc297a27cdfe5894db1->leave($__internal_444f6fc25bc8af826811b95ab200069e2ec4277e71dbdbc297a27cdfe5894db1_prof);

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
