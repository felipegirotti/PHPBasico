<?php

// Inclui o script config.php
require_once("config.php");

// Inclui o script com as funções
require_once("funcoes/funcoes.php");

// Valida os dados
$erros = 0;

// O E-mail informado é válido?
if(!isset($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
    $erros++;

// O  nome possui ao menos 3 caracteres?
if(!isset($_POST["nome"]) || strlen(trim($_POST["nome"]))<3)
    $erros++;   

// O telefone possui ao menos 3 caracteres?
if(!isset($_POST["telefone"]) || strlen(trim($_POST["telefone"]))<3)
    $erros++;

if( $erros!=0 )
{
    // Erro? Volta a página de cadastro de contato.
    redirecionarPagina(SITE_URL . "/?secao=cadastro&erroCadastro=sim");
}

// Tudo correto. Monta o array com os dados do contato
$contato[] = $_POST["nome"]; // 0
$contato[] = $_POST["email"]; // 1
$contato[] = $_POST["telefone"]; // 2

// Passa o array $contato como parâmetro para a função gravarContato()
if( gravaContato($contato) )
{
    // Contato gravado com sucesso. Volta para a página principal (index) do site.
    redirecionarPagina(SITE_URL);
}
else
{
    // Erro? Volta a página de cadastro de contato.
    redirecionarPagina(SITE_URL . "/?secao=cadastro&erroCadastro=sim");
}
