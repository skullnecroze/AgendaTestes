<?php
require_once "classesLogin.php";
$user = new Usuario;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Novo Usuário</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/cadastro.css"
</head>
<body>
    <form method="post">
        <div class="containerCadastro">
            <div class="headerCadastro">Registre-se</div>

            <label class="labelCadastro" for="emailCadastro1">E-mail</label>
            <input name="emailCadastro" placeholder="Insira aqui seu e-mail" class="form-control" id="emailCadastro1" maxlength="50">


            <label class="labelCadastro" for="nomeCadastro1" >Nome Completo</label>
            <input name="nomeCadastro" placeholder="Insira aqui seu nome" class="form-control" id="nomeCadastro1" maxlength="50">

            <label class="labelCadastro" for="exibiCadastro1" >Nome de Exibição</label>
            <input name="exibiCadastro" placeholder="Insira aqui seu nome de exibição" class="form-control" id="exibiCadastro1" maxlength="50">

            <label class="labelCadastro" for="senhaCadastro1" >Senha</label>
            <input type="password" name="senhaCadastro" placeholder="Insira aqui sua senha" class="form-control" id="senhaCadastro1" maxlength="32">

            <label class="labelCadastro" for="senhaCadastro1" >Confirme a Senha</label>
            <input type="password" name="confirmaCadastro" placeholder="Insira aqui sua senha" class="form-control" id="senhaCadastro1" maxlength="32">

            <input type="submit" class="btn btn-primary btnCadastro" value="CADASTRAR">
            <a class="linkLogin" href="login.php">Já possui um cadastro? <strong>então faça o Login</strong></a>
        </div>
    </form>
        <?php
//verificar se clicou no botao
if(isset($_POST['emailCadastro']))
{
    $email = addslashes($_POST['emailCadastro']); //addslashes evita codigos maliciosos.
    $nome = addslashes($_POST['nomeCadastro']);
    $display = addslashes($_POST['exibiCadastro']);
    $senha = addslashes($_POST['senhaCadastro']);
    $confirmarSenha = addslashes( $_POST['confirmaCadastro']);
    //verificando se todos os campos nao estao vazios
    if(!empty($email) && !empty($nome) && !empty($display) && !empty($senha) && !empty($confirmarSenha))
    {
        $user->conectar("dbagenda","localhost","root","");
        if ($user->msgErro=="") //conectado normalmente;
        {
            if ($senha == $confirmarSenha)
            {
                if ($user->cadastrar($email, $nome, $display, $senha))
                {
                    ?>
                    <div id='msg_sucesso'>
                        Cadastrado com sucesso!
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="msg_erro">
                        Email já cadastrado, retorne e faça login.
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg_erro">
                    Senhas não conferem!
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="msg_erro">
                <?php echo "Erro: ".$user->msgErro;?>
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

    </form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
