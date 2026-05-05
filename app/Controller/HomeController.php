<?php
App::uses('AppController', 'Controller');

class HomeController extends AppController {

    public function index() {

        // Carrega os models
        $this->loadModel('Medico');
        $this->loadModel('Paciente');

        // Busca dados
        $medicos = $this->Medico->find('all');
        $pacientes = $this->Paciente->find('all');

        // Envia pra view
        $this->set(compact('medicos', 'pacientes'));
    }
}