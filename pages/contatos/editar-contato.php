<?php
    $contatoId = $_GET["contatoId"];
    $contatoNome = mysqli_real_escape_string($conect, $_POST["contatoNome"]);
    $contatoTelefone = mysqli_real_escape_string($conect, $_POST["contatoTelefone"]);
    $contatoIdade = mysqli_real_escape_string($conect, $_POST["contatoIdade"]);
    $contatoEmail = mysqli_real_escape_string($conect, $_POST["contatoEmail"]);
    $contatoNascimento = mysqli_real_escape_string($conect, $_POST["contatoNascimento"]);
    $contatoImagem = mysqli_real_escape_string($conect, $_POST["contatoImagem"]);
    $sqlUpdate = "UPDATE tabelacontatos SET
                                           contatoNome = '$contatoNome',
                                           contatoTelefone = '$contatoTelefone',
                                           contatoIdade = '$contatoIdade',
                                           contatoEmail = '$contatoEmail',
                                           contatoNascimento = '$contatoNascimento',
                                           contatoImagem = '$contatoImagem'
                                           WHERE contatoId = '$contatoId'";

mysqli_query($conect, $sqlUpdate) or die ("Não foi possível Atualizar o contato" . mysqli_error($conect));

?>
<header>
    <h3>Contato editado com sucesso!</h3>
</header>
<script>
    window.location = "index.php?menuvar=contato"
</script>