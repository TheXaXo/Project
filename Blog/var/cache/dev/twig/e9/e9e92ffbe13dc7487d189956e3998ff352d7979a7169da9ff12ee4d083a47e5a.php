<?php

/* article/article.html.twig */
class __TwigTemplate_0998bfe341db6516240589898db8b3d4871cb6c10ab59d9027f4edb5a402e28d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "article/article.html.twig", 1);
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
        $__internal_ebf823ae85f8fa56b44ec66f723e98509240fc3ca5d5fc2f2fcab66951feac27 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ebf823ae85f8fa56b44ec66f723e98509240fc3ca5d5fc2f2fcab66951feac27->enter($__internal_ebf823ae85f8fa56b44ec66f723e98509240fc3ca5d5fc2f2fcab66951feac27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "article/article.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ebf823ae85f8fa56b44ec66f723e98509240fc3ca5d5fc2f2fcab66951feac27->leave($__internal_ebf823ae85f8fa56b44ec66f723e98509240fc3ca5d5fc2f2fcab66951feac27_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_a7801b4671d3e28d219368e4cd01cc9917d411d6647ca5c4edac855a55e2ba16 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a7801b4671d3e28d219368e4cd01cc9917d411d6647ca5c4edac855a55e2ba16->enter($__internal_a7801b4671d3e28d219368e4cd01cc9917d411d6647ca5c4edac855a55e2ba16_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "                <article>
                    <header>
                        <h2>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "title", array()), "html", null, true);
        echo "</h2>
                    </header>

                    <p>
                        ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "content", array()), "html", null, true);
        echo "
                    </p>

                    <small class=\"author\">
                        ";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "author", array()), "html", null, true);
        echo "
                    </small>

                    <footer>
                        <div class=\"pull-right\">

                            ";
        // line 20
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "getUser", array(), "method") && ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "getUser", array(), "method"), "isAuthor", array(0 => (isset($context["article"]) ? $context["article"] : $this->getContext($context, "article"))), "method") || $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "getUser", array(), "method"), "isAdmin", array(), "method")))) {
            // line 21
            echo "                                <a class=\"btn btn-danger btn-sm\"
                                   href=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_delete", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id", array()))), "html", null, true);
            echo "\">Delete</a>
                                <a class=\"btn btn-success btn-sm\"
                                   href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_edit", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id", array()))), "html", null, true);
            echo "\">Edit</a>
                            ";
        }
        // line 26
        echo "
                            <a class=\"btn btn-default btn-sm\" href=\"";
        // line 27
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("blog_index");
        echo "\">&laquo; Back</a>
                        </div>
                    </footer>
                </article>
";
        
        $__internal_a7801b4671d3e28d219368e4cd01cc9917d411d6647ca5c4edac855a55e2ba16->leave($__internal_a7801b4671d3e28d219368e4cd01cc9917d411d6647ca5c4edac855a55e2ba16_prof);

    }

    public function getTemplateName()
    {
        return "article/article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 27,  82 => 26,  77 => 24,  72 => 22,  69 => 21,  67 => 20,  58 => 14,  51 => 10,  44 => 6,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block main %}
                <article>
                    <header>
                        <h2>{{ article.title }}</h2>
                    </header>

                    <p>
                        {{ article.content }}
                    </p>

                    <small class=\"author\">
                        {{ article.author }}
                    </small>

                    <footer>
                        <div class=\"pull-right\">

                            {% if app.getUser() and (app.getUser().isAuthor(article) or app.getUser().isAdmin()) %}
                                <a class=\"btn btn-danger btn-sm\"
                                   href=\"{{ path('article_delete', {id: article.id}) }}\">Delete</a>
                                <a class=\"btn btn-success btn-sm\"
                                   href=\"{{ path('article_edit', {id: article.id}) }}\">Edit</a>
                            {% endif %}

                            <a class=\"btn btn-default btn-sm\" href=\"{{ path('blog_index') }}\">&laquo; Back</a>
                        </div>
                    </footer>
                </article>
{% endblock %}

";
    }
}
