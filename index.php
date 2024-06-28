<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Incluindo o CSS do Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      width: 100%;
      max-width: 400px;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .login-container h1 {
      margin-bottom: 20px;
      color: #333;
    }

    .alert {
      display: none;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h1>login</h1>
    <!-- Alerta de erro -->
    <div class="alert alert-danger" id="errorMessage" role="alert">
      Usuário ou senha incorretos.
    </div>
    <form id="loginForm" action="processa_login.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <input type="text" class="form-control" name="usuario" placeholder="Usuário">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="senha" placeholder="Senha">
      </div>
      <button type="submit" class="btn btn-danger btn-block">Entrar</button>
    </form>
  </div>

  <!-- Incluindo o JS do Bootstrap e dependências -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Script de validação -->
  <script>
    function validateForm() {
      var usuario = document.forms["loginForm"]["usuario"].value;
      var senha = document.forms["loginForm"]["senha"].value;
      var errorMessage = document.getElementById("errorMessage");

      if (usuario == "" || senha == "") {
        errorMessage.textContent = "Por favor, preencha todos os campos.";
        errorMessage.style.display = "block";
        return false;
      }
      return true;
    }

    // Mostrar mensagem de erro se houver um parâmetro de erro na URL
    window.onload = function () {
      var urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('error')) {
        var errorMessage = document.getElementById("errorMessage");
        errorMessage.style.display = "block";
      }
    };
  </script>
</body>

</html>