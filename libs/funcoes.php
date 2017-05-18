<?php
//Previne SQL Injection e XSS
function tString($string){
  return addslashes(htmlentities(utf8_decode(trim($string))));
}
