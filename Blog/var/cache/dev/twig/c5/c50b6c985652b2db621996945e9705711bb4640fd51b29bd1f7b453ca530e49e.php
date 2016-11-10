<?php

/* form/fields.html.twig */
class __TwigTemplate_e55b0fad6b12e0f66929ee7f1c44e3530389136289b78074e6cb27f9bfa9c311 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'date_time_picker_widget' => array($this, 'block_date_time_picker_widget'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_122451377163691cf0adf5a922ff6a6ae350023be735f0c52b1d078648b87a3f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_122451377163691cf0adf5a922ff6a6ae350023be735f0c52b1d078648b87a3f->enter($__internal_122451377163691cf0adf5a922ff6a6ae350023be735f0c52b1d078648b87a3f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "form/fields.html.twig"));

        // line 9
        echo "
";
        // line 10
        $this->displayBlock('date_time_picker_widget', $context, $blocks);
        
        $__internal_122451377163691cf0adf5a922ff6a6ae350023be735f0c52b1d078648b87a3f->leave($__internal_122451377163691cf0adf5a922ff6a6ae350023be735f0c52b1d078648b87a3f_prof);

    }

    public function block_date_time_picker_widget($context, array $blocks = array())
    {
        $__internal_e56261f8764f55075fc6baba3b55d17fd2105a63af34840d94b8962725166c47 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e56261f8764f55075fc6baba3b55d17fd2105a63af34840d94b8962725166c47->enter($__internal_e56261f8764f55075fc6baba3b55d17fd2105a63af34840d94b8962725166c47_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "date_time_picker_widget"));

        // line 11
        echo "    ";
        ob_start();
        // line 12
        echo "        <div class=\"input-group date\" data-toggle=\"datetimepicker\">
            ";
        // line 13
        $this->displayBlock("datetime_widget", $context, $blocks);
        echo "
            ";
        // line 15
        echo "                ";
        // line 16
        echo "            ";
        // line 17
        echo "        </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        
        $__internal_e56261f8764f55075fc6baba3b55d17fd2105a63af34840d94b8962725166c47->leave($__internal_e56261f8764f55075fc6baba3b55d17fd2105a63af34840d94b8962725166c47_prof);

    }

    public function getTemplateName()
    {
        return "form/fields.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  52 => 17,  50 => 16,  48 => 15,  44 => 13,  41 => 12,  38 => 11,  26 => 10,  23 => 9,);
    }

    public function getSource()
    {
        return "{#
   Each field type is rendered by a template fragment, which is determined
   by the name of your form type class (DateTimePickerType -> date_time_picker)
   and the suffix \"_widget\". This can be controlled by overriding getBlockPrefix()
   in DateTimePickerType.

   See http://symfony.com/doc/current/cookbook/form/create_custom_field_type.html#creating-a-template-for-the-field
#}

{% block date_time_picker_widget %}
    {% spaceless %}
        <div class=\"input-group date\" data-toggle=\"datetimepicker\">
            {{ block('datetime_widget') }}
            {#<span class=\"input-group-addon\">#}
                {#<span class=\"fa fa-calendar\" aria-hidden=\"true\"></span>#}
            {#</span>#}
        </div>
    {% endspaceless %}
{% endblock %}
";
    }
}
