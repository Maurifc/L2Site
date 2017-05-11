<?php
/*
| Classe responsável pelo Template do site
| Ao criá-la, informe o caminho do arquivo 'html' com a extensão '.tpl.php'
| Com a função 'set', defina o nome das chaves '[@chave]'  e valor que terá no HTML final
| Em seguida use a função Output para que faça a troca das valores e retorne o HTML renderizado
*/
class Template {
  private $viewConteudo;
  protected $file;
  protected $values = array();

  //O objeto é iniciado com uma view que será renderizada
  public function __construct($file, $viewConteudo = null) {
    $this->file = $file;

    if($viewConteudo != null){
      $this->setViewConteudo($viewConteudo);
    }
  }

  //Adiciona o conjunto Chave / Valor ao array
  public function set($key, $value) {
    $this->values[$key] = $value;
  }

  //Renderiza o HTML final, trocando os devidos valores
  public function output() {
    $viewInternaRenderizada = null;

    /*
    |Se há uma view interna, um objeto Template é criado para
    |essa view, de forma a trocar as chaves [@Chave]
    */
    if($this->hasViewConteudo()){
      $template = new Template($this->viewConteudo);
      $template->setAllValues($this->values);

      $viewInternaRenderizada = $template->output();
    }

    if (!file_exists($this->file)) {
      return "Error loading template file ($this->file).<br />";
    }

    $output = file_get_contents($this->file);

    foreach ($this->values as $key => $value) {
      $tagToReplace = "[@$key]";
      $output = str_replace($tagToReplace, $value, $output);
    }

    //Anexa a view interna ao layout padrão
    if($this->hasViewConteudo()){
      $output = str_replace('[@conteudo]', $viewInternaRenderizada, $output);
    }

    return $output;
  }

  /*
  |Seta todas as chaves/valor de uma só vez, através do array
  | recebido por parâmetro
  */
  public function setAllValues($array){
    $this->values = $array;
  }

  //Seta a view que estará contida dentro do layout padrão
  public function setViewConteudo($viewConteudo){
    $this->viewConteudo = $viewConteudo.'.tpl.php';
  }

  public function hasViewConteudo(){
    return isset($this->viewConteudo);
  }
}
