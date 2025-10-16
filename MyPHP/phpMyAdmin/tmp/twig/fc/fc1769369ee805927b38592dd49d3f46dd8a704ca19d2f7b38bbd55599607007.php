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

/* database/qbe/sort_order_select_cell.twig */
class __TwigTemplate_52f1c75e0736da3d851cbf5d21f32621746a2df6b34646ea8692a20bdec34b1e extends \Twig\Template
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
    <select name=\"criteriaSortOrder[";
        // line 2
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\">
        <option value=\"1000\">&nbsp;</option>
        ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, ($context["total_column_count"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 5
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "\"";
            echo ((($context["i"] == ($context["sort_order"] ?? null))) ? (" selected=\"selected\"") : (""));
            echo ">
                ";
            // line 6
            echo twig_escape_filter($this->env, $context["i"], "html", null, true);
            echo "
            </option>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "    </select>
</td>
";
    }

    public function getTemplateName()
    {
        return "database/qbe/sort_order_select_cell.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 9,  49 => 6,  42 => 5,  38 => 4,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "database/qbe/sort_order_select_cell.twig", "/usr/local/www/phpMyAdmin/templates/database/qbe/sort_order_select_cell.twig");
    }
}
