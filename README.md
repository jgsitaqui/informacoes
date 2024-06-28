# Projeto de Login e Upload de Documentos

Este projeto surgiu da necessidade de um cliente que tinha seus documentos em formatos variados e desejava disponibilizá-los para o pessoal do setor responsável, permitindo essa gestão de arquivos de qualquer lugar.

## Visão Geral

O projeto consiste em uma página de login simples, desenvolvida com HTML, CSS (Bootstrap), JavaScript para validação de formulário e PHP para processamento de login e upload de arquivos. Após o login bem-sucedido, os usuários têm acesso a funcionalidades como upload de documentos, facilitando a gestão e troca de arquivos de maneira remota.

## Estrutura do Projeto

- **index.html**: Página principal contendo o formulário de login.
- **processa_login.php**: Script PHP para processar o login e redirecionar os usuários com base nas credenciais fornecidas.
- **menuSuper.php**: Página de informações acessada após o login bem-sucedido, com opções de menu e exibição de documentos.
- **mostraUpload.php**: Página para o upload de arquivos, permitindo aos usuários adicionar novos documentos ao sistema.

## Funcionalidades

- **Upload de Documentos**: Os usuários podem arrastar e soltar arquivos ou selecioná-los diretamente para upload, com suporte a barra de progresso para acompanhar o processo.
- **Gestão de Documentos**: Após o upload, os documentos são armazenados em um diretório específico (`docs_informacoes/`), acessível através do menu principal da página de informações (`menuSuper.php`).

## Pré-requisitos e Instalação

Para utilizar o projeto, você precisará de um servidor web com PHP instalado. Basta clonar o repositório, configurar em seu ambiente local e iniciar a partir do arquivo `index.html`.

## Contribuição

Sinta-se à vontade para contribuir com melhorias ou sugestões. Este projeto foi criado para atender a uma necessidade específica e pode ser adaptado para outros contextos semelhantes.



1. Clone o repositório para o seu ambiente local:
   ```bash
   git clone https://[github.com/jgsitaqui/informacoes.git]
