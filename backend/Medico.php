<?php

class Medico extends Usuario
{
  protected $especialidade;

  public function __construct($id, $nome, $email, $senha, $especialidade)
  {
    parent::__construct($id, $nome, $email, $senha);
    $this->especialidade = $especialidade;
  }

  public function getEspecialidade()
  {
    return $this->especialidade;
  }

  public function verAgenda()
  {
    // Ver agenda
  }

  public function verHistoricoPaciente($paciente)
  {
    // Ver historico do paciente
  }
}
