<?php
// Simulação de verificação de credenciais (substitua por lógica real)
$usuario_valido_001 = '001'; // Usuário válido 001
$senha_valida_001 = '001'; // Senha válida para o usuário 001

$usuario_valido_002 = '002'; // Usuário válido 002
$senha_valida_002 = '002'; // Senha válida para o usuário 002

// Recebendo os dados do formulário
$usuario_digitado = $_POST['usuario'];
$senha_digitada = $_POST['senha'];

// Verificando as credenciais
if ($usuario_digitado === $usuario_valido_001 && $senha_digitada === $senha_valida_001) {
  // Redirecionamento para a página 1
  session_start();
  $_SESSION['codigo_usuario'] = '001'; // Armazena o código do usuário
  $_SESSION['expiracao'] = time() + 1800; // Expira em 30 minutos (1800 segundos)
  header('Location: menuSuper.php');
  exit;
} elseif ($usuario_digitado === $usuario_valido_002 && $senha_digitada === $senha_valida_002) {
  // Redirecionamento para a página 2
  session_start();
  $_SESSION['codigo_usuario'] = '002'; // Armazena o código do usuário
  $_SESSION['expiracao'] = time() + 1800; // Expira em 30 minutos (1800 segundos)
  header('Location: menuSuper.php');
  exit;
} else {
  // Redirecionamento para a página de login com mensagem de erro
  header('Location: /jonas/newUpDow/index.php?error=1');
  exit;
}
?>