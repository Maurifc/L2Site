<?php
/*
| Arquivo de configuração
| Não esqueça a vírgula no final de cada declaração
*/
class Config{
  private static $configs = [
    //Básico
    'titulo_site' => 'L2Site - O melhor servidor de Lineage 2 da atualidade',

    /*
    | MySQL
    */
    //Endereço do servidor MySQL
    'database_servidor' => 'localhost',
    'database_usuario' => 'root',
    'database_senha' => 'root',
    'database_nome' => 'l2java',

    //Configuração da tabela 'class_list'
    //Mude para true caso seu pack não possua uma tabela class_list (incompatibilidades podem ocorrer)
    'usar_tabela_class_do_pack' => false,

    /*
    | Configurações de Ranking
    */
    //Máximo de chars exibidos no Top PVP/PK
    'max_top_pvp_pk' => 20,

    //Layout Padrão - Não altere sem saber o que está fazendo
    'layout_padrao' => 'layouts/app.tpl.php'
  ];

  public static function get($key){
    return self::$configs[$key];
  }
}
