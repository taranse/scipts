<?php

/* insert.twig */
class __TwigTemplate_2e99d0986d4ea0da16f983aef9ad058a19ac3d8b2f61720c2353645c5de10c05 extends Twig_Template
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
        echo "<form action=\"taskList.php\" method=\"get\">
    <label> Описание задачи <br>
        <textarea name=\"description\" cols=\"30\" rows=\"10\">";
        // line 3
        echo twig_escape_filter($this->env, ($context["description"] ?? null), "html", null, true);
        echo "</textarea>
    </label><br><br>
    <label> Закрепить за пользователем <br>
        <select name=\"user\">
            <option value=\"0\" ";
        // line 7
        echo (((($context["author"] ?? null) == 0)) ? ("selected") : (""));
        echo ">Моя задача</option>
            ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 9
            echo "                ";
            if ((($context["action"] ?? null) == "insert")) {
                // line 10
                echo "                    ";
                if ((($context["yourLogin"] ?? null) != $this->getAttribute($context["user"], "login", array()))) {
                    // line 11
                    echo "                        <option value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "login", array()), "html", null, true);
                    echo "</option>
                    ";
                }
                // line 13
                echo "                ";
            } elseif ((($context["action"] ?? null) == "update")) {
                // line 14
                echo "                    ";
                if (((($context["itemId"] ?? null) != 0) && (($context["yourLogin"] ?? null) != $this->getAttribute($context["user"], "login", array())))) {
                    // line 15
                    echo "                        <option ";
                    echo (((($context["userLogin"] ?? null) == $this->getAttribute($context["user"], "id", array()))) ? ("selected") : (""));
                    echo " value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                    echo "\" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "login", array()), "html", null, true);
                    echo "</option>
                    ";
                }
                // line 17
                echo "                ";
            }
            // line 18
            echo "
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
                    ";
        // line 22
        echo "            ";
        // line 23
        echo "            ";
        // line 24
        echo "        </select>
    </label><br><br>
    <input type=\"hidden\" name=\"update_id\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, ($context["update_id"] ?? null), "html", null, true);
        echo "\">
    <input type=\"hidden\" name=\"author\" value=\"";
        // line 27
        echo twig_escape_filter($this->env, ($context["yourId"] ?? null), "html", null, true);
        echo "\">
    <input type=\"submit\" value=\"Обновить задачу\" name=\"update_new_task\">
</form>";
    }

    public function getTemplateName()
    {
        return "insert.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 27,  89 => 26,  85 => 24,  83 => 23,  81 => 22,  78 => 20,  71 => 18,  68 => 17,  58 => 15,  55 => 14,  52 => 13,  44 => 11,  41 => 10,  38 => 9,  34 => 8,  30 => 7,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "insert.twig", "D:\\LocalHost\\os\\OpenServer\\domains\\work-18\\templates\\insert.twig");
    }
}
