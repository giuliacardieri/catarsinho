# Catarsinho
MVP do projeto do processo seletivo.

Uma single-page-application que permite que um usuário (sem estar logado) possa ver todos os projetos existentes.
O usuário pode se cadastrar ou fazer login.

Ao logar no sistema o usuário pode ver não só todos os projetos no sistema como também seus próprios projetos.

Além de visualizar os projetos, um usuário logado pode:
1. Criar um novo projeto (título, descrição, valor (até 500 reais) e foto).
2. Editar um projeto previamente criado
3. Deletar um projeto previamente criado

# Informações relevantes
1. Requisições feitas em AJAX usando o jQuery
2. Framework Materialize utilizado para seguir o [Material Design](https://material.io/) proposto pelo Google

# Tecnologias utilizadas
jQuery 3.2.1
jQuery Form Plugin 3.51.0
Sass 3.5.1
Materialize 0.100.2
CodeIgniter 3.0.1

# Bugs conhecidos e TODO
Nenhuma ação acontece quando o usuário clica no botão "Apoiar Projeto".

Possíveis bugs relativos a validação dos campos de input.

Faltam botões cancelar em vários modais.

Os botões Cadastre-se e Login em dispositivos pequenos não ficaram muito adequados.

O banco de dados e suas tabelas não foram criados dentro do código da aplicação, e sim usando phpmyadmin.

Possivelmente outros, pode me avisar que ficarei feliz (mais ou menos, pq achar bugs também não é tão legal assim :p)

# Como usar?
É necessário ter um servidor apache rodando.

Configurar o arquivo config.php com as informações da URL

Configurar o arquivo database.php como as informações do banco de dados utilizado.

Coloquei o arquivo catarsinho.sql nesse repositório com as informações para criação de tabelas e também alguns dados para populá-las.
