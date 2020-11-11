<div class="containerJumbotron">
    <div class="jumbotron">
        <h1 class="display-4">Seja bem vindo:<strong> <?=$displayName?></strong></h1>
        <p class="lead">Esta é a sua área privada, seus contatos serão armazenados e serão acessados exclusivamente por você</p>
        <hr class="my-4">
        <p class="jumboTour">Se você quiser fazer um tour inicial pelo sistema Impacto Agenda, clique no botão abaixo!</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Fazer o Tour
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Conteúdo Indisponível</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        O tour não está disponível na versão de testes, mas você pode prosseguir para a agenda no botão "Minha Agenda"
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <a type="button" href="index.php?menuvar=contato" class="btn btn-primary">Minha Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

