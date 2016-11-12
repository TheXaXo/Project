<?php

/* article/create.html.twig */
class __TwigTemplate_f327811cb7e8bbb67e68e77d4ef8801a8e1100bb049c8fc305ef3583c94d598d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "article/create.html.twig", 1);
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
        $__internal_2f48133ce87c183cb332e5635d121bb16a94dfc6e4948d2facddde04d51f115f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f48133ce87c183cb332e5635d121bb16a94dfc6e4948d2facddde04d51f115f->enter($__internal_2f48133ce87c183cb332e5635d121bb16a94dfc6e4948d2facddde04d51f115f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "article/create.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_2f48133ce87c183cb332e5635d121bb16a94dfc6e4948d2facddde04d51f115f->leave($__internal_2f48133ce87c183cb332e5635d121bb16a94dfc6e4948d2facddde04d51f115f_prof);

    }

    // line 3
    public function block_main($context, array $blocks = array())
    {
        $__internal_b648aeed668e2e4aa3430d6a6eeccaaed07b18d9c9c36a4b3b589a3bb1d626b3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b648aeed668e2e4aa3430d6a6eeccaaed07b18d9c9c36a4b3b589a3bb1d626b3->enter($__internal_b648aeed668e2e4aa3430d6a6eeccaaed07b18d9c9c36a4b3b589a3bb1d626b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 4
        echo "    <div>
        <form class=\"form-horizontal\" action=\"";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_create");
        echo "\" method=\"POST\">
            <fieldset>
                <legend>New Post</legend>

                <div class=\"form-group\">
                    <label class=\"col-sm-4 control-label\" for=\"article_title\">Post Title</label>
                    <div class=\"col-sm-4 \">
                        <input type=\"text\" class=\"form-control\" id=\"article_title\" placeholder=\"Post Title\"
                               name=\"article[title]\">
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"col-sm-4 control-label\" for=\"article_content\">Content</label>
                    <div class=\"col-sm-4\">
                        <textarea class=\"form-control\" rows=\"6\" id=\"article_content\"
                                  name=\"article[content]\" placeholder=\"Content\"></textarea>
                    </div>
                </div>

                ";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "

                <div class=\"form-group\">
                    <div class=\"col-sm-4 col-sm-offset-4\">
                        <a class=\"btn btn-default\" href=\"";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("blog_index");
        echo "\">Cancel</a>
                        <button type=\"submit\" class=\"btn btn-success\">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
";
        
        $__internal_b648aeed668e2e4aa3430d6a6eeccaaed07b18d9c9c36a4b3b589a3bb1d626b3->leave($__internal_b648aeed668e2e4aa3430d6a6eeccaaed07b18d9c9c36a4b3b589a3bb1d626b3_prof);

    }

    public function getTemplateName()
    {
        return "article/create.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 29,  66 => 25,  43 => 5,  40 => 4,  34 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends 'base.html.twig' %}

{% block main %}
    <div>
        <form class=\"form-horizontal\" action=\"{{ path('article_create') }}\" method=\"POST\">
            <fieldset>
                <legend>New Post</legend>

                <div class=\"form-group\">
                    <label class=\"col-sm-4 control-label\" for=\"article_title\">Post Title</label>
                    <div class=\"col-sm-4 \">
                        <input type=\"text\" class=\"form-control\" id=\"article_title\" placeholder=\"Post Title\"
                               name=\"article[title]\">
                    </div>
                </div>

                <div class=\"form-group\">
                    <label class=\"col-sm-4 control-label\" for=\"article_content\">Content</label>
                    <div class=\"col-sm-4\">
                        <textarea class=\"form-control\" rows=\"6\" id=\"article_content\"
                                  name=\"article[content]\" placeholder=\"Content\"></textarea>
                    </div>
                </div>

                {{ form_row(form._token) }}

                <div class=\"form-group\">
                    <div class=\"col-sm-4 col-sm-offset-4\">
                        <a class=\"btn btn-default\" href=\"{{ path('blog_index') }}\">Cancel</a>
                        <button type=\"submit\" class=\"btn btn-success\">Submit</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
{% endblock %}";
    }
}
