<?php

require_once 'UsuarioAbstract.php';

class Paciente extends Usuario
{
  protected $historico;

  public function __construct($id, $nome, $email, $senha, $historico)
  {
    parent::__construct($id, $nome, $email, $senha);
    $this->historico = $historico;
  }

  public function getHistorico()
  {
    return $this->historico;
  }

  public function verAgenda()
  {
    // Ver agenda
  }
}
