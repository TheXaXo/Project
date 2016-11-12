<?php

/* blog/index.html.twig */
class __TwigTemplate_a92bebfe13825e455e0f0cf37002a3d784988f2e8170c9d06ff5554e9c011e2b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "blog/index.html.twig", 1);
        $this->blocks = array(
            'sorting' => array($this, 'block_sorting'),
            'main' => array($this, 'block_main'),
            'pager' => array($this, 'block_pager'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_fd884380a7c0efe1506386420f74fd7ccefe5cfc2f8d4c3a88d35191191ec728 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fd884380a7c0efe1506386420f74fd7ccefe5cfc2f8d4c3a88d35191191ec728->enter($__internal_fd884380a7c0efe1506386420f74fd7ccefe5cfc2f8d4c3a88d35191191ec728_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_fd884380a7c0efe1506386420f74fd7ccefe5cfc2f8d4c3a88d35191191ec728->leave($__internal_fd884380a7c0efe1506386420f74fd7ccefe5cfc2f8d4c3a88d35191191ec728_prof);

    }

    // line 3
    public function block_sorting($context, array $blocks = array())
    {
        $__internal_b9261ac87da5993fe53caed5b5e3f7313ab14ebf1b4599b4341172e620327461 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b9261ac87da5993fe53caed5b5e3f7313ab14ebf1b4599b4341172e620327461->enter($__internal_b9261ac87da5993fe53caed5b5e3f7313ab14ebf1b4599b4341172e620327461_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sorting"));

        // line 4
        echo "<div style=\"text-align: center\">
    <div class=\"btn-group\">
        <a class=\"btn btn-default disabled\">Sort wallpapers by</a>
        <a href=\"#\" class=\"btn btn-default\">Downloads</a>
        <a href=\"#\" class=\"btn btn-default\">Rating</a>
        <a href=\"#\" class=\"btn btn-default\">Date</a>
    </div>
    ";
        
        $__internal_b9261ac87da5993fe53caed5b5e3f7313ab14ebf1b4599b4341172e620327461->leave($__internal_b9261ac87da5993fe53caed5b5e3f7313ab14ebf1b4599b4341172e620327461_prof);

    }

    // line 13
    public function block_main($context, array $blocks = array())
    {
        $__internal_971f129a32d2d1df793bb465f7487f96992ffaa97add0bbac3043f66166db607 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_971f129a32d2d1df793bb465f7487f96992ffaa97add0bbac3043f66166db607->enter($__internal_971f129a32d2d1df793bb465f7487f96992ffaa97add0bbac3043f66166db607_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 14
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 15
            echo "        <div class=\"col-md-4\">
            <article>
                <header>
                    <h2>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "</h2>
                </header>

                <p>
                    ";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "summary", array()), "html", null, true);
            echo "
                </p>

                <small class=\"author\">
                    ";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "author", array()), "html", null, true);
            echo "
                </small>

                <footer>
                    <div class=\"pull-right\">
                        <a class=\"btn btn-default btn-sm\"
                           href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_view", array("id" => $this->getAttribute($context["article"], "id", array()))), "html", null, true);
            echo "\">Read more &raquo;</a>
                    </div>
                </footer>
            </article>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "    ";
        
        $__internal_971f129a32d2d1df793bb465f7487f96992ffaa97add0bbac3043f66166db607->leave($__internal_971f129a32d2d1df793bb465f7487f96992ffaa97add0bbac3043f66166db607_prof);

    }

    // line 40
    public function block_pager($context, array $blocks = array())
    {
        $__internal_a768220947405aaeb8edbab9c47ad0ccb51e2908f2b8e28a42a1ccc449db5900 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a768220947405aaeb8edbab9c47ad0ccb51e2908f2b8e28a42a1ccc449db5900->enter($__internal_a768220947405aaeb8edbab9c47ad0ccb51e2908f2b8e28a42a1ccc449db5900_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pager"));

        // line 41
        echo "        <div class=\"container-fluid\">
            <ul class=\"pager\" style=\"margin-top: 0px\">
                <li class=\"disabled\"><a href=\"#\">Previous</a></li>
                <li><a href=\"#\">Next</a></li>
            </ul>
        </div>
    ";
        
        $__internal_a768220947405aaeb8edbab9c47ad0ccb51e2908f2b8e28a42a1ccc449db5900->leave($__internal_a768220947405aaeb8edbab9c47ad0ccb51e2908f2b8e28a42a1ccc449db5900_prof);

    }

    public function getTemplateName()
    {
        return "blog/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 41,  114 => 40,  107 => 38,  95 => 32,  86 => 26,  79 => 22,  72 => 18,  67 => 15,  62 => 14,  56 => 13,  42 => 4,  36 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block sorting %}
<div style=\"text-align: center\">
    <div class=\"btn-group\">
        <a class=\"btn btn-default disabled\">Sort wallpapers by</a>
        <a href=\"#\" class=\"btn btn-default\">Downloads</a>
        <a href=\"#\" class=\"btn btn-default\">Rating</a>
        <a href=\"#\" class=\"btn btn-default\">Date</a>
    </div>
    {% endblock %}

{% block main %}
    {% for article in articles %}
        <div class=\"col-md-4\">
            <article>
                <header>
                    <h2>{{ article.title }}</h2>
                </header>

                <p>
                    {{ article.summary }}
                </p>

                <small class=\"author\">
                    {{ article.author }}
                </small>

                <footer>
                    <div class=\"pull-right\">
                        <a class=\"btn btn-default btn-sm\"
                           href=\"{{ path('article_view', {'id': article.id}) }}\">Read more &raquo;</a>
                    </div>
                </footer>
            </article>
        </div>
    {% endfor %}
    {% endblock %}

    {% block pager %}
        <div class=\"container-fluid\">
            <ul class=\"pager\" style=\"margin-top: 0px\">
                <li class=\"disabled\"><a href=\"#\">Previous</a></li>
                <li><a href=\"#\">Next</a></li>
            </ul>
        </div>
    {% endblock %}
";
    }
}
