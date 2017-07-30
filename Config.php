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
    | MySQL e tabelas do banco
    */
    //Endereço do servidor MySQL do servidor
    'database_servidor' => 'localhost',
    'database_usuario' => 'root',
    'database_senha' => '',
    'database_nome' => 'l2site',

    //Configuração da tabela 'class_list'
    //Mude para true caso seu pack não possua uma tabela class_list (incompatibilidades podem ocorrer)
    'usar_tabela_class_do_pack' => false,

    //Nome da coluna que possui o ID do char (na tabela characters)
    'coluna_idChar_tabela_characters' => 'obj_Id',
    //Nome da coluna que possui o ID do char (na tabela heroes)
    'coluna_idChar_tabela_heroes' => 'charId',

    /*
    | Configurações de Ranking
    */
    //Máximo de chars exibidos no Top PVP/PK
    'max_top_pvp_pk' => 10,

    /*
    | Debug
    */
    //Ative para ver os erros diretamente no navegador, desative quando estiver online
    'debug_ativado' => true,

    /*
    | Layout
    */
    //Layout Padrão - Não altere sem saber o que está fazendo
    'layout_padrao' => 'layouts/app.tpl.php'

  ];

  public static function get($key){
    return self::$configs[$key];
  }
}
