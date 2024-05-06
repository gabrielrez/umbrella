<?php

class Clinica
{
  protected $cnes;
  protected $nome;

  public function __construct($cnes, $nome)
  {
    $this->cnes = $cnes;
    $this->nome = $nome;
  }
}
