<?php

$contatoId = $_GET["contatoId"];
$sqlConsulta = "SELECT * FROM tabelacontatos WHERE contatoId = $contatoId";
$rs = mysqli_query ($conect, $sqlConsulta);
$retornaDados = mysqli_fetch_assoc($rs);


?>

<header>
    <h3>Editar Contato</h3>
</header>

<div>
    <form action="index.php?menuvar=editar-contato&contatoId=<?=$retornaDados ["contatoId"] ?>" method="post">

        <!--<div class="form-group">
            <label for="contatoNome">ID</label>
            <input value="<?=$retornaDados ["contatoId"] ?>" type="text" class="form-control" required="required" minlength="3" maxlength="50" name="contatoId">
        </div>-->

        <div class="form-group">
            <label for="contatoNome">Nome</label>
            <input value="<?=$retornaDados ["contatoNome"] ?>" type="text" class="form-control" required="required" minlength="3" maxlength="50" name="contatoNome">
        </div>

        <div class="form-group">
            <label for="contatoTelefone" >Telefone</label>
            <input value="<?=$retornaDados ["contatoTelefone"] ?>" type="text" placeholder="(99)99999-9999" class="form-control" required="required" minlength="11" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" name="contatoTelefone">
        </div>

        <div class="form-group">
            <label for="contatoIdade">Idade</label>
            <input value="<?=$retornaDados ["contatoIdade"] ?>" type="text" class="form-control" required="required" name="contatoIdade" pattern="[0-9]+$">
        </div>

        <div class="form-group">
            <label for="contatoEmail">Email</label>
            <input value="<?=$retornaDados ["contatoEmail"] ?>" type="email" class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="contatoEmail">
        </div>

        <div class="form-group">
            <label for="contatoNascimento">Data de Nascimento</label>
            <input value="<?=$retornaDados ["contatoNascimento"] ?>" type="date" placeholder="01/02/2000" class="form-control" required="required" name="contatoNascimento">
        </div>

        <div class="form-group">
            <label for="contatoImagem">URL da Foto</label>
            <input value="<?=$retornaDados ["contatoImagem"] ?>" type="text" placeholder="https://exemplo.com.br" class="form-control" name="contatoImagem"  pattern="http(s?)(:\/\/)((www.)?)(([^.]+)\.)?([a-zA-z0-9\-_]+)(.com|.net|.gov|.org|.in|.br)(\/[^\s]*)?">
        </div>

        <div>
            <input type="submit" value="Atualizar Contato" name="botaoAtualizar"
        </div>

    </form>
</div>
