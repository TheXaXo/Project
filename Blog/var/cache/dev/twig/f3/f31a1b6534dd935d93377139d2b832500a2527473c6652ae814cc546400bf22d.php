<?php

/* admin/user/delete.html.twig */
class __TwigTemplate_80e3de5ffe5dc4acdb75a91b74bd276607021f5b89ffce212b68005feabd921e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "admin/user/delete.html.twig", 1);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_53fc1cfbc5ae7e89b8de96e120384b84e103a6f7e56051760401a1a4f8f2e2e9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_53fc1cfbc5ae7e89b8de96e120384b84e103a6f7e56051760401a1a4f8f2e2e9->enter($__internal_53fc1cfbc5ae7e89b8de96e120384b84e103a6f7e56051760401a1a4f8f2e2e9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/user/delete.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_53fc1cfbc5ae7e89b8de96e120384b84e103a6f7e56051760401a1a4f8f2e2e9->leave($__internal_53fc1cfbc5ae7e89b8de96e120384b84e103a6f7e56051760401a1a4f8f2e2e9_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_70ed6cc4c1d799df76930cd283d1fd7c91cb17193ecba18b8fcd1446fe366740 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_70ed6cc4c1d799df76930cd283d1fd7c91cb17193ecba18b8fcd1446fe366740->enter($__internal_70ed6cc4c1d799df76930cd283d1fd7c91cb17193ecba18b8fcd1446fe366740_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "            <form class=\"form-horizontal\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_user_delete", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "id", array()))), "html", null, true);
        echo "\" method=\"post\">
                <fieldset>
                    <legend>Delete User - <b>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName", array()), "html", null, true);
        echo "</b></legend>
                    <div class=\"form-group\">
                        <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                        <div class=\"col-sm-4 \">
                            <input class=\"form-control\" id=\"user_email\" value=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
        echo "\" name=\"user_edit[email]\" required type=\"email\" disabled>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-4 control-label\" for=\"user_fullName\">Full Name</label>
                        <div class=\"col-sm-4 \">
                            <input type=\"text\" class=\"form-control\" id=\"user_fullName\" value=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "fullName", array()), "html", null, true);
        echo "\" name=\"user_edit[fullName]\" disabled>
                        </div>
                    </div>

                    ";
        // line 20
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
                    <div class=\"form-group\">
                        <div class=\"col-sm-4 col-sm-offset-4\">
                            <a class=\"btn btn-default\" href=\"";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users");
        echo "\">Cancel</a>
                            <button type=\"submit\" class=\"btn btn-danger\">Delete</button>
                        </div>
                    </div>
                </fieldset>
            </form>
";
        
        $__internal_70ed6cc4c1d799df76930cd283d1fd7c91cb17193ecba18b8fcd1446fe366740->leave($__internal_70ed6cc4c1d799df76930cd283d1fd7c91cb17193ecba18b8fcd1446fe366740_prof);

    }

    public function getTemplateName()
    {
        return "admin/user/delete.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 23,  69 => 20,  62 => 16,  53 => 10,  46 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block main %}
            <form class=\"form-horizontal\" action=\"{{ path('admin_user_delete',{'id' : user.id}) }}\" method=\"post\">
                <fieldset>
                    <legend>Delete User - <b>{{ user.fullName }}</b></legend>
                    <div class=\"form-group\">
                        <label class=\"col-sm-4 control-label\" for=\"user_email\">Email</label>
                        <div class=\"col-sm-4 \">
                            <input class=\"form-control\" id=\"user_email\" value=\"{{ user.email }}\" name=\"user_edit[email]\" required type=\"email\" disabled>
                        </div>
                    </div>
                    <div class=\"form-group\">
                        <label class=\"col-sm-4 control-label\" for=\"user_fullName\">Full Name</label>
                        <div class=\"col-sm-4 \">
                            <input type=\"text\" class=\"form-control\" id=\"user_fullName\" value=\"{{ user.fullName }}\" name=\"user_edit[fullName]\" disabled>
                        </div>
                    </div>

                    {{ form_row(form._token) }}
                    <div class=\"form-group\">
                        <div class=\"col-sm-4 col-sm-offset-4\">
                            <a class=\"btn btn-default\" href=\"{{ path('admin_users') }}\">Cancel</a>
                            <button type=\"submit\" class=\"btn btn-danger\">Delete</button>
                        </div>
                    </div>
                </fieldset>
            </form>
{% endblock %}";
    }
}
