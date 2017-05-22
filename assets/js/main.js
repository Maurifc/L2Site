$(document).ready(function(){
  //Esconde o loader presente nos formulários cadastro e troca de senha
  $('.loader').hide();

}); //Document ready

/*
| Faz a verificação dos campos login ou email, enviando um requisição ajax
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
            //Sinaliza que ocorreu erro na validação
            validacaoErro(nomeCampo);

            //Escreve a mensagem e a exibe
            idMsgErro.text('*' + result[0]);
            idMsgErro.show();
          } else {
            //Se a validação der certo, oculta possível mensagem de erro
            idMsgErro.hide();

            //Sinaliza o sucesso da validação
            validacaoOk(nomeCampo);
          }

          //Para a animação de loading depois de mostrar a resposta
          pararLoader();
        },
        dataType: "json"
      });
  }
}

//Verifica se as senhas do formulário são iguais (confirmação de senha);
function validarSenha(form){
  var campoSenha = $('[name=senha]');
  var campoRepetirSenha = $('[name=repSenha]');
  var msgErro = $('#msg-erro-rep-senha');

  if(campoRepetirSenha.val() != "" && campoSenha.val() != campoRepetirSenha.val()){
    msgErro.text('* ' + 'As senhas digitadas não correspondem');
    msgErro.show();

    //Sinaliza que ocorreu erro na validação
    if(form == 'cadastro'){
      validacaoErro('senha');
    } else if(form == 'painel') {
      $('[type=submit]').attr('disabled', true);
    }
  } else {
    msgErro.hide();
    //Sinaliza o sucesso da validação
    if(form == 'cadastro'){
      validacaoOk('senha');
    } else if(form == 'painel') {
      $('[type=submit]').attr('disabled', false);
    }
  }
}

/*
| Funções para controle do botão submit (Form de Cadastro)
*/
var flagValidacao = {
              'login': false,
              'email': false,
              'senha': false
            };

function validacaoOk(campo){
  flagValidacao[campo] = true;

  if(flagValidacao['login'] == true &&
      flagValidacao['email'] == true &&
      flagValidacao['senha'] == true)
  {
    $('#submitCadastro').attr('disabled', false);
  }
}

function validacaoErro(campo){
  flagValidacao[campo] = false;

  if(flagValidacao['login'] == false ||
      flagValidacao['email'] == false ||
      flagValidacao['senha'] == false)
  {
    $('#submitCadastro').attr('disabled', true);
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
