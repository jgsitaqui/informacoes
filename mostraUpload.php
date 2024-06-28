<?php
session_start();
if (!isset($_SESSION['codigo_usuario']) || time() > $_SESSION['expiracao']) {
    session_destroy(); // Encerra a sessão
    header('Location: index.php'); // Redireciona para a página de login
    exit;
}
// Resto do conteúdo da página
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Upload - Veppo - Call Center</title>
    <!-- Adicionando Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adicionando Bootstrap JS e dependências do jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <style>
        .drop-zone {
            border: 2px dashed #800020;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            color: #a52a2a;
        }

        .drop-zone.dragover {
            background-color: #e9ecef;
        }
    </style>
    <script>
        function mostrarNomeArquivo(arquivo) {
            var nomeArquivoLabel = document.querySelector('.custom-file-label');
            nomeArquivoLabel.textContent = arquivo.name;
        }

        function validarTamanhoArquivo(arquivo) {
            var tamanhoMaximo = 8 * 1024 * 1024; // 8 MB em bytes
            return arquivo.size <= tamanhoMaximo;
        }

        function enviarFormulario(arquivo) {
            if (!validarTamanhoArquivo(arquivo)) {
                document.getElementById('resultado').innerHTML = '<div class="alert alert-danger mt-3" role="alert">Erro: O arquivo excede o tamanho máximo de 8 MB.</div>';
                return;
            }

            var formData = new FormData();
            formData.append('arquivo', arquivo);

            var xhr = new XMLHttpRequest();

            // Configuração da barra de progresso do Bootstrap
            var progressBar = document.getElementById('progressBar');
            progressBar.style.width = '0%';
            progressBar.textContent = '0%';

            // Função para monitorar o progresso do upload
            xhr.upload.addEventListener('progress', function (event) {
                if (event.lengthComputable) {
                    var percentual = Math.round((event.loaded / event.total) * 100);
                    progressBar.style.width = percentual + '%';
                    progressBar.textContent = percentual + '%';
                }
            });

            // Função para tratar a resposta do servidor
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById('resultado').innerHTML = '<div class="alert alert-success mt-3" role="alert">Upload realizado com sucesso: ' + xhr.responseText + '</div>';
                } else {
                    document.getElementById('resultado').innerHTML = '<div class="alert alert-danger mt-3" role="alert">Erro ao realizar o upload.</div>';
                }

                setTimeout(function () {
                    progressBar.style.width = '0%';
                    progressBar.textContent = '0%';
                }, 3000);
            };

            xhr.open('POST', 'upload.php', true);
            xhr.send(formData);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var dropZone = document.getElementById('dropZone');
            var arquivoInput = document.getElementById('arquivoInput');

            dropZone.addEventListener('dragover', function (event) {
                event.preventDefault();
                dropZone.classList.add('dragover');
            });

            dropZone.addEventListener('dragleave', function () {
                dropZone.classList.remove('dragover');
            });

            dropZone.addEventListener('drop', function (event) {
                event.preventDefault();
                dropZone.classList.remove('dragover');
                var arquivo = event.dataTransfer.files[0];
                mostrarNomeArquivo(arquivo);
                enviarFormulario(arquivo);
            });

            arquivoInput.addEventListener('change', function () {
                var arquivo = arquivoInput.files[0];
                mostrarNomeArquivo(arquivo);
                enviarFormulario(arquivo);
            });
        });
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card border-danger">
                    <h5 class="card-header">Upload de Arquivos - Veppo - Call Center</h5>
                    <div class="card-body">
                        <form id="formularioUpload" enctype="multipart/form-data">
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" id="arquivoInput" name="arquivo" required>
                                <label class="custom-file-label" for="arquivoInput">Escolher arquivo...</label>
                            </div>
                            <div id="dropZone" class="drop-zone mb-3">Arraste e solte o arquivo aqui. </div>
                        </form>
                        <div class="progress mt-3">
                            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;"
                                aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <div id="resultado" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>