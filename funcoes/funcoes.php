<?php

function abrirBD()
{
    mysql_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA);
    mysql_select_db(BD_NOMEBANCO);
}

function fecharBD()
{
    mysql_close();
}

/*
 * Função retornar uma classe 'active' para os links do menu
 */
function paginaAtual($pagina)
{
    // Se a página informada for a página que está atualmente aberta
    if( 
        ( isset($_GET["secao"]) && $_GET["secao"]==$pagina )
        || ( !isset($_GET["secao"]) && $pagina=='home' )
    )
    {
        // Retorna o atributo 'class'
        return 'class="active"';
    }
    else
    {
        // Não retorna nada
        return '';   
    }       
}

/*
 * Função para ler os contatos do arquivo contato.txt 
 */
function lerContatos()
{
    // Inicializa a variável contatos
    $contatos = array();
    abrirBD();
    
    $sql = "SELECT * FROM contato";
    $result = mysql_query($sql);
    
    if (mysql_num_rows($result) > 0) {
        while ($contato = mysql_fetch_assoc($result)) {
            $contatos[] = $contato;
        }
    }
    
    fecharBD();
    // Retorna o array com os contatos
    return $contatos;
    
    
}

/*
 * Função para gravar um contato no arquivo de texto
 */

function gravaContato($contato)
{
    // Se a variável $contato não for um Array a função retorna FALSE.
    if (!is_array($contato)) return FALSE;
    
    abrirBD();
    
    $sql = "INSERT INTO contato (nome, email, telefone) VALUES ('{$contato['nome']}', '{$contato['email']}', '{$contato['telefone']}')";
    $result = mysql_query($sql); 
    if ($result !== false)
        return TRUE;
    fecharBD();
    // Se chegou até aqui é porq algum erro ocorreu na gravação.
    return FALSE;    
}

/*
 * Função para redirecionamento
 */

function redirecionarPagina($endereco="/")
{
    header("Location: " . $endereco);
    exit; // Para a execução do script.
}
