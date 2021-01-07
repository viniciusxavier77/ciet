<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true' );
header('Access-Control-Request-Method: *');
# === api
# ==================================================
use ciet\exercicio7\app\models\UsuarioModel\UsuarioModel;

$app->post('/api/metodo/salvarUsuario', function () use ($app) {
    $json = $this->request->getBody();
    $data = json_decode($json); // parse the JSON into an assoc. array

    if (!empty($data->nomeUsuario)
        && !empty($data->loginUsuario)) {
        $usuario = new UsuarioModel();
        try{
            $dados = array();
            $dados['nomeUsuario'] = $data->nomeUsuario;
            $dados['loginUsuario'] = $data->loginUsuario;
            $dados['emailUsuario'] = $data->emailUsuario;

            $retorno = $usuario->salvarUsuario($dados);
            return $this->response->withJson($retorno);
        } catch (Exception $error) {
            return "Ocorreu o seguinte erro:". $error->getMessage();
        }
    }
});

$app->post('/api/metodo/excluirUsuario', function () use ($app) {
    $json = $this->request->getBody();
    $data = json_decode($json);

    if (!empty($data->emailUsuario)) {
        $usuarios = new UsuarioModel();
        try{
            $usuarios->excluirUsuario($data->emailUsuario);
            return "sucesso";
        } catch (Exception $error) {
            return "Ocorreu o seguinte erro:". $error->getMessage();
        }
    }
});

$app->get('/api/metodo/retornarUsuarios', function($request) use ($app) {

    $usuario = new UsuarioModel();
    $results = $usuario->retornarUsuarios();
    return $this->response->withJson($results);
});

$app->post('/api/metodo/editarUsuario', function () use ($app) {
    $json = $this->request->getBody();
    $data = json_decode($json); // parse the JSON into an assoc. array

    if (!empty($data->loginUsuario)) {
        $usuario = new UsuarioModel();
        try{
            $dados = array();
            $dados['nomeUsuario'] = $data->nomeUsuario;
            $dados['loginUsuario'] = $data->loginUsuario;
            $dados['emailUsuario'] = $data->emailUsuario;

            $retorno = $usuario->editarUsuario($dados);
            return $this->response->withJson($retorno);
        } catch (Exception $error) {
            return "Ocorreu o seguinte erro:". $error->getMessage();
        }
    }
});