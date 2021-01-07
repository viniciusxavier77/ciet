<?php
namespace ciet\exercicio4\model\UsuarioModel;

use function fwrite;
use function fopen;
use function fclose;
use function filter_var;
use function preg_match;
use function json_encode;
use function str_replace;

class UsuarioModel
{
    public string $mensagem = "Cadastro efetuado com sucesso!<br><br>";

    /**
     * @param array $dados
     * @return string|null
     */
    public function salvarDados(array $dados) {
        $arquivo = "registros.txt";

        //valida dados do e-mail
        if (!$this->validarEmail($dados['email'])) {
            $this->mensagem = 'E-mail inválido<br><br>';
            return $this->mensagem;
        }

        if (!$this->validarTelefone($dados['telefone'])) {
            $this->mensagem = 'Digite um número de telefone válido<br><br>';
            return $this->mensagem;
        }

        if (file_exists($arquivo)) {
            $dados2 = fopen($arquivo, "r+");

            while(!feof($dados2)){
                $linha = fgets($dados2);

                if(preg_match("/".$dados['email']."/", $linha)) {
                    $this->mensagem = 'O e-mail já encontra-se cadastrado!<br><br>';
                    return $this->mensagem;
                 }

                if(preg_match("/".$dados['login']."/", $linha)) {
                    $this->mensagem = 'O login já encontra-se cadastrado!<br><br>';
                    return $this->mensagem;
                }
            }
            fclose($arquivo);
        }

        $fp = fopen($arquivo, "a");

        if (fwrite($fp, json_encode($dados)."\n") === false ) {
            $this->mensagem = 'Ocorreu um erro e não foi possível salvar a informação<br><br>';
            fclose($fp);
            return $this->mensagem;
        };

        fclose($fp);
        return $this->mensagem;
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function validarEmail(string $email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @param int $telefone
     * @return bool
     */
    public function validarTelefone(int $telefone) {
        $telefone= trim(str_replace('/', '',
            str_replace(' ', '',
                str_replace('-', '',
                    str_replace(')', '', str_replace('(', '', $telefone))))));

        $regexTelefone = "/\(?\d{2}\)?\s?\d{5}\-?\d{4}/";

        if (preg_match($regexTelefone, $telefone)) {
            return true;
        }else{
            return false;
        }
    }
}



