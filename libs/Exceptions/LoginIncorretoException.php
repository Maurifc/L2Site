<?php
namespace libs\Exceptions;

/**
 * Exception de Login Incorreto
 */
class LoginIncorretoException extends \Exception
{

  function __construct($message = null){
    $message = ($message == null) ? "Login incorreto" : $message;

    parent::__construct($message);
  }
}
