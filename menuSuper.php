<?php
session_start();

// Verifica se o usuário está logado e se a sessão não expirou
if (!isset($_SESSION['codigo_usuario']) || time() > $_SESSION['expiracao']) {
  session_destroy(); // Encerra a sessão
  header('Location: index.php'); // Redireciona para a página de login
  exit;
}

// Armazena o código do usuário na variável $codigo_usuario
$codigo_usuario = $_SESSION['codigo_usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Informações</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      margin: 0;
    }

    .navbar {
      background-color: #8B0000;
      color: white;
      border-bottom: 3px solid #800020;
      z-index: 1000;
    }

    .navbar-brand {
      color: white;
      font-weight: bold;
    }

    .navbar-text {
      color: white;
    }

    .sidebar {
      width: 250px;
      background-color: #a52a2a;
      color: white;
      z-index: 900;
    }

    .sidebar a {
      color: white;
    }

    .dropdown-menu {
      background-color: #a52a2a;
    }

    .dropdown-menu a {
      color: white;
    }

    .content {
      flex-grow: 1;
      padding: 20px;
      background-color: #f8f9fa;
      overflow-y: auto;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand btn btn-link" id="refreshButton">
        Informações
      </a>
      <?php if ($codigo_usuario == '001'): ?>
        <a type="button" class="btn btn-outline-light" href="mostraUpload.php" target="mainFrameInfo">Upload</a>
      <?php endif; ?>
      <div class="ml-auto">
        <span id="currentDateTime" class="text-white"></span>
      </div>
    </div>
  </nav>
  <div class="d-flex flex-row flex-grow-1">
    <nav class="sidebar nav flex-column">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          menu1
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
          <a class="dropdown-item" href="docs_informacoes/menu1a.html" target="mainFrameInfo">manu1a</a>
          <a class="dropdown-item" href="docs_informacoes/menu1b.html" target="mainFrameInfo">manu1b</a>
        </div>
      </div>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          menu3
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
          <a class="dropdown-item" href="docs_informacoes/menu3a.html" target="mainFrameInfo">menu3a</a>
          <a class="dropdown-item" href="docs_informacoes/menu3b.html" target="mainFrameInfo">menu3b</a>
        </div>
      </div>
      <a class="nav-link" href="docs_informacoes/menu4.html" target="mainFrameInfo">menu4</a>
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          menu5
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
          <a class="dropdown-item" href="docs_informacoes/menu5a.html" target="mainFrameInfo">menu5a</a>
          <a class="dropdown-item" href="docs_informacoes/menu5b.html" target="mainFrameInfo">menu5b</a>
        </div>
      </div>
    </nav>
    <div class="content">
      <iframe name="mainFrameInfo" style="width: 100%; height: 100%; border: none;"></iframe>
    </div>
  </div>
  <!-- Adicionando Bootstrap JS e dependências do jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>

  <!-- Adicionando o JS personalizado -->
  <script>
    function updateDateTime() {
      var now = new Date();
      var dateTime = now.toLocaleString('pt-BR', {
        weekday: 'long',
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric'
      });
      document.getElementById('currentDateTime').textContent = dateTime;
    }

    // Atualiza a cada segundo
    setInterval(updateDateTime, 1000);
  </script>
  <script>
    document.getElementById("refreshButton").addEventListener("click", function () {
      location.reload();
    });
  </script>
</body>

</html>