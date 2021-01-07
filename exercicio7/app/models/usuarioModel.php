<?php
namespace ciet\exercicio7\app\models\UsuarioModel;

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
    public function salvarUsuario(array $dados) {
        $arquivo = "registros.txt";

        if (file_exists($arquivo)) {
            $dados2 = fopen($arquivo, "r+");

            while(!feof($dados2)){
                $linha = fgets($dados2);

                if(preg_match("/".$dados['loginUsuario']."/", $linha)) {
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

    public function retornarUsuarios () {
        $arquivo = "registros.txt";

        if (file_exists($arquivo)) {
            $dados2 = fopen($arquivo, "r+");

            $retorno = fread($dados2, filesize($arquivo));

            fclose($arquivo);

            return $retorno;
        }
    }

    public function excluirUsuario(string $emailUsuario) {
        $arquivo = "registros.txt";

        if (file_exists($arquivo)) {
            $arquivo = fopen($arquivo, "r+");

            while(!feof($arquivo)){
                $linha = fgets($arquivo);

                if(!preg_match("/".$emailUsuario."/", $linha)) {
                    $conteudo.= $linha;
                }
            }

            rewind($arquivo);
            ftruncate($arquivo, 0);
            if (!fwrite($arquivo, $conteudo)) {
                exit('Dados não foram excluídos');
            }

            fclose($arquivo);
        }
    }

    public function editarUsuario(array $dados) {
        $arquivo = "registros.txt";

        if (file_exists($arquivo)) {
            $arquivo = fopen($arquivo, "r+");

            while(!feof($arquivo)){
                $linha = fgets($arquivo);

                if(!preg_match("/".$dados['loginUsuario']."/", $linha)) {
                    $conteudo.= $linha;
                }
            }

            rewind($arquivo);
            ftruncate($arquivo, 0);
            $conteudo.= json_encode($dados);
            if (!fwrite($arquivo, $conteudo)) {
                exit('Dados não foram excluídos');
            }

            fclose($arquivo);

            return "Dados alterados com sucesso!";
        }
    }
}