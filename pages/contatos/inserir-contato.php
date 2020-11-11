<header>
    <h3>Cadastro Realizado Com Sucesso.</h3>
</header>

<?php

    $contatoNome = mysqli_real_escape_string($conect, $_POST["contatoNome"]);
    $contatoTelefone = mysqli_real_escape_string($conect, $_POST["contatoTelefone"]);
    $contatoIdade = mysqli_real_escape_string($conect, $_POST["contatoIdade"]);
    $contatoEmail = mysqli_real_escape_string($conect, $_POST["contatoEmail"]);
    $contatoNascimento = mysqli_real_escape_string($conect, $_POST["contatoNascimento"]);
    $contatoImagem = mysqli_real_escape_string($conect, $_POST["contatoImagem"]);
    $sqlinsert = "INSERT INTO tabelacontatos (
                    contatoNome,
                    contatoTelefone,
                    contatoIdade,
                    contatoEmail,
                    contatoNascimento,
                    contatoImagem,
                    userId)
                    VALUES(
                        '$contatoNome',
                        '$contatoTelefone',
                        '$contatoIdade',
                        '$contatoEmail',
                        '$contatoNascimento',
                        '$contatoImagem',
                        '$usId'
                    )";
        mysqli_query($conect, $sqlinsert) or die ("Não foi possível inserir o contato na agenda" . mysqli_error($conect));
?>
<script>
    window.location = "index.php?menuvar=contato"
</script>
