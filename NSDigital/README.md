# O Projeto

NSDigital é um sistema para cadastro de Artistas, albuns e músicas.
Feito no Framework PHP Laravel, que dispoe de funcionalidades para Migrations, Migrations, Blade Template, Multi Tenancy, etc, além de contar com o gerenciador de dependências Composer. 
Foi utilizado o banco de dados relacional MySQL. Tudo isso em containers Docker.


## Container Docker - Passo a Passo

Primeiro, será necessário ter em sua máquina instalado o Docker, para que seja possível subir os containers e executar o sistema sem necessidade de instalar as tecnologias utilizadas na própria máquina. Para isso, segue um link mais detalhados com os passos para instalá-lo junto a suas dependências referentes a cada Sistema Operacional:

* [Instalando o Docker em qualquer Sistema Operacional](https://stack.desenvolvedor.expert/appendix/docker/instalacao.html)


**Step #1**

Abra o seu editor de código e acesse o diretório NSDigital/, nele você precisará **criar uma cópia do arquivo .env.example** e **renomear essa cópia para somente .env**.
A partir daqui, usaremos comandos pela linha de comando do seu SO, então, acesse por ela a pasta NSDigital.

Há dois serviços, o laravel-app e o mysql-db, que serão levantados assim que você rodar o comando:

    > docker-compose build && docker-compose up -d



**Step #2**

Após isso, acesse através do docker o servidor apache (laravel-app) para que possamos utilizar o terminal, e executar alguns comandos necessários:
    
    > docker exec -it laravel-app bash
	
Agora já estamos dentro do servidor, e podemos usar as funcionalidades do framework, perceba que estamos na pasta /var/www/html, e aqui estão todos os arquivos do projeto que foram copiados e colados aqui através do Docker.

**Step #3**

Está na hora de executar o gerenciador de dependências para que nossas dependências de terceiros estejam prontas. 

    > compose update


**Step #4**

Gere a chave da aplicação:
	
	> php artisan key:generate


**Step #5**

E agora, com esse comando, o Laravel cria as tabelas e alterações no banco de dados pré-estabelecidas pelas Migrations:

	> php artisan migrate

Pronto, caso as migrations tenham rodado normalmente, não aparecerá nenhum erro em sua tela, apenas aparecerá a confirmação de sucesso, e a aplicação está pronta para ser acessada pelo seu navegador através do link:
	
 [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login)


# O Sistema
Não foi feito nenhuma autenticação de usuário, por isso, ao clicar em ***Login*** na página de Login sem precisar informar nenhum dado de acesso, já estará disponível na tela a Página Dashboard, onde há um Overview com informações de quantidade de artistas, albuns e músicas cadastradas, também como último artista e última música,  além de atalhos para criar um novo artista ou um novo álbum.
O menu está organizado em forma de tab, assim é fácil e rápida a navegação entre páginas.

 ### Artista
 Para visualizar os artistas cadastrados basta clicar na tab ***Artistas***, onde descreve cada um, e oferece ações rápidas como: *Criar Álbum, Editar, Visualizar e Deletar (o que é feito sem recarregar a página)*.
Abaixo da tabela há um botão ***(Criar Novo Artista)*** que leva ao formulário de cadastro de Artistas, onde bastará informar o nome e a imagem do Artista para que o mesmo seja cadastrado.

 ### Álbuns e Músicas
Referente aos Álbuns, é obrigatório selecionar um artista para ser o proprietário, por isso, na tab de ***Álbuns***, além de ter a listagem dos álbuns (com ações de editar e deletar o álbum), ao pressionar o botão ***Criar Novo Álbum*** você precisará selecionar um dos artistas cadastrados no sistema para prosseguir. 
No cadastro de álbum, é possível informar a imagem de capa do Álbum e o seu título, porém, antes de salvar, é necessário inserir pelo menos uma música (título e depois arquivo mp3) na listagem ao lado. Vale ressaltar que o arquivo está sendo salvo no banco de dados. A partir daí, já é possível salvar o álbum.

 ### Testes Unitários
Para relizar os testes pré-definidos (se encontram em tests/), é necessário estar no servidor *(Step 2#)*, na pasta do sistema, e simplesmente executar o comando:

    > ./vendor/bin/phpunit



## Screenshots


![Tela de Login](https://i.ibb.co/ccVW7vK/Tela-de-Login.jpg)

![Tela de Overview](https://i.ibb.co/HrM5KNt/Tela-de-Overview.jpg)

![Listagem de Artistas](https://i.ibb.co/x6cYXGG/Tela-de-Artistas.jpg)

![Cadastro de Artistas](https://i.ibb.co/KyfNb5r/Tela-de-Cadastro-de-Artistas.jpg)

![Listagem de Álbuns](https://i.ibb.co/Kryd7cw/Tela-de-lbuns.jpg)

![Cadastro de Álbum](https://i.ibb.co/y56pgGS/Tela-de-Cadastro-de-lbum.jpg)



## Referências

[https://stack.desenvolvedor.expert/appendix/docker/instalacao.html](https://stack.desenvolvedor.expert/appendix/docker/instalacao.html)
