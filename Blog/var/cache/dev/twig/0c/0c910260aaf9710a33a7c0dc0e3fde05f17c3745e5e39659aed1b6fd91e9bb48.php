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
            'sorting' => array($this, 'block_sorting'),
            'main' => array($this, 'block_main'),
            'pager' => array($this, 'block_pager'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_08e8bc1af7afbb35af5e3c0889e8e1cd72dc6451808b21571681dfb59b07be1f = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_08e8bc1af7afbb35af5e3c0889e8e1cd72dc6451808b21571681dfb59b07be1f->enter($__internal_08e8bc1af7afbb35af5e3c0889e8e1cd72dc6451808b21571681dfb59b07be1f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

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
        // line 87
        echo "
<div class=\"container-fluid\">
    ";
        // line 89
        $this->displayBlock('body', $context, $blocks);
        // line 122
        echo "</div>

";
        // line 124
        $this->displayBlock('pager', $context, $blocks);
        // line 127
        echo "
";
        // line 128
        $this->displayBlock('footer', $context, $blocks);
        // line 135
        echo "
";
        // line 136
        $this->displayBlock('javascripts', $context, $blocks);
        // line 142
        echo "
</body>
</html>
";
        
        $__internal_08e8bc1af7afbb35af5e3c0889e8e1cd72dc6451808b21571681dfb59b07be1f->leave($__internal_08e8bc1af7afbb35af5e3c0889e8e1cd72dc6451808b21571681dfb59b07be1f_prof);

    }

    // line 11
    public function block_title($context, array $blocks = array())
    {
        $__internal_91e89fc1140aca9a4d1c721ecf63ec81718580a2fd209355aafada4ea28509ae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_91e89fc1140aca9a4d1c721ecf63ec81718580a2fd209355aafada4ea28509ae->enter($__internal_91e89fc1140aca9a4d1c721ecf63ec81718580a2fd209355aafada4ea28509ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "SoftUni Blog";
        
        $__internal_91e89fc1140aca9a4d1c721ecf63ec81718580a2fd209355aafada4ea28509ae->leave($__internal_91e89fc1140aca9a4d1c721ecf63ec81718580a2fd209355aafada4ea28509ae_prof);

    }

    // line 12
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_1b96b4f7199f58c7b1404d7ab180a1b127402cb3f48a0bfa2b32c79f303bdb6b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1b96b4f7199f58c7b1404d7ab180a1b127402cb3f48a0bfa2b32c79f303bdb6b->enter($__internal_1b96b4f7199f58c7b1404d7ab180a1b127402cb3f48a0bfa2b32c79f303bdb6b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        echo "        <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/style.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/bootstrap-datetimepicker.min.css"), "html", null, true);
        echo "\">
    ";
        
        $__internal_1b96b4f7199f58c7b1404d7ab180a1b127402cb3f48a0bfa2b32c79f303bdb6b->leave($__internal_1b96b4f7199f58c7b1404d7ab180a1b127402cb3f48a0bfa2b32c79f303bdb6b_prof);

    }

    // line 19
    public function block_body_id($context, array $blocks = array())
    {
        $__internal_ba92bfbdf30dd902fbc54696899fdee2e2c1d78715e52bf97732e99b63972f42 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ba92bfbdf30dd902fbc54696899fdee2e2c1d78715e52bf97732e99b63972f42->enter($__internal_ba92bfbdf30dd902fbc54696899fdee2e2c1d78715e52bf97732e99b63972f42_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_id"));

        
        $__internal_ba92bfbdf30dd902fbc54696899fdee2e2c1d78715e52bf97732e99b63972f42->leave($__internal_ba92bfbdf30dd902fbc54696899fdee2e2c1d78715e52bf97732e99b63972f42_prof);

    }

    // line 21
    public function block_header($context, array $blocks = array())
    {
        $__internal_402013355f0e7c9a2641478729c1007cef900d4884b9ecd9594a2ae30bbe24cd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_402013355f0e7c9a2641478729c1007cef900d4884b9ecd9594a2ae30bbe24cd->enter($__internal_402013355f0e7c9a2641478729c1007cef900d4884b9ecd9594a2ae30bbe24cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "header"));

        // line 22
        echo "    <header style=\"padding-bottom: 10px\">
        <div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
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
                        <li>
                            <div class=\"navbar-form\" role=\"search\">
                                <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Search\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-default\">Search</button>
                            </div>
                        </li>
                        ";
        // line 44
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 45
            echo "                            ";
            if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "getUser", array(), "method"), "isAdmin", array())) {
                // line 46
                echo "                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                                       aria-expanded=\"false\">Admin<span class=\"caret\"></span></a>
                                    <ul class=\"dropdown-menu\" role=\"menu\">
                                        <li><a href=\"";
                // line 50
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_users");
                echo "\">Users</a></li>
                                    </ul>
                                </li>
                            ";
            }
            // line 54
            echo "                            <li>
                                <a href=\"";
            // line 55
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("article_create");
            echo "\">
                                    Create Article
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 60
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_profile");
            echo "\">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 65
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("security_logout");
            echo "\">
                                    Logout
                                </a>
                            </li>
                        ";
        } else {
            // line 70
            echo "                            <li>
                                <a href=\"";
            // line 71
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("user_register");
            echo "\">
                                    Register
                                </a>
                            </li>
                            <li>
                                <a href=\"";
            // line 76
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("security_login");
            echo "\">
                                    Login
                                </a>
                            </li>
                        ";
        }
        // line 81
        echo "                    </ul>
                </div>
            </div>
        </div>
    </header>
";
        
        $__internal_402013355f0e7c9a2641478729c1007cef900d4884b9ecd9594a2ae30bbe24cd->leave($__internal_402013355f0e7c9a2641478729c1007cef900d4884b9ecd9594a2ae30bbe24cd_prof);

    }

    // line 89
    public function block_body($context, array $blocks = array())
    {
        $__internal_166a6da284b36fd378039e7bf8817a22f8c14da9c6d32c3e45bb734cd3dd7096 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_166a6da284b36fd378039e7bf8817a22f8c14da9c6d32c3e45bb734cd3dd7096->enter($__internal_166a6da284b36fd378039e7bf8817a22f8c14da9c6d32c3e45bb734cd3dd7096_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 90
        echo "    ";
        $this->displayBlock('sorting', $context, $blocks);
        // line 93
        echo "</div>
    <div style=\"padding-top: 30px\">
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
        // line 106
        $this->displayBlock('main', $context, $blocks);
        // line 109
        echo "        </div>
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
        
        $__internal_166a6da284b36fd378039e7bf8817a22f8c14da9c6d32c3e45bb734cd3dd7096->leave($__internal_166a6da284b36fd378039e7bf8817a22f8c14da9c6d32c3e45bb734cd3dd7096_prof);

    }

    // line 90
    public function block_sorting($context, array $blocks = array())
    {
        $__internal_6e31f65156541690f18a71e76a788953cb58692c8fa29ba5e33bce677b8cd932 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6e31f65156541690f18a71e76a788953cb58692c8fa29ba5e33bce677b8cd932->enter($__internal_6e31f65156541690f18a71e76a788953cb58692c8fa29ba5e33bce677b8cd932_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "sorting"));

        // line 91
        echo "
    ";
        
        $__internal_6e31f65156541690f18a71e76a788953cb58692c8fa29ba5e33bce677b8cd932->leave($__internal_6e31f65156541690f18a71e76a788953cb58692c8fa29ba5e33bce677b8cd932_prof);

    }

    // line 106
    public function block_main($context, array $blocks = array())
    {
        $__internal_072f8368b7469510c2b1080039d403237327e8084d179e095b2da100d717ff44 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_072f8368b7469510c2b1080039d403237327e8084d179e095b2da100d717ff44->enter($__internal_072f8368b7469510c2b1080039d403237327e8084d179e095b2da100d717ff44_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "main"));

        // line 107
        echo "
            ";
        
        $__internal_072f8368b7469510c2b1080039d403237327e8084d179e095b2da100d717ff44->leave($__internal_072f8368b7469510c2b1080039d403237327e8084d179e095b2da100d717ff44_prof);

    }

    // line 124
    public function block_pager($context, array $blocks = array())
    {
        $__internal_2a98c2d38a0d15052bdf9c29f68b3c4f1b1f463f561203d91b431be9cc1216a7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2a98c2d38a0d15052bdf9c29f68b3c4f1b1f463f561203d91b431be9cc1216a7->enter($__internal_2a98c2d38a0d15052bdf9c29f68b3c4f1b1f463f561203d91b431be9cc1216a7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "pager"));

        // line 125
        echo "
";
        
        $__internal_2a98c2d38a0d15052bdf9c29f68b3c4f1b1f463f561203d91b431be9cc1216a7->leave($__internal_2a98c2d38a0d15052bdf9c29f68b3c4f1b1f463f561203d91b431be9cc1216a7_prof);

    }

    // line 128
    public function block_footer($context, array $blocks = array())
    {
        $__internal_d03b0273deaa53317322a72c26de79204c50bd215d65ec86d3fd2e1c7a2302b1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d03b0273deaa53317322a72c26de79204c50bd215d65ec86d3fd2e1c7a2302b1->enter($__internal_d03b0273deaa53317322a72c26de79204c50bd215d65ec86d3fd2e1c7a2302b1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "footer"));

        // line 129
        echo "    <footer style=\"padding-top: 30px\">
        <div class=\"container-fluid navbar-default navbar-fixed-bottom push\">
            <p class=\"navbar-right\">&copy; 2016 - Uberpapers, Bulgaria</p>
        </div>
    </footer>
";
        
        $__internal_d03b0273deaa53317322a72c26de79204c50bd215d65ec86d3fd2e1c7a2302b1->leave($__internal_d03b0273deaa53317322a72c26de79204c50bd215d65ec86d3fd2e1c7a2302b1_prof);

    }

    // line 136
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_ef87407c88e38bde3f16773970237575a66bd58b649923eaa79afda905ac57b5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ef87407c88e38bde3f16773970237575a66bd58b649923eaa79afda905ac57b5->enter($__internal_ef87407c88e38bde3f16773970237575a66bd58b649923eaa79afda905ac57b5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 137
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/jquery-2.2.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 138
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/moment.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 139
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 140
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/bootstrap-datetimepicker.min.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_ef87407c88e38bde3f16773970237575a66bd58b649923eaa79afda905ac57b5->leave($__internal_ef87407c88e38bde3f16773970237575a66bd58b649923eaa79afda905ac57b5_prof);

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
        return array (  367 => 140,  363 => 139,  359 => 138,  354 => 137,  348 => 136,  336 => 129,  330 => 128,  322 => 125,  316 => 124,  308 => 107,  302 => 106,  294 => 91,  288 => 90,  269 => 109,  267 => 106,  252 => 93,  249 => 90,  243 => 89,  231 => 81,  223 => 76,  215 => 71,  212 => 70,  204 => 65,  196 => 60,  188 => 55,  185 => 54,  178 => 50,  172 => 46,  169 => 45,  167 => 44,  146 => 26,  140 => 22,  134 => 21,  123 => 19,  114 => 14,  109 => 13,  103 => 12,  91 => 11,  81 => 142,  79 => 136,  76 => 135,  74 => 128,  71 => 127,  69 => 124,  65 => 122,  63 => 89,  59 => 87,  57 => 21,  52 => 19,  45 => 16,  43 => 12,  39 => 11,  32 => 6,);
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
    <header style=\"padding-bottom: 10px\">
        <div class=\"navbar navbar-default navbar-static-top\" role=\"navigation\">
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
                        <li>
                            <div class=\"navbar-form\" role=\"search\">
                                <div class=\"form-group\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Search\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-default\">Search</button>
                            </div>
                        </li>
                        {% if app.user %}
                            {% if app.getUser().isAdmin %}
                                <li class=\"dropdown\">
                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" role=\"button\"
                                       aria-expanded=\"false\">Admin<span class=\"caret\"></span></a>
                                    <ul class=\"dropdown-menu\" role=\"menu\">
                                        <li><a href=\"{{ path ('admin_users') }}\">Users</a></li>
                                    </ul>
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
    {% block sorting %}

    {% endblock %}
</div>
    <div style=\"padding-top: 30px\">
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

{% block pager %}

{% endblock %}

{% block footer %}
    <footer style=\"padding-top: 30px\">
        <div class=\"container-fluid navbar-default navbar-fixed-bottom push\">
            <p class=\"navbar-right\">&copy; 2016 - Uberpapers, Bulgaria</p>
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
