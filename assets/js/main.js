$(document).ready(function(){
  /*
  | Validações dos campos de cadastro
  */

  //$("#campo-login").focusout(validar('login', ));

  $('[name=senha]').on("input", validarSenha);
  $('[name=repSenha]').on("input", validarSenha);
/*
  $('[name=senha]').on("input", function(){ validarSenha($(this),
              $('[name=repSenha]'), $('#msg-erro-rep-senha')); });*/


}); //Document ready

function validar2(componente, id){
  console.log(componente.name);
}

function validar(inputText, idMsgErro){
  var nomeCampo = inputText.name;
  var conteudoInput = inputText.value;
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

      },
      dataType: "json"
    });
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
}/*
function validarSenha(senha, senhaRepetida, idMsgErro){
  if(senha.val() != senhaRepetida.val()){
    idMsgErro.text('* ' + 'As senhas digitadas não correspondem');
    idMsgErro.show();
  } else {
    idMsgErro.hide();
  }
}*/
