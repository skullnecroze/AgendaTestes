<?php

require_once "classesLogin.php";
$user = new Usuario;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Pagina de Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/login.css"
</head>
<body>
<header class="contHeader">
    <div>
        <a href="#">Agenda Impacto</a>
    </div>
    <hr>
</header>
<form method="post">
      <div class="containerLogin">
          <div class="loginDiv">
            <label class="loginLabel">ENTRAR</label>
            <input name="emailLogin" class="form-control loginInput" type="email" placeholder="Digite seu e-mail">
            <input name="senhaLogin" class="form-control loginInput" type="password" placeholder="Digite sua senha">
            <input class="btn btn-primary loginInput btnLogin" type="submit" value="ENTRAR">
            <a class="linkCadastra" href="cadastro.php">Ainda não tem cadastro? <strong>Cadastre-se!</strong></a>
          </div>
      </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<?php
if(isset($_POST['emailLogin']))
{
    $email = addslashes($_POST['emailLogin']);
    $senha = addslashes($_POST['senhaLogin']);
    //verificando se todos os campos nao estao vazios
    if(!empty($email) && !empty($senha))
    {
        $user->conectar("dbagenda","localhost","root",""); //conectando ao banco
        if($user->msgErro=="") // caso a mensagem esteja vazia, login ok
        {
            if ($user->logar($email, $senha))
            {
                header("location:../../index.php"); //encaminhado para proxima area apos verificar usuario e senha
            }
            else
            {
                ?>
                <div class="msg_erro">
                    Email e/ou senha são inválidos!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg_erro">
                <?php echo "Erro: ".$user->msgErro; ?>
            </div>
            <?php
        }
    }
    else
    {
        ?>
        <div class="msg_erro">
            Preencha todos os campos!
        </div>
        <?php
    }
}
?>

</body>
</html>
