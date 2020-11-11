<?php

//query de contagem para armazenar a variavel de número de contatos ativos.
$sqlCount = "SELECT COUNT(userId) FROM tabelacontatos WHERE userId = '{$usId}'";
$rs = mysqli_query($conect, $sqlCount);
$retornaCount = mysqli_fetch_array($rs);
$finalCount = array_shift($retornaCount);



?>
<header>
    <h4>Contatos Ativos: <?="$finalCount"?></h4>
</header>

<div>
    <form action="index.php?menuvar=contato" method="post"
    <div class="form-group search-group">
        <label class="label-search" for="searchBar">Pesquisar</label>
        <input type="text" class="form-control" id="divpesquisa" name="pesquisa" placeholder="Digite o ID ou Nome do Contato e pressione ENTER" ">
    </div>
    <div>
        <a class="btn btn-primary" href="index.php?menuvar=cadastra-contato">Adicionar Contato</a>
    </div>
</div>


<table style="display: none" class="tableContato" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Idade</th>
            <th>Email</th>
            <th>Data de Nascimento</th>
            <th>Imagem</th>
            <th>Favorito</th>
            <th>Atualizar</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <div class="flexcard">

    <?php
    //$sql = "SELECT * FROM tabelacontatos";
    $pesquisar = (isset($_POST["pesquisa"]))?$_POST["pesquisa"]:"";
    $sqlConsulta = "SELECT 
                            contatoId,
                            contatoNome,
                            contatoTelefone,
                            contatoIdade,
                            LOWER(contatoEmail) AS contatoEmail,
                            DATE_FORMAT(contatoNascimento,'%d/%m/%Y') as contatoNascimento,
                            contatoImagem,
                            contatoFavorito
                    FROM tabelacontatos 
                    WHERE 
                    userID = '{$usId}' AND
                    contatoNome LIKE '%{$pesquisar}%' ORDER BY contatoNome";

    $retornaConsulta = mysqli_query($conect,$sqlConsulta)
    or die ("Erro ao consultar o banco de dados" . mysqli_error($conect));
    while($dados = mysqli_fetch_assoc($retornaConsulta)){
        $telCarEmpty = $dados ['contatoTelefone'];
        $telCarEmpty = preg_replace('/[()-]/', '', $telCarEmpty);
    ?>
             <div class="card" style="width: 22rem;">
                <img src="<?= $dados["contatoImagem"]?>" class="card-img-top" alt="Imagem indisponível">
                <div class="card-body">
                    <h5 class="card-title"><p><?= $dados["contatoNome"]?></p></h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p>Telefone:</p><p class="conteudo"><?= $dados["contatoTelefone"] ?></p><a href="https://api.whatsapp.com/send?1=pt_BR&phone=<?="$$telCarEmpty"?>" target="_blank" <img </li><img class="imagemWhats " src="https://i.pinimg.com/originals/4e/a2/ea/4ea2ea56f1798863bebccfaa2c6c38b5.png" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"></a>
                    <li class="list-group-item"><p>E-mail:</p><p class="conteudo"><?= $dados["contatoEmail"] ?></li>
                    <li class="list-group-item"><p>Idade:</p><p class="conteudo"><?= $dados["contatoIdade"] ?></li>
                    <li class="list-group-item"><p>Data de Nascimento:</p><p class="conteudo"><?= $dados["contatoNascimento"] ?></li>
                </ul>
                <div class="card-body center">
                    <a href="index.php?menuvar=atualiza-contato&contatoId=<?=$dados ["contatoId"] ?>" class="btn btn-primary">Atualizar Contato</a>
                    <div id="btnExcluir" onclick="showModalExcluir(<?=$dados ["contatoId"]?>)" class="btn btn-danger" data-target="#confirmaExcluir">Excluir Contato</div>
                </div>
            </div>

<?php
    }
?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="confirmaExcluir" tabindex="-1" aria-labelledby="confirmaExcluir" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir contato?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    A ação de excluir é <b>permanente</b> e tornará o contato inacessível para futuras consultas.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <a id="btnTeste" href="#btnTeste" type="button" onclick="excluirContato()" class="btn btn-primary visitedButton">Excluir Contato</a>
                </div>
            </div>
        </div>
    </div>

    <tbody>
        <tr>
            <td><?=$dados ["contatoId"] ?></td>
            <td><?=$dados ["contatoNome"] ?></td>
            <td><?=$dados ["contatoTelefone"] ?></td>
            <td><?=$dados ["contatoIdade"] ?></td>
            <td><?=$dados ["contatoEmail"] ?></td>
            <td><?=$dados ["contatoNascimento"] ?></td>
            <td><img></td>
            <td><?=$dados ["contatoFavorito"] ?></td>
            <td><a href="index.php?menuvar=atualiza-contato&contatoId=<?=$dados ["contatoId"] ?>">Editar</a></td>
            <td><a href="index.php?menuvar=excluir-contato&contatoId=<?=$dados ["contatoId"] ?>">Excluir</a></td>

        </tr>

    </tbody>
</table>
