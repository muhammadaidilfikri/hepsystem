<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* server/binlog/log_selector.twig */
class __TwigTemplate_246f425e7db770158075d797b4caaf7f820982f0ef3ee77216945462064f25ab extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<form action=\"server_binlog.php\" method=\"post\">
    ";
        // line 2
        echo PhpMyAdmin\Url::getHiddenInputs(($context["url_params"] ?? null));
        echo "
    <fieldset>
        <legend>
            ";
        // line 5
        echo _gettext("Select binary log to view");
        // line 6
        echo "        </legend>
        ";
        // line 7
        $context["full_size"] = 0;
        // line 8
        echo "        <select name=\"log\">
            ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["binary_logs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["each_log"]) {
            // line 10
            echo "                <option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["each_log"], "Log_name", [], "array"), "html", null, true);
            echo "\"";
            // line 11
            echo ((($this->getAttribute($context["each_log"], "Log_name", [], "array") == ($context["log"] ?? null))) ? (" selected=\"selected\"") : (""));
            echo ">
                    ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["each_log"], "Log_name", [], "array"), "html", null, true);
            echo "
                    ";
            // line 13
            if ($this->getAttribute($context["each_log"], "File_size", [], "array", true, true)) {
                // line 14
                echo "                        (";
                echo twig_escape_filter($this->env, twig_join_filter(PhpMyAdmin\Util::formatByteDown($this->getAttribute($context["each_log"], "File_size", [], "array"), 3, 2), " "), "html", null, true);
                echo ")
                        ";
                // line 15
                $context["full_size"] = (($context["full_size"] ?? null) + $this->getAttribute($context["each_log"], "File_size", [], "array"));
                // line 16
                echo "                    ";
            }
            // line 17
            echo "                </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['each_log'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "        </select>
        ";
        // line 20
        echo twig_escape_filter($this->env, twig_length_filter($this->env, ($context["binary_logs"] ?? null)), "html", null, true);
        echo "
        ";
        // line 21
        echo _gettext("Files");
        echo ",
        ";
        // line 22
        if ((($context["full_size"] ?? null) > 0)) {
            // line 23
            echo "            ";
            echo twig_escape_filter($this->env, twig_join_filter(PhpMyAdmin\Util::formatByteDown(($context["full_size"] ?? null)), " "), "html", null, true);
            echo "
        ";
        }
        // line 25
        echo "    </fieldset>
    <fieldset class=\"tblFooters\">
        <input type=\"submit\" value=\"";
        // line 27
        echo _gettext("Go");
        echo "\" />
    </fieldset>
</form>
";
    }

    public function getTemplateName()
    {
        return "server/binlog/log_selector.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 27,  103 => 25,  97 => 23,  95 => 22,  91 => 21,  87 => 20,  84 => 19,  77 => 17,  74 => 16,  72 => 15,  67 => 14,  65 => 13,  61 => 12,  57 => 11,  53 => 10,  49 => 9,  46 => 8,  44 => 7,  41 => 6,  39 => 5,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "server/binlog/log_selector.twig", "/usr/local/www/phpMyAdmin/templates/server/binlog/log_selector.twig");
    }
}
