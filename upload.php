<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['arquivo'])) {
  $arquivo = $_FILES['arquivo'];

  // Verifica se houve algum erro no upload
  if ($arquivo['error'] !== UPLOAD_ERR_OK) {
    echo "Erro ao realizar o upload do arquivo.";
    exit;
  }

  // Move o arquivo para o diretório desejado
  $diretorioDestino = 'docs_informacoes/';
  $nomeArquivo = basename($arquivo['name']);
  $caminhoCompleto = $diretorioDestino . $nomeArquivo;

  if (move_uploaded_file($arquivo['tmp_name'], $caminhoCompleto)) {
    echo "Upload realizado com sucesso: " . $nomeArquivo;
  } else {
    echo "Erro ao mover o arquivo para o diretório de destino.";
  }
} else {
  echo "Erro ao realizar o upload do arquivo. Formulário não enviado corretamente.";
}
?>