<?php

    // Inclui o script config.php
    require_once("config.php");
    
    // Inclui o script funcoes.php
    require_once("funcoes/funcoes.php");
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Agenda - PHP Básico | TreinaWeb Cursos</title>
    <link href="<?=SITE_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=SITE_URL;?>/css/estilos.css" rel="stylesheet">
  </head>
  <body>

    <div class="container-page">

        <!-- Menu -->  
        <div class="masthead">
          <ul class="nav nav-pills pull-right">
            <li <?=paginaAtual('home');?>><a href="<?=SITE_URL;?>">Home</a></li>
            <li <?=paginaAtual('cadastro');?>><a href="<?=SITE_URL;?>/?secao=cadastro">Cadastro</a></li>
            <li <?=paginaAtual('sobre');?>><a href="<?=SITE_URL;?>/?secao=sobre">Sobre</a></li>
          </ul>          
          <a href="<?=SITE_URL;?>"><img src="img/logo-treinaweb.png" alt="TreinaWeb Cursos" /></a>
        </div>
        <!--/Menu-->

        <hr>

        <div class="meio">

        <?php

            // Alguma página foi informada para ser incluída?
            $secao = isset($_GET['secao']) ? $_GET['secao'] : FALSE;

            // A página informada existe no array $_paginasSeguras? 
            if( $secao!=FALSE && in_array($secao, $_paginasSeguras) )
            {
                // Caminho do arquivo PHP
                $pagina = "paginas/{$secao}.php";
                
                // O arquivo da página informada existe?
                if(file_exists($pagina))
                {
                    // Inclui a página informada
                    require_once($pagina);
                }
                else
                {
                    // Inclui a página padrão
                    require_once("paginas/meio.php");
                }  
            }
            else
            {
                // Se nenhuma página válida foi informada, inclui a página padrão
                require_once("paginas/meio.php");
            }

        ?>

        </div>

        <hr>

        <div class="footer">
          <p>&copy; TreinaWeb Cursos <?=date("Y");?></p>
        </div>

    </div>

  </body>
</html>
