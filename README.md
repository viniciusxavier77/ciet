# CI&T
## Orientações API Rest

## Endpoints

## Salvar Usuário
 - URL: http://localhost/ciet/exercicio7/api.php/api/metodo/salvarUsuario
 - Método: POST
 - Forma de envio: JSON
 - Exemplo de corpo de envio:
    - {
    "nomeUsuario": "Vinícius Barbosa Xavier",
    "loginUsuario": "vinicius.xavier",
    "emailUsuario": "vinicius.xavier77@gmail.com"
     }
     
 ## Editar Usuário
 - URL: http://localhost/ciet/exercicio7/api.php/api/metodo/editarUsuario
 - Método: POST
 - Forma de envio: JSON
 - Exemplo de corpo de envio:
    - {
    "nomeUsuario": "Vinícius Barbosa Xavier",
    "loginUsuario": "vinicius.xavier",
    "emailUsuario": "vinicius.xavier77@gmail.com"
     }
     
  ## Excluír Usuário
 - URL: http://localhost/ciet/exercicio7/api.php/api/metodo/excluirUsuario
 - Método: POST
 - Forma de envio: JSON
 - Exemplo de corpo de envio:
    - {
    "emailUsuario": "vinicius.xavier77@gmail.com"
     }
     
  ## Retornar Usuários
 - URL: http://localhost/ciet/exercicio7/api.php/api/metodo/retornarUsuarios
 - Método: GET
 - Forma de envio: JSON
 
 ## Extra
 - Exemplos de chamadas foram colocados na pasta exercicio7/endpoints, onde existe uma collection em formato json para testes via Postman.
 
## Outros tópicos
 - Para que os respectivos arquivos txt's sejam criados, lembrar da permissão para leitura e escrita no diretório de criação.
