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
        $__internal_fdf4cf0b0cd088bbd4e0bf3bea878dd501f58f4946cb91b7e2f5ed0f1a3de1b9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fdf4cf0b0cd088bbd4e0bf3bea878dd501f58f4946cb91b7e2f5ed0f1a3de1b9->enter($__internal_fdf4cf0b0cd088bbd4e0bf3bea878dd501f58f4946cb91b7e2f5ed0f1a3de1b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "form/fields.html.twig"));

        // line 9
        echo "
";
        // line 10
        $this->displayBlock('date_time_picker_widget', $context, $blocks);
        
        $__internal_fdf4cf0b0cd088bbd4e0bf3bea878dd501f58f4946cb91b7e2f5ed0f1a3de1b9->leave($__internal_fdf4cf0b0cd088bbd4e0bf3bea878dd501f58f4946cb91b7e2f5ed0f1a3de1b9_prof);

    }

    public function block_date_time_picker_widget($context, array $blocks = array())
    {
        $__internal_01062d6a5ec42b40c73d97e4262bdf34535b044f74779ee83ca6c4052b9a0c3a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_01062d6a5ec42b40c73d97e4262bdf34535b044f74779ee83ca6c4052b9a0c3a->enter($__internal_01062d6a5ec42b40c73d97e4262bdf34535b044f74779ee83ca6c4052b9a0c3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "date_time_picker_widget"));

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
        
        $__internal_01062d6a5ec42b40c73d97e4262bdf34535b044f74779ee83ca6c4052b9a0c3a->leave($__internal_01062d6a5ec42b40c73d97e4262bdf34535b044f74779ee83ca6c4052b9a0c3a_prof);

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
