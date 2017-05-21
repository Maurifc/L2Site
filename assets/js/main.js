$(document).ready(function(){
  /*
  | Eventos de validação dos campos de cadastro
  */
  //Campo login e email tem o evento setado diretamente no input
  //Campo de senha e repetir senha
  $('[name=senha]').on("input", validarSenha);
  $('[name=repSenha]').on("input", validarSenha);

  //Esconde o loader presente nos formulários
  $('.loader').hide();


}); //Document ready

/*Faz a verificação dos campos login ou email, enviando um requisição ajax
| ao servidor e exibindo erro ou não conforme a resposta
*/
function validar(inputText, idMsgErro){
  var nomeCampo = inputText.name;
  var conteudoInput = inputText.value;

  //Verifica se há algum conteúdo no campo antes de tentar validar
  if(conteudoInput != ""){
    //Inicia a animação de loading enquanto não recebe a resposta do servidor
    iniciarLoader();

    $.ajax(
      {
        url: "index.php?r=validacao&campo="+nomeCampo+"&valor=" + conteudoInput,
        success: function(result){
          //Se deu erro na validação...
          if(result[1] == 'erro'){
            //Escreve a mensagem e a exibe
            idMsgErro.text('*' + result[0]);
            idMsgErro.show();
          } else {
            //Se a validação der certo, oculta possível mensagem de erro
            idMsgErro.hide();
          }

          //Para a animação de loading depois de mostrar a resposta
          pararLoader();
        },
        dataType: "json"
      });
  }
}

//Verifica se as senhas do formulário são iguais (confirmação de senha);
function validarSenha(){
  var campoSenha = $('[name=senha]');
  var campoRepetirSenha = $('[name=repSenha]');
  var msgErro = $('#msg-erro-rep-senha');

  if(campoRepetirSenha.val() != "" && campoSenha.val() != campoRepetirSenha.val()){
    msgErro.text('* ' + 'As senhas digitadas não correspondem');
    msgErro.show();
  } else {
    msgErro.hide();
  }
}

//Exibe o loader (Animação de carregando)
function iniciarLoader(){
  $('.loader').show();
}

//Esconde o loader (Animação de carregando)
function pararLoader(){
  $('.loader').hide();
}
