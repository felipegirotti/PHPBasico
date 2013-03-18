<h3>Agenda TreinaWeb</h3>

<table class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
        </tr>
    </thead>
    <tbody>
        
        <!-- Itera sobre os contatos lidos do arquivo de texto -->
        <?php foreach( lerContatos() as $indice => $contato ): ?>
        <tr>
            <td><?=$indice;?></td>
            <td><?=$contato[0]; // Nome ?></td>
            <td><?=$contato[1]; // E-mail ?></td>
            <td><?=$contato[2]; // Telefone ?></td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>

<a href="<?=SITE_URL;?>/?secao=cadastro" class="btn btn-primary novo-cadastro">Novo contato</a>
