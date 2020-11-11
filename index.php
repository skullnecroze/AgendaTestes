<?php
    include "bancodados/conect.php";
//verificando se a sessao existe e evitando acesso indevido.
session_start();
$usId = $_SESSION['idUser'];
$sqlDisplayName = "SELECT exibiUser FROM tabelausuario WHERE idUser = '$usId'";
$rsDisplayName = mysqli_query($conect, $sqlDisplayName);
$retornaDP = mysqli_fetch_array($rsDisplayName);
$displayName = array_shift($retornaDP);

if (!isset($_SESSION['idUser'])) {  //se não está definido o id do usuario na sessao
    header("location:pages/login/login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"
    <meta charset="UTF-8">
    <title>Agenda Impacto </title>
</head>
<body>
        <header class="contHeader">
            <div>
            <a href="index.php?menuvar=home">Agenda Impacto</a>
            </div>
            <div>
                <a href="index.php?menuvar=home" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Home</a>
                <div class="btn-group btnHeader" role="group" aria-label="Button group with nested dropdown">
                    <a href="index.php?menuvar=contato" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Minha Agenda</a>
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btnDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu Usuário @<?="$displayName"?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="index.php?menuvar=perfil">Meu Perfil</a>
                        <a class="dropdown-item" href="pages/login/logoff.php">Logout</a>
                    </div>
                </div>

            </div>
        </header>
        <hr>
    <div class="contMain"></div>
    <main>
        <?php
        $menuvar = (isset($_GET["menuvar"]))?$_GET["menuvar"]:"home";
        switch ($menuvar) {
            case 'home':
                include("pages/home/home.php");
                break;

            case 'contato':
                include("pages/contatos/contatos.php");
                break;

            case 'cadastra-contato':
                include("pages/contatos/cadastra-contato.php");
                break;

            case 'inserir-contato':
                include("pages/contatos/inserir-contato.php");
                break;

            case 'atualiza-contato':
                include("pages/contatos/atualiza-contato.php");
                break;

            case 'editar-contato':
                include("pages/contatos/editar-contato.php");
                break;

            case 'excluir-contato':
                include("pages/contatos/excluir-contato.php");
                break;

            case 'perfil':
                include("pages/perfil/perfil.php");
                break;

            default:
                include("pages/home/home.php");
                break;


        }
        ?>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/contatos.js"></script>
</body>
</html>