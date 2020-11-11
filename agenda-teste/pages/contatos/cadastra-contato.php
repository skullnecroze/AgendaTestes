<header>
    <h3>Cadastrar Novo Contato</h3>
</header>

<div>
    <form action="index.php?menuvar=inserir-contato" method="post">
        <div class="form-group">
            <label for="contatoNome">Nome</label>
            <input type="text" class="form-control" required="required" minlength="3" maxlength="50" name="contatoNome"">
        </div>

        <div class="form-group">
            <label for="contatoTelefone" >Telefone</label>
            <input type="text" placeholder="(99)99999-9999" class="form-control" required="required" minlength="11" pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" name="contatoTelefone">
        </div>

        <div class="form-group">
            <label for="contatoIdade">Idade</label>
            <input type="text" class="form-control" required="required" name="contatoIdade" pattern="[0-9]+$">
        </div>

        <div class="form-group">
            <label for="contatoEmail">Email</label>
            <input type="email" class="form-control" required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="contatoEmail">
        </div>

        <div class="form-group">
            <label for="contatoNascimento">Data de Nascimento</label>
            <input type="date" placeholder="01/02/2000" class="form-control" required="required" name="contatoNascimento">
        </div>

        <div class="form-group">
            <label for="contatoImagem">URL da Foto</label>
            <input type="text" placeholder="https://exemplo.com.br" class="form-control" name="contatoImagem">
        </div>

        <div>
            <input type="submit" value="Adicionar Contato" name="botaoAdd"

        </div>
    </form>

</div>