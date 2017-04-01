<?php

/* table.twig */
class __TwigTemplate_05e8bd8f5b22b72fd26b83f173016dfad6af11217652f7998f58dc7d85a2cea3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<table style=\"float:left;margin: 15px\">
    <thead>
    <tr>
        <th>Описание</th>
        <th>Дата</th>
        <th>Статус</th>
        <th>Изменить</th>
        <th>Выполнить</th>
        <th>Удалить</th>
        <th>Исполнитель</th>
        <th>Создатель задачи</th>
    </tr>
    </thead>
    <tbody>
    ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["list"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 16
            echo "        <tr>
            <td>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html");
            echo "</td>
            <td>";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "date_added", array()), "html", null, true);
            echo "</td>
            <td style=\"color: ";
            // line 19
            echo (($this->getAttribute($context["item"], "is_done", array())) ? ("green") : ("red"));
            echo "\">
                ";
            // line 20
            echo (($this->getAttribute($context["item"], "is_done", array())) ? ("Выполнено") : ("Не выполнено"));
            echo "
            </td>

            <td>
                ";
            // line 24
            if (($this->getAttribute(($context["authorname"] ?? null), $context["key"], array(), "array") == ($context["yourLogin"] ?? null))) {
                // line 25
                echo "                    ";
                if ((($context["update_id"] ?? null) && (($context["update_id"] ?? null) == $this->getAttribute($context["item"], "id", array())))) {
                    // line 26
                    echo "                        Изменяется
                    ";
                } else {
                    // line 28
                    echo "                        <a href=\"index.php?update_id=";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo "\">Изменить</a>
                    ";
                }
                // line 30
                echo "                ";
            }
            // line 31
            echo "            </td>
            <td>
                ";
            // line 33
            if ($this->getAttribute($context["item"], "is_done", array())) {
                // line 34
                echo "                    Готово
                ";
            } else {
                // line 36
                echo "                    ";
                if (($this->getAttribute(($context["username"] ?? null), $context["key"], array(), "array") == ($context["yourLogin"] ?? null))) {
                    // line 37
                    echo "                        <a href=\"taskList.php?id=";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                    echo "\">Выполнить</a>
                    ";
                }
                // line 39
                echo "                ";
            }
            // line 40
            echo "            </td>
            <td>
                ";
            // line 42
            if (($this->getAttribute(($context["authorname"] ?? null), $context["key"], array(), "array") == ($context["yourLogin"] ?? null))) {
                // line 43
                echo "                    <a href=\"taskList.php?del=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
                echo "\">Удалить</a>
                ";
            }
            // line 45
            echo "            </td>
            <td>
                ";
            // line 47
            if ((($this->getAttribute(($context["username"] ?? null), $context["key"], array(), "array") == null) || ($this->getAttribute(($context["username"] ?? null), $context["key"], array(), "array") == ($context["yourLogin"] ?? null)))) {
                // line 48
                echo "                    Вы
                ";
            } else {
                // line 50
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["username"] ?? null), $context["key"], array(), "array"), "html", null, true);
                echo "
                ";
            }
            // line 52
            echo "            </td>
            <td>
                ";
            // line 54
            if ((($this->getAttribute(($context["authorname"] ?? null), $context["key"], array(), "array") == null) || ($this->getAttribute(($context["authorname"] ?? null), $context["key"], array(), "array") == ($context["yourLogin"] ?? null)))) {
                // line 55
                echo "                    Вы
                ";
            } else {
                // line 57
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["authorname"] ?? null), $context["key"], array(), "array"), "html", null, true);
                echo "
                ";
            }
            // line 59
            echo "            </td>
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "    </tbody>
</table>";
    }

    public function getTemplateName()
    {
        return "table.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 62,  145 => 59,  139 => 57,  135 => 55,  133 => 54,  129 => 52,  123 => 50,  119 => 48,  117 => 47,  113 => 45,  107 => 43,  105 => 42,  101 => 40,  98 => 39,  92 => 37,  89 => 36,  85 => 34,  83 => 33,  79 => 31,  76 => 30,  70 => 28,  66 => 26,  63 => 25,  61 => 24,  54 => 20,  50 => 19,  46 => 18,  42 => 17,  39 => 16,  35 => 15,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "table.twig", "D:\\LocalHost\\os\\OpenServer\\domains\\work-18\\templates\\table.twig");
    }
}
