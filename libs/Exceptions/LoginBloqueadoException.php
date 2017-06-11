<?php
namespace libs\Exceptions;

/**
 * Exception de Login Incorreto
 */
class LoginBloqueadoException extends \Exception
{
  function __construct($message = null){
    $message = ($message == null) ? "Usuario bloqueado devido a varias tentativas falhas de login" : $message;

    parent::__construct($message);
  }
}
