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

/* database/qbe/sort_select_cell.twig */
class __TwigTemplate_b42013462326f91c1596daf99b846a7374fb73f536c19b431ced9384ea83d764 extends \Twig\Template
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
        echo "<td class=\"center\">
    <select style=\"width:";
        // line 2
        echo twig_escape_filter($this->env, ($context["real_width"] ?? null), "html", null, true);
        echo "\" name=\"criteriaSort[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\" size=\"1\">
        <option value=\"\">&nbsp;</option>
        <option value=\"ASC\"";
        // line 5
        echo (((($context["selected"] ?? null) == "ASC")) ? (" selected=\"selected\"") : (""));
        echo ">";
        echo _gettext("Ascending");
        echo "</option>
        <option value=\"DESC\"";
        // line 7
        echo (((($context["selected"] ?? null) == "DESC")) ? (" selected=\"selected\"") : (""));
        echo ">";
        echo _gettext("Descending");
        echo "</option>
    </select>
</td>
";
    }

    public function getTemplateName()
    {
        return "database/qbe/sort_select_cell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 7,  40 => 5,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "database/qbe/sort_select_cell.twig", "/usr/local/www/phpMyAdmin/templates/database/qbe/sort_select_cell.twig");
    }
}
