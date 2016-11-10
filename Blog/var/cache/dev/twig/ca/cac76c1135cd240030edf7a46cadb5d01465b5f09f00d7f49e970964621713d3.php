<?php

/* article/edit.html.twig */
class __TwigTemplate_df2028336d054586b4ecdebb99723f7a2077ab919451b26c0f866d1bf0240e4d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "article/edit.html.twig", 1);
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
        $__internal_f122a967f172e940ac9cc2fbc8cd17b5445236c7d7e46788785987f7c70627ab = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f122a967f172e940ac9cc2fbc8cd17b5445236c7d7e46788785987f7c70627ab->enter($__internal_f122a967f172e940ac9cc2fbc8cd17b5445236c7d7e46788785987f7c70627ab_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "article/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_f122a967f172e940ac9cc2fbc8cd17b5445236c7d7e46788785987f7c70627ab->leave($__internal_f122a967f172e940ac9cc2fbc8cd17b5445236c7d7e46788785987f7c70627ab_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_48abceebbb4537124e2e0fb5dc99abdc957b07b94a7bfd2a98233ea525e7e2e5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_48abceebbb4537124e2e0fb5dc99abdc957b07b94a7bfd2a98233ea525e7e2e5->enter($__internal_48abceebbb4537124e2e0fb5dc99abdc957b07b94a7bfd2a98233ea525e7e2e5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "                <form class=\"form-horizontal\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_edit", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id", array()))), "html", null, true);
        echo "\" method=\"POST\">
                    <fieldset>
                        <legend>Edit Post</legend>

                        <div class=\"form-group\">
                            <label class=\"col-sm-4 control-label\" for=\"article_title\">Post Title</label>
                            <div class=\"col-sm-4 \">
                                <input type=\"text\" class=\"form-control\" id=\"article_title\" placeholder=\"Post Title\"
                                       name=\"article[title]\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "title", array()), "html", null, true);
        echo "\">
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-4 control-label\" for=\"article_content\">Content</label>
                            <div class=\"col-sm-4\">
                        <textarea class=\"form-control\" rows=\"6\" id=\"article_content\"
                                  name=\"article[content]\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "content", array()), "html", null, true);
        echo "</textarea>
                            </div>
                        </div>

                        ";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "

                        <div class=\"form-group\">
                            <div class=\"col-sm-4 col-sm-offset-4\">
                                <a class=\"btn btn-default\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_view", array("id" => $this->getAttribute((isset($context["article"]) ? $context["article"] : $this->getContext($context, "article")), "id", array()))), "html", null, true);
        echo "\">Cancel</a>
                                <button type=\"submit\" class=\"btn btn-success\">Save</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
";
        
        $__internal_48abceebbb4537124e2e0fb5dc99abdc957b07b94a7bfd2a98233ea525e7e2e5->leave($__internal_48abceebbb4537124e2e0fb5dc99abdc957b07b94a7bfd2a98233ea525e7e2e5_prof);

    }

    public function getTemplateName()
    {
        return "article/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 28,  70 => 24,  63 => 20,  52 => 12,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block main %}
                <form class=\"form-horizontal\" action=\"{{ path('article_edit', {id: article.id}) }}\" method=\"POST\">
                    <fieldset>
                        <legend>Edit Post</legend>

                        <div class=\"form-group\">
                            <label class=\"col-sm-4 control-label\" for=\"article_title\">Post Title</label>
                            <div class=\"col-sm-4 \">
                                <input type=\"text\" class=\"form-control\" id=\"article_title\" placeholder=\"Post Title\"
                                       name=\"article[title]\" value=\"{{ article.title }}\">
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <label class=\"col-sm-4 control-label\" for=\"article_content\">Content</label>
                            <div class=\"col-sm-4\">
                        <textarea class=\"form-control\" rows=\"6\" id=\"article_content\"
                                  name=\"article[content]\">{{ article.content }}</textarea>
                            </div>
                        </div>

                        {{ form_row(form._token) }}

                        <div class=\"form-group\">
                            <div class=\"col-sm-4 col-sm-offset-4\">
                                <a class=\"btn btn-default\" href=\"{{ path('article_view', {id: article.id}) }}\">Cancel</a>
                                <button type=\"submit\" class=\"btn btn-success\">Save</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
{% endblock %}

";
    }
}
