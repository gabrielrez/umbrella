<?php
require_once 'User.php';

class HistoricoMedico
{
  public $paciente;
  public $remedios;
  public $exames;

  public function __construct($paciente, $remedios, $exames)
  {
    $this->paciente = $paciente;
    $this->remedios = $remedios;
    $this->exames = $exames;
  }
}
