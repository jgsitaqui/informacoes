# Projeto de Login

Este é um projeto simples de página de login utilizando HTML, CSS (Bootstrap), JavaScript para validação de formulário e PHP para processamento de login e upload de arquivos.

## Visão Geral

A página de login permite que os usuários insiram um nome de usuário e uma senha. Se os campos não forem preenchidos ou se as credenciais forem inválidas, uma mensagem de erro será exibida. O PHP é utilizado para verificar as credenciais e redirecionar o usuário para a página adequada. Após o login, os usuários têm acesso a diferentes funcionalidades, incluindo o upload de arquivos.

## Estrutura do Projeto

- **index.html**: Página principal contendo o formulário de login.
- **processa_login.php**: Script PHP para processar o login e redirecionar os usuários com base nas credenciais fornecidas.
- **menuSuper.php**: Página de informações acessada após o login bem-sucedido.
- **mostraUpload.php**: Página de upload de arquivos acessada pelos usuários.
- **upload.php**: Script PHP para processar o upload de arquivos.

## Pré-requisitos

Para executar este projeto, você precisará de:

- Um servidor web (como Apache ou Nginx)
- PHP instalado no servidor

## Instalação

1. Clone o repositório para o seu ambiente local:
   ```bash
   git clone https://[github.com/jgsitaqui/informacoes.git]
