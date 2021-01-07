<?php
$arquivos = array(0 => "music.mp4",
                  1 => "video.mov",
                  2 => "imagem.jpeg");

echo retornarExtensaoArquivo($arquivos[0]). "<br>";
echo retornarExtensaoArquivo($arquivos[1]). "<br>";
echo retornarExtensaoArquivo($arquivos[2]). "<br>";

function retornarExtensaoArquivo(string $arquivo) {
    $arquivo = explode(".", $arquivo);
    return "." . $arquivo[1];
}