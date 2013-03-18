<ul class="breadcrumb">
  <li><a href="<?=SITE_URL;?>">Home</a> <span class="divider">/</span></li>
  <li class="active">Cadastro de contatos</li>
</ul>

<?php if(isset($_GET["erroCadastro"])): ?>
<div class="alert">
    <strong>Atenção!</strong> Preencha corretamente os dados do contato.
</div>
<?php endif; ?>

<form action="<?=SITE_URL;?>/processaCadastro.php" method="post">
  <fieldset>
    <legend>Cadastro de contatos</legend>
    
    <p>
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required/>
    </p>
    
    <p>
        <label for="email">E-mail: </label>
        <input type="email" name="email" id="email" required/>
    </p> 
    
    <p>
        <label for="telefone">Telefone: </label>
        <input type="tel" name="telefone" id="telefone" required/>
    </p>    
    
    <button type="submit" class="btn">Cadastrar</button>
  </fieldset>
</form>
