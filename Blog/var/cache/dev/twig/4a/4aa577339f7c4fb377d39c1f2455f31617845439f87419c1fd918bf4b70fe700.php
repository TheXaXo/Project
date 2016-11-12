<?php

/* admin/user/list.html.twig */
class __TwigTemplate_3b48d0932025611b5ea68ff5f326f178fdba17fc955900d980cee9925ffb1ee1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "admin/user/list.html.twig", 1);
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
        $__internal_d779d2e425d92465b1f88c234a63f67671c098e1f8c0a62de65fce0ff826c114 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d779d2e425d92465b1f88c234a63f67671c098e1f8c0a62de65fce0ff826c114->enter($__internal_d779d2e425d92465b1f88c234a63f67671c098e1f8c0a62de65fce0ff826c114_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "admin/user/list.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d779d2e425d92465b1f88c234a63f67671c098e1f8c0a62de65fce0ff826c114->leave($__internal_d779d2e425d92465b1f88c234a63f67671c098e1f8c0a62de65fce0ff826c114_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_47703ab3c09b524f2ea51b9bf7ea2f1361964efd30d164845adcb9a044b4bc35 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_47703ab3c09b524f2ea51b9bf7ea2f1361964efd30d164845adcb9a044b4bc35->enter($__internal_47703ab3c09b524f2ea51b9bf7ea2f1361964efd30d164845adcb9a044b4bc35_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "            <h2>All Users</h2>
            <div class=\"align\">
                <table class=\"table table-striped table-hover \">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : $this->getContext($context, "users")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 17
            echo "                        <tr>
                        <tr ";
            // line 18
            if ($this->getAttribute($context["user"], "isAdmin", array(), "method")) {
                echo "class=\"info\" ";
            }
            echo ">
                            <td>";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "fullName", array()), "html", null, true);
            echo "</td>
                            <td>";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                            <td>
                                <a href=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_user_edit", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-sm btn-success\">Edit</a>
                                <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_user_delete", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
            echo "\" class=\"btn btn-sm btn-danger\">Delete</a>
                            </td>
                        </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "                    </tbody>
                </table>
            </div>
";
        
        $__internal_47703ab3c09b524f2ea51b9bf7ea2f1361964efd30d164845adcb9a044b4bc35->leave($__internal_47703ab3c09b524f2ea51b9bf7ea2f1361964efd30d164845adcb9a044b4bc35_prof);

    }

    public function getTemplateName()
    {
        return "admin/user/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 28,  84 => 24,  80 => 23,  75 => 21,  71 => 20,  67 => 19,  61 => 18,  58 => 17,  54 => 16,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block main %}
            <h2>All Users</h2>
            <div class=\"align\">
                <table class=\"table table-striped table-hover \">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    {% for user in users %}
                        <tr>
                        <tr {% if user.isAdmin() %}class=\"info\" {% endif %}>
                            <td>{{ user.id }}</td>
                            <td>{{ user.fullName }}</td>
                            <td>{{ user.email }}</td>
                            <td>
                                <a href=\"{{ path('admin_user_edit', {'id': user.id}) }}\" class=\"btn btn-sm btn-success\">Edit</a>
                                <a href=\"{{ path('admin_user_delete', {'id': user.id}) }}\" class=\"btn btn-sm btn-danger\">Delete</a>
                            </td>
                        </tr>
                    {% endfor %}
                    </tbody>
                </table>
            </div>
{% endblock %}";
    }
}
