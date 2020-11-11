<header>
    <h3>Excluir Contato</h3>
</header>

<?php

$contatoId = mysqli_real_escape_string($conect, $_GET["contatoId"]);
$sqlDelete = "DELETE FROM tabelacontatos WHERE contatoId = '$contatoId'";

mysqli_query($conect,$sqlDelete) or die ("Erro ao deletar o contato" . mysqli_error($conect));
?>
<script>
    window.location = "index.php?menuvar=contato"
</script>
