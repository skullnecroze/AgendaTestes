//cria variavel local
let idExcluir;

//função para abrir abrir o modal - recebe o valor do ID por parâmetro.
function showModalExcluir(Id){
    console.log("Chamou", Id); //console.log de verificação da função.
    idExcluir = Id;
    $('#confirmaExcluir').modal({show:true});
}
//função que envia o id do contato para o modal para finalizar a exclusão.
function excluirContato(){
    window.location.href = "index.php?menuvar=excluir-contato&contatoId="+idExcluir;
}
