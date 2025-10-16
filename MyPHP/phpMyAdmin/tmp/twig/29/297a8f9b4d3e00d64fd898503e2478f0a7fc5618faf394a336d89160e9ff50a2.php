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

/* database/designer/database_tables.twig */
class __TwigTemplate_4ef7ffd2ccb608f31f22d110cfeca86b21020dbf3c70e1915d3150ccb78a1130 extends \Twig\Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tables"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["designerTable"]) {
            // line 2
            echo "    ";
            $context["i"] = $this->getAttribute($context["loop"], "index0", []);
            // line 3
            echo "    ";
            $context["t_n_url"] = twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDbTableString", [], "method"), "url");
            // line 4
            echo "    ";
            $context["t_n"] = $this->getAttribute($context["designerTable"], "getDbTableString", [], "method");
            // line 5
            echo "    <input name=\"t_x[";
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_x_";
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "_\" />
    <input name=\"t_y[";
            // line 6
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_y_";
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "_\" />
    <input name=\"t_v[";
            // line 7
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_v_";
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "_\" />
    <input name=\"t_h[";
            // line 8
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_h_";
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "_\" />
    <table id=\"";
            // line 9
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\"
        db_url=\"";
            // line 10
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDatabaseName", [], "method"), "url"), "html", null, true);
            echo "\"
        table_name_url=\"";
            // line 11
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getTableName", [], "method"), "url"), "html", null, true);
            echo "\"
        cellpadding=\"0\"
        cellspacing=\"0\"
        class=\"designer_tab\"
        style=\"position:absolute; left:";
            // line 16
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array", true, true)) ? ($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array"), "X", [], "array")) : (twig_random($this->env, range(20, 700)))), "html", null, true);
            echo "px; top:";
            // line 17
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array", true, true)) ? ($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array"), "Y", [], "array")) : (twig_random($this->env, range(20, 550)))), "html", null, true);
            echo "px; display:";
            // line 18
            echo ((($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array", true, true) || (($context["display_page"] ?? null) ==  -1))) ? ("block") : ("none"));
            echo "; z-index: 1;\">
        <thead>
            <tr class=\"header\">
                ";
            // line 21
            if (($context["has_query"] ?? null)) {
                // line 22
                echo "                    <td class=\"select_all\">
                        <input class=\"select_all_1\"
                            type=\"checkbox\"
                            style=\"margin: 0;\"
                            value=\"select_all_";
                // line 26
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo "\"
                            id=\"select_all_";
                // line 27
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo "\"
                            title=\"select all\"
                            designer_url_table_name=\"";
                // line 29
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo "\"
                            designer_out_owner=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDatabaseName", [], "method"), "html", null, true);
                echo "\">
                    </td>
                ";
            }
            // line 33
            echo "                <td class=\"small_tab\"
                    title=\"";
            // line 34
            echo _gettext("Show/hide columns");
            echo "\"
                    id=\"id_hide_tbody_";
            // line 35
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\"
                    table_name=\"";
            // line 36
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\">";
            echo ((( !$this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array", true, true) ||  !twig_test_empty($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array"), "V", [], "array")))) ? ("v") : ("&gt;"));
            echo "</td>
                <td class=\"small_tab_pref small_tab_pref_1\"
                    db=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDatabaseName", [], "method"), "html", null, true);
            echo "\"
                    db_url=\"";
            // line 39
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDatabaseName", [], "method"), "url"), "html", null, true);
            echo "\"
                    table_name=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getTableName", [], "method"), "html", null, true);
            echo "\"
                    table_name_url=\"";
            // line 41
            echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getTableName", [], "method"), "url"), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/exec_small.png"], "method"), "html", null, true);
            echo "\"
                        title=\"";
            // line 43
            echo _gettext("See table structure");
            echo "\" />
                </td>
                <td id=\"id_zag_";
            // line 45
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\"
                    class=\"tab_zag nowrap tab_zag_noquery\"
                    table_name=\"";
            // line 47
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\"
                    query_set=\"";
            // line 48
            echo ((($context["has_query"] ?? null)) ? (1) : (0));
            echo "\">
                    <span class=\"owner\">";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($context["designerTable"], "getDatabaseName", [], "method"), "html", null, true);
            echo "</span>
                    ";
            // line 50
            echo $this->getAttribute($context["designerTable"], "getTableName", [], "method");
            echo "
                </td>
                ";
            // line 52
            if (($context["has_query"] ?? null)) {
                // line 53
                echo "                    <td class=\"tab_zag tab_zag_query\"
                        id=\"id_zag_";
                // line 54
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo "_2\"
                        table_name=\"";
                // line 55
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo "\">
                    </td>
               ";
            }
            // line 58
            echo "            </tr>
        </thead>
        <tbody id=\"id_tbody_";
            // line 60
            echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
            echo "\"";
            // line 61
            echo ((($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array", true, true) && twig_test_empty($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), ($context["t_n"] ?? null), [], "array"), "V", [], "array")))) ? (" style=\"display: none\"") : (""));
            echo ">
            ";
            // line 62
            $context["display_field"] = call_user_func_array($this->env->getFunction('Relation_getDisplayField')->getCallable(), [($context["get_db"] ?? null), ($context["t_n"] ?? null)]);
            // line 63
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_ID", [], "array")) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                // line 64
                echo "                ";
                $context["tmp_column"] = ((($context["t_n"] ?? null) . ".") . $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"));
                // line 65
                echo "                ";
                $context["click_field_param"] = [0 =>                 // line 66
($context["t_n"] ?? null), 1 => twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(                // line 67
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"))];
                // line 69
                echo "                ";
                if ( !$this->getAttribute($context["designerTable"], "supportsForeignkeys", [], "method")) {
                    // line 70
                    echo "                    ";
                    $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => (($this->getAttribute(($context["tables_pk_or_unique_keys"] ?? null), ($context["tmp_column"] ?? null), [], "array", true, true)) ? (1) : (0))]);
                    // line 71
                    echo "                ";
                } else {
                    // line 72
                    echo "                    ";
                    // line 74
                    echo "                    ";
                    $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => (($this->getAttribute(($context["tables_all_keys"] ?? null), ($context["tmp_column"] ?? null), [], "array", true, true)) ? (1) : (0))]);
                    // line 75
                    echo "                ";
                }
                // line 76
                echo "                ";
                $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => ($context["db"] ?? null)]);
                // line 77
                echo "                <tr id=\"id_tr_";
                echo twig_escape_filter($this->env, ($context["t_n"] ?? null), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo "\" class=\"tab_field";
                // line 78
                echo (((($context["display_field"] ?? null) == $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"))) ? ("_3") : (""));
                echo "\" click_field_param=\"";
                // line 79
                echo twig_escape_filter($this->env, twig_join_filter(($context["click_field_param"] ?? null), ","), "html", null, true);
                echo "\">
                    ";
                // line 80
                if (($context["has_query"] ?? null)) {
                    // line 81
                    echo "                        <td class=\"select_all\">
                            <input class=\"select_all_store_col\"
                                value=\"";
                    // line 83
                    echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                type=\"checkbox\"
                                id=\"select_";
                    // line 85
                    echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                    echo "._";
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                style=\"margin: 0;\"
                                title=\"select_";
                    // line 87
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                store_column_param=\"";
                    // line 88
                    echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                    echo ",";
                    // line 89
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["owner_out"] ?? null), ($context["i"] ?? null), [], "array"), "html", null, true);
                    echo ",";
                    // line 90
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\">
                        </td>
                    ";
                }
                // line 93
                echo "                    <td width=\"10px\" colspan=\"3\" id=\"";
                echo twig_escape_filter($this->env, ($context["t_n_url"] ?? null), "html", null, true);
                echo ".";
                // line 94
                echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                echo "\">
                        <div class=\"nowrap\">
                            ";
                // line 96
                if ($this->getAttribute(($context["tables_pk_or_unique_keys"] ?? null), ((($context["t_n"] ?? null) . ".") . $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), [], "array", true, true)) {
                    // line 97
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/FieldKey_small.png"], "method"), "html", null, true);
                    echo "\" alt=\"*\" />
                            ";
                } else {
                    // line 99
                    echo "                                ";
                    $context["type"] = "designer/Field_small";
                    // line 100
                    echo "                                ";
                    if ((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "char") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 101
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "text"))) {
                        // line 102
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_char");
                        // line 103
                        echo "                                ";
                    } elseif ((((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "int") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 104
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "float")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 105
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "double")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 106
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "decimal"))) {
                        // line 107
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_int");
                        // line 108
                        echo "                                ";
                    } elseif (((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "date") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 109
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "time")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 110
($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "year"))) {
                        // line 111
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_date");
                        // line 112
                        echo "                                ";
                    }
                    // line 113
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => ($context["type"] ?? null)], "method"), "html", null, true);
                    echo ".png\" alt=\"*\" />
                            ";
                }
                // line 115
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo "
                        </div>
                    </td>
                    ";
                // line 118
                if (($context["has_query"] ?? null)) {
                    // line 119
                    echo "                        <td class=\"small_tab_pref small_tab_pref_click_opt\"
                            click_option_param=\"designer_optionse,";
                    // line 121
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), ($context["t_n"] ?? null), [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo ",";
                    // line 122
                    echo twig_escape_filter($this->env, ($context["t_n"] ?? null), "html", null, true);
                    echo "\">
                            <img src=\"";
                    // line 123
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/exec_small.png"], "method"), "html", null, true);
                    echo "\" title=\"options\" />
                        </td>
                    ";
                }
                // line 126
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 128
            echo "        </tbody>
    </table>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['designerTable'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "database/designer/database_tables.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  396 => 128,  389 => 126,  383 => 123,  379 => 122,  376 => 121,  373 => 119,  371 => 118,  362 => 115,  356 => 113,  353 => 112,  350 => 111,  348 => 110,  347 => 109,  345 => 108,  342 => 107,  340 => 106,  339 => 105,  338 => 104,  336 => 103,  333 => 102,  331 => 101,  329 => 100,  326 => 99,  320 => 97,  318 => 96,  313 => 94,  309 => 93,  303 => 90,  300 => 89,  297 => 88,  293 => 87,  286 => 85,  280 => 83,  276 => 81,  274 => 80,  270 => 79,  267 => 78,  261 => 77,  258 => 76,  255 => 75,  252 => 74,  250 => 72,  247 => 71,  244 => 70,  241 => 69,  239 => 67,  238 => 66,  236 => 65,  233 => 64,  228 => 63,  226 => 62,  222 => 61,  219 => 60,  215 => 58,  209 => 55,  205 => 54,  202 => 53,  200 => 52,  195 => 50,  191 => 49,  187 => 48,  183 => 47,  178 => 45,  173 => 43,  169 => 42,  165 => 41,  161 => 40,  157 => 39,  153 => 38,  146 => 36,  142 => 35,  138 => 34,  135 => 33,  129 => 30,  125 => 29,  120 => 27,  116 => 26,  110 => 22,  108 => 21,  102 => 18,  99 => 17,  96 => 16,  89 => 11,  85 => 10,  81 => 9,  75 => 8,  69 => 7,  63 => 6,  56 => 5,  53 => 4,  50 => 3,  47 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "database/designer/database_tables.twig", "/usr/local/www/phpMyAdmin/templates/database/designer/database_tables.twig");
    }
}
