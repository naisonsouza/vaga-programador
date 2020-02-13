# Teste Prático de PHP

O objetivo deste teste é conhecer suas habilidades em:

* PHP, MySQL, HTML, CSS e JavaScript;
* Entendimento e análise dos requisitos;
* Modelagem de banco de dados;
* A aplicação pode ser feita em PHP puro ou algum framework conhecido no mercado. Banco de dados MySQL.

## Problema

A empresa NS DIGITAL precisa criar um sistema para gerenciar artistas, álbuns e músicas.

Os requisitos para desenvolvimento do sistema são:

* Cadastro de artistas com os dados: nome e imagem;
* Cadastro de álbum com os dados:  título, imagem e artista e músicas(título, álbum, arquivo mp3) 1:N;
* Um álbum obrigatóriamente deve estar relacionado a um artista e uma música deve obrigatóriamente estar relacionado a um álbum. 
* O sistema não pode permitir que seja cadastrado dois álbuns com o mesmo título para o mesmo artista.
* No cadastro de álbuns deve permitir que seja adicionada músicas 1:N(mais de uma música)

## Requisitos
* O candidato deverá desenvolver um CRUD conforme os requisitos mencionados anteriormente.
* Utilizar php 7.0 ou superior
* Utilizar banco de dados MySQL
* Utilizar javascript para manipular eventos das telas sem a necessidade de recarregar a página.

## Entrega do projeto
* Faça fork desse projeto e edite este README explicando como devo fazer para criar as tabelas e testar a tela de venda;
* Todos os arquivos necessários para rodar o projeto devem estar no repositório do github;
* Criar um pull request nesse repositório quando o código já tiver concluído;
* Enviar um e-mail notificando que o teste foi concluído para posterior avaliação;

## Diferenciais
* Fazer a tela de crud responsiva, usando algum framework como: bootstrap, material design e etc
* Usar testes unitários para qualquer parte do sistema;
* Usar commits com mensagens claras;
* Boas práticas de programação, código limpo, design patterns;
* Utilizar algum gerenciador de dependências caso faça uso de componentes de terceiros;
