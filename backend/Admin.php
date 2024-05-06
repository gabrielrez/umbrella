<?php

require_once 'UsuarioAbstract.php';

class Admin extends Usuario
{
  public function cadastrarPaciente($nome, $historicoClinico)
  {
    // Cadastrar um novo paciente
  }

  public function cadastrarMedico($nome, $especialidade)
  {
    // Cadastrar um novo médico
  }

  public function agendarConsulta($pacienteId, $medicoId, $data)
  {
    // Agendar uma consulta
  }
}
