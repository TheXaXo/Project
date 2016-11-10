<?php

/* base.html.twig */
class __TwigTemplate_810da75b5f570fa209b53350187f94297f18ad468a5a497237bed41ce98b0805 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body_id' => array($this, 'block_body_id'),
            'header' => array($this, 'block_header'),
            'body' => array($this, 'block_body'),
            'main' => array($this, 'block_main'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_987192ed28919676e93922fb6c4a41066fc03c10f11cc9373c580babc28b9432 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_987192ed28919676e93922fb6c4a41066fc03c10f11cc9373c580babc28b9432->enter($__internal_987192ed28919676e93922fb6c4a41066fc03c10f11cc9373c580babc28b9432_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 6
        echo "<!DOCTYPE html>
<html lang=\"en-US\">
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    <title>";
        // line 11
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 12
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 16
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\"/>
</head>

<body id=\"";
        // line 19
        $this->displayBlock('body_id', $context, $blocks);
        echo "\">

";
        // line 21
        $this->displayBlock('header', $context, $blocks);
        // line 75
        echo "
<div class=\"container-fluid\">
    ";
        // line 77
        $this->displayBlock('body', $context, $blocks);
        // line 106
        echo "</div>

";
        // line 108
        $this->displayBlock('footer', $context, $blocks);
        // line 115
        echo "
";
        // line 116
        $this->displayBlock('javascripts', $context, $blocks);
        // line 122
        echo "
</body>
</html>
";
        
        $__internal_987192ed28919676e93922fb6c4a41066fc03c10f11cc9373c580babc28b9432->leave($__internal_987192ed28919676e93922fb6c4a41066fc03c10f11cc9373c580babc28b9432_prof);

    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        $__internal_f956905fef1d3db8f3c7e541990b8fc7c909716d2a906cc59f4298cef04dcce5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f956905fef1d3db8f3c7e541990b8fc7c909716d2a906cc59f4298cef04dcce5->enter($__internal_f956905fef1d3db8f3c7e541990b8fc7c909716d2a906cc59f4298cef04dcce5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "SoftUni Blog";
        
        $__internal_f956905fef1d3db8f3c7e541990b8fc7c909716d2a906cc59f4298cef04dcce5->leave($__internal_f956905fef1d3db8f3c7e541990b8fc7c909716d2a906cc59f4298cef04dcce5_prof);

    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_8db2f58a70f785756d45a7944452ba67855c590dfa72b0b4eb84131e8d4ef55e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8db2f58a70f785756d45a7944452ba67855c590dfa72b0b4eb84131e8d4ef55e->enter($__internal_8db2f58a70f785756d45a7944452ba67855c590dfa72b0b4eb84131e8d4ef55e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\">
    ";
        
        $__internal_8db2f58a70f785756d45a7944452ba67855c590dfa72b0b4eb84131e8d4ef55e->leave($__internal_8db2f58a70f785756d45a7944452ba67855c590dfa72b0b4eb84131e8d4ef55e_prof);

    }

    // line 19
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_5192878d1faa2591b34a9ef9a425e660058865afcccf1a2fdfa86ceb3f157072 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5192878d1faa2591b34a9ef9a425e660058865afcccf1a2fdfa86ceb3f157072->enter($__internal_5192878d1faa2591b34a9ef9a425e660058865afcccf1a2fdfa86ceb3f157072_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        
        $__internal_5192878d1faa2591b34a9ef9a425e660058865afcccf1a2fdfa86ceb3f157072->leave($__internal_5192878d1faa2591b34a9ef9a425e660058865afcccf1a2fdfa86ceb3f157072_prof);

    }

    // line 21
    public function block_header($context, array $blocks = array())
    {
        $__internal_b91bf38a8f3c4bf957f8d9c25c2d137f8545d6b3058003a52df17aa00efce4ba = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b91bf38a8f3c4bf957f8d9c25c2d137f8545d6b3058003a52df17aa00efce4ba->enter($__internal_b91bf38a8f3c4bf957f8d9c25c2d137f8545d6b3058003a52df17aa00efce4ba_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 22
        echo "    <header style=\"padding-bottom: 20px\">
        <div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
            <div class=\"container\">
                <div class=\"navbar-header\">
                    <a href=\"";
        // line 26
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("blog_index");
        echo "\" class=\"navbar-brand\">UBERPAPERS</a>

                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                </div>
                <div class=\"navbar-collapse collapse\">
                    <ul class=\"nav navbar-nav navbar-right\">
                        ";
        // line 36
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 37
            echo "                            ";
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "getUser", array(), "method"), "isAdmin", array())) {
                // line 38
                echo "                                <li>
                                    <a>Admin</a>
                                </li>
                            ";
            }
            // line 42
            echo "                            <li>
                                <a href=\"";
            // line 43
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_create");
            echo "\">
                                    Create Article
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 48
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_profile");
            echo "\">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 53
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("security_logout");
            echo "\">
                                    Logout
                                </a>
                            </li>
                        ";
        } else {
            // line 58
            echo "                            <li>
                                <a href=\"";
            // line 59
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_register");
            echo "\">
                                    Register
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 64
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("security_login");
            echo "\">
                                    Login
                                </a>
                            </li>
                        ";
        }
        // line 69
        echo "                    </ul>
                </div>
            </div>
        </div>
    </header>
";
        
        $__internal_b91bf38a8f3c4bf957f8d9c25c2d137f8545d6b3058003a52df17aa00efce4ba->leave($__internal_b91bf38a8f3c4bf957f8d9c25c2d137f8545d6b3058003a52df17aa00efce4ba_prof);

    }

    // line 77
    public function block_body($context, array $blocks = array())
    {
        $__internal_848bb1504118ca3844f9fd8cd09635de8132f3b669816daacd5266e1b4581a2b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_848bb1504118ca3844f9fd8cd09635de8132f3b669816daacd5266e1b4581a2b->enter($__internal_848bb1504118ca3844f9fd8cd09635de8132f3b669816daacd5266e1b4581a2b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 78
        echo "        <div style=\"padding-top: 60px\">
            <div class=\"col-md-2\" style=\"text-align: center\">
                <div class=\"list-group\">
                    <a class=\"list-group-item\" href=\"#\">Cars</a>
                    <a class=\"list-group-item\" href=\"#\">Anime</a>
                    <a class=\"list-group-item\" href=\"#\">Nature</a>
                    <a class=\"list-group-item\" href=\"#\">Space</a>
                    <a class=\"list-group-item\" href=\"#\">Animals</a>
                    <a class=\"list-group-item\" href=\"#\">Abstract</a>
                </div>
            </div>
            <div id=\"main\" class=\"well col-md-8\">
                ";
        // line 90
        $this->displayBlock('main', $context, $blocks);
        // line 93
        echo "            </div>
            <div class=\"col-md-2\" style=\"text-align: center\">
                    <div class=\"list-group\">
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                    </div>
            </div>
        </div>
    ";
        
        $__internal_848bb1504118ca3844f9fd8cd09635de8132f3b669816daacd5266e1b4581a2b->leave($__internal_848bb1504118ca3844f9fd8cd09635de8132f3b669816daacd5266e1b4581a2b_prof);

    }

    // line 90
    public function block_main($context, array $blocks = array())
    {
        $__internal_547e07fcc3043ad8aa1354cb76c285c9ecfbd23a2af6883afff6b4e43b52c8a1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_547e07fcc3043ad8aa1354cb76c285c9ecfbd23a2af6883afff6b4e43b52c8a1->enter($__internal_547e07fcc3043ad8aa1354cb76c285c9ecfbd23a2af6883afff6b4e43b52c8a1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 91
        echo "
                ";
        
        $__internal_547e07fcc3043ad8aa1354cb76c285c9ecfbd23a2af6883afff6b4e43b52c8a1->leave($__internal_547e07fcc3043ad8aa1354cb76c285c9ecfbd23a2af6883afff6b4e43b52c8a1_prof);

    }

    // line 108
    public function block_footer($context, array $blocks = array())
    {
        $__internal_117b2a3d3a94a3e5ace17321e076e1e8220e7c99d12707bd3d4c55bedf23c9c7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_117b2a3d3a94a3e5ace17321e076e1e8220e7c99d12707bd3d4c55bedf23c9c7->enter($__internal_117b2a3d3a94a3e5ace17321e076e1e8220e7c99d12707bd3d4c55bedf23c9c7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 109
        echo "    <footer>
        <div class=\"container-fluid navbar-default navbar-fixed-bottom\">
            <p class=\"navbar-right\">&copy; 2016 - Uberpapers</p>
        </div>
    </footer>
";
        
        $__internal_117b2a3d3a94a3e5ace17321e076e1e8220e7c99d12707bd3d4c55bedf23c9c7->leave($__internal_117b2a3d3a94a3e5ace17321e076e1e8220e7c99d12707bd3d4c55bedf23c9c7_prof);

    }

    // line 116
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_76303a844e1c89cc2a81a5a67a649c40768c1ea97de296cf3b0ae0eb48f5b8fa = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_76303a844e1c89cc2a81a5a67a649c40768c1ea97de296cf3b0ae0eb48f5b8fa->enter($__internal_76303a844e1c89cc2a81a5a67a649c40768c1ea97de296cf3b0ae0eb48f5b8fa_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 117
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-2.2.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 118
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/moment.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 119
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 120
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_76303a844e1c89cc2a81a5a67a649c40768c1ea97de296cf3b0ae0eb48f5b8fa->leave($__internal_76303a844e1c89cc2a81a5a67a649c40768c1ea97de296cf3b0ae0eb48f5b8fa_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  313 => 120,  309 => 119,  305 => 118,  300 => 117,  294 => 116,  282 => 109,  276 => 108,  268 => 91,  262 => 90,  243 => 93,  241 => 90,  227 => 78,  221 => 77,  209 => 69,  201 => 64,  193 => 59,  190 => 58,  182 => 53,  174 => 48,  166 => 43,  163 => 42,  157 => 38,  154 => 37,  152 => 36,  139 => 26,  133 => 22,  127 => 21,  116 => 19,  107 => 14,  102 => 13,  96 => 12,  84 => 11,  74 => 122,  72 => 116,  69 => 115,  67 => 108,  63 => 106,  61 => 77,  57 => 75,  55 => 21,  50 => 19,  43 => 16,  41 => 12,  37 => 11,  30 => 6,);
    }

    public function getSource()
    {
        return "{#
   This is the base template used as the application layout which contains the
   common elements and decorates all the other templates.
   See http://symfony.com/doc/current/book/templating.html#template-inheritance-and-layouts
#}
<!DOCTYPE html>
<html lang=\"en-US\">
<head>
    <meta charset=\"UTF-8\"/>
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"/>
    <title>{% block title %}SoftUni Blog{% endblock %}</title>
    {% block stylesheets %}
        <link rel=\"stylesheet\" href=\"{{ asset('css/style.css') }}\">
        <link rel=\"stylesheet\" href=\"{{ asset('css/bootstrap-datetimepicker.min.css') }}\">
    {% endblock %}
    <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\"/>
</head>

<body id=\"{% block body_id %}{% endblock %}\">

{% block header %}
    <header style=\"padding-bottom: 20px\">
        <div class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
            <div class=\"container\">
                <div class=\"navbar-header\">
                    <a href=\"{{ path('blog_index') }}\" class=\"navbar-brand\">UBERPAPERS</a>

                    <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\".navbar-collapse\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                </div>
                <div class=\"navbar-collapse collapse\">
                    <ul class=\"nav navbar-nav navbar-right\">
                        {% if app.user %}
                            {% if app.getUser().isAdmin %}
                                <li>
                                    <a>Admin</a>
                                </li>
                            {% endif %}
                            <li>
                                <a href=\"{{ path('article_create') }}\">
                                    Create Article
                                </a>
                            </li>
                            <li>
                                <a href=\"{{ path('user_profile') }}\">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href=\"{{ path('security_logout') }}\">
                                    Logout
                                </a>
                            </li>
                        {% else %}
                            <li>
                                <a href=\"{{ path('user_register') }}\">
                                    Register
                                </a>
                            </li>
                            <li>
                                <a href=\"{{ path('security_login') }}\">
                                    Login
                                </a>
                            </li>
                        {% endif %}
                    </ul>
                </div>
            </div>
        </div>
    </header>
{% endblock %}

<div class=\"container-fluid\">
    {% block body %}
        <div style=\"padding-top: 60px\">
            <div class=\"col-md-2\" style=\"text-align: center\">
                <div class=\"list-group\">
                    <a class=\"list-group-item\" href=\"#\">Cars</a>
                    <a class=\"list-group-item\" href=\"#\">Anime</a>
                    <a class=\"list-group-item\" href=\"#\">Nature</a>
                    <a class=\"list-group-item\" href=\"#\">Space</a>
                    <a class=\"list-group-item\" href=\"#\">Animals</a>
                    <a class=\"list-group-item\" href=\"#\">Abstract</a>
                </div>
            </div>
            <div id=\"main\" class=\"well col-md-8\">
                {% block main %}

                {% endblock %}
            </div>
            <div class=\"col-md-2\" style=\"text-align: center\">
                    <div class=\"list-group\">
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                        <a class=\"list-group-item\" href=\"#\">1024x768</a>
                    </div>
            </div>
        </div>
    {% endblock %}
</div>

{% block footer %}
    <footer>
        <div class=\"container-fluid navbar-default navbar-fixed-bottom\">
            <p class=\"navbar-right\">&copy; 2016 - Uberpapers</p>
        </div>
    </footer>
{% endblock %}

{% block javascripts %}
    <script src=\"{{ asset('js/jquery-2.2.4.min.js') }}\"></script>
    <script src=\"{{ asset('js/moment.min.js') }}\"></script>
    <script src=\"{{ asset('js/bootstrap.js') }}\"></script>
    <script src=\"{{ asset('js/bootstrap-datetimepicker.min.js') }}\"></script>
{% endblock %}

</body>
</html>
";
    }
}
