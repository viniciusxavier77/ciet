<?php
namespace ciet\exercicio6\model\UseForm;

class UseForm
{
    /**
     * @param string $nome
     * @param array $valores
     * @return string
     */
    public function criarSelectField(string $nome, array $valores)
    {
        $formSelect = "<select name=".$nome." id=".$nome.">";

        foreach ($valores as $chave=>$valor) {
            $formSelect.= "<option value='{$chave}'>".$valor."</option>";
        }

        $formSelect.="</select>";

        return $formSelect;
    }
}