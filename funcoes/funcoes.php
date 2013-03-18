<?php

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
    
    // Nome do arquivo
    $nomeArquivo = "contatos.txt";

    // Abre o arquivo somente para leitura.
    $arquivo = fopen($nomeArquivo, "r");
    
    // Tamanho do arquivo
    $arquivoTamanho = filesize($nomeArquivo);

    // O arquivo pôde ser aberto com sucesso? Seu tamanho em bytes é maior que 0?
    if($arquivo && $arquivoTamanho!=0)
    {
        // Lê todo o conteúdo do arquivo
        $conteudo = fread($arquivo, $arquivoTamanho);
        
        // A cada nova quebra de linha cria um item de array
        $conteudo = explode(PHP_EOL, $conteudo); 
        
        // Remove elementos em branco
        $conteudo = array_filter($conteudo);
        
        // Itera sobre o Array criado
        foreach($conteudo as $linha) 
        {
            // Quebra a linha separada pelo caractere '|' em um novo array dentro de um item de array de $contatos
            $contatos[] = explode("|", $linha);
        }
    }
    
    // Retorna o array com os contatos
    return $contatos;
    
    // Finaliza a operação com o arquivo
    fclose($arquivo);
}

/*
 * Função para gravar um contato no arquivo de texto
 */

function gravaContato($contato)
{
    // Se a variável $contato não for um Array a função retorna FALSE.
    if (!is_array($contato)) return FALSE;
    
    // Itera sobre o array com os dados do contato para gerar a string: nome|email|telefone    
    $stringContato = "";
    
    foreach($contato as $indice=>$valor)
    {
        // Se o índice for 2, indica que é o fim da linha, então quebra. Se não for, separa por '|'
        $separador = ($indice==2) ? PHP_EOL : "|"; 
        
        // Monta a String 
        $stringContato .= $valor . $separador;
    }    
    
    // Abre o arquivo somente para escrita
    $arquivo = fopen("contatos.txt", "a");

    // Sucesso ao abrir o arquivo? Então escreve no arquivo a string gerada
  if($arquivo && fwrite($arquivo, $stringContato)!==FALSE) {
    // Retorna TRUE. Contato gravado com sucesso.
    return TRUE;   
  }      
    
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
