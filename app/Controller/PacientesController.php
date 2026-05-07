<?php
App::uses('AppController', 'Controller');

class PacientesController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');

    public function index() {
        $this->set('pacientes', $this->Paciente->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Paciente->create();
            if ($this->Paciente->save($this->request->data)) {
                $this->Flash->success(__('Paciente cadastrado com sucesso!'));
                return $this->redirect(array('controller' => 'medicos', 'action' => 'index', '?' => array('aba' => 'pacientes')));
            }
            $this->Flash->error(__('Erro ao cadastrar paciente.'));
        }
    }

    public function edit($id = null) {
        if (!$id && !empty($this->request->data['Paciente']['id'])) {
            $id = $this->request->data['Paciente']['id'];
        }

        if (!$id) {
            throw new NotFoundException(__('Paciente inválido'));
        }

        $paciente = $this->Paciente->findById($id);

        if (!$paciente) {
            throw new NotFoundException(__('Paciente não encontrado'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Paciente->id = $id;
            if ($this->Paciente->save($this->request->data)) {
                $this->Flash->success(__('Paciente atualizado com sucesso!'));
                return $this->redirect(array('controller' => 'medicos', 'action' => 'index', '?' => array('aba' => 'pacientes')));
            }
            $this->Flash->error(__('Erro ao atualizar paciente.'));
        }

        if (!$this->request->data) {
            $this->request->data = $paciente;
        }
    }

    public function delete($id = null) {
        if ($this->request->is('post')) {
            if ($this->Paciente->delete($id)) {
                $this->Flash->success(__('Paciente excluído com sucesso!'));
            } else {
                $this->Flash->error(__('Erro ao excluir paciente.'));
            }
        }
        return $this->redirect(array('controller' => 'medicos', 'action' => 'index', '?' => array('aba' => 'pacientes')));
    }
}
?>