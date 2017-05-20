<?php
spl_autoload_register(

   function( $classname ) {
      $caminho = str_replace( '\\', DIRECTORY_SEPARATOR, $classname );

      (file_exists($caminho.'.php')) ? require_once $caminho.'.php' : require_once $caminho.'.class.php';


   }

);
