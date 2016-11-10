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
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_f0697d43885e890f8af59d5ea95c379876dccc3d9495a1c3e24c09ae6664681b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f0697d43885e890f8af59d5ea95c379876dccc3d9495a1c3e24c09ae6664681b->enter($__internal_f0697d43885e890f8af59d5ea95c379876dccc3d9495a1c3e24c09ae6664681b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "blog/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f0697d43885e890f8af59d5ea95c379876dccc3d9495a1c3e24c09ae6664681b->leave($__internal_f0697d43885e890f8af59d5ea95c379876dccc3d9495a1c3e24c09ae6664681b_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_568afa991b79a72721d049d393a563987065da764005f32b056bcdfa4eebbae3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_568afa991b79a72721d049d393a563987065da764005f32b056bcdfa4eebbae3->enter($__internal_568afa991b79a72721d049d393a563987065da764005f32b056bcdfa4eebbae3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["articles"]) ? $context["articles"] : $this->getContext($context, "articles")));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 5
            echo "        <div class=\"col-md-4\">
            <article>
                <header>
                    <h2>";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "title", array()), "html", null, true);
            echo "</h2>
                </header>

                <p>
                    ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "summary", array()), "html", null, true);
            echo "
                </p>

                <small class=\"author\">
                    ";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["article"], "author", array()), "html", null, true);
            echo "
                </small>

                <footer>
                    <div class=\"pull-right\">
                        <a class=\"btn btn-default btn-sm\"
                           href=\"";
            // line 22
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
        
        $__internal_568afa991b79a72721d049d393a563987065da764005f32b056bcdfa4eebbae3->leave($__internal_568afa991b79a72721d049d393a563987065da764005f32b056bcdfa4eebbae3_prof);

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
        return array (  73 => 22,  64 => 16,  57 => 12,  50 => 8,  45 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

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
";
    }
}
