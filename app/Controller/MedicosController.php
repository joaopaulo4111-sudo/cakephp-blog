<?php
App::uses('AppController', 'Controller');

class MedicosController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $uses = array('Medico');

    public function index() {
        $this->set('medicos', $this->Medico->find('all'));
        $this->loadModel('Paciente');
        $this->set('pacientes', $this->Paciente->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Medico->create();
            if ($this->Medico->save($this->request->data)) {
                $this->Flash->success(__('Médico cadastrado com sucesso!'));
                return $this->redirect(array('controller' => 'home', 'action' => 'index'));
            }
            $this->Flash->error(__('Erro ao cadastrar médico.'));
        }
    }

    public function edit($id = null) {
        if (!$id && !empty($this->request->data['Medico']['id'])) {
            $id = $this->request->data['Medico']['id'];
        }

        if (!$id) {
            throw new NotFoundException(__('Médico inválido'));
        }

        $medico = $this->Medico->findById($id);

        if (!$medico) {
            throw new NotFoundException(__('Médico não encontrado'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Medico->id = $id;
            if ($this->Medico->save($this->request->data)) {
                $this->Flash->success(__('Médico atualizado com sucesso!'));
                return $this->redirect(array('controller' => 'home', 'action' => 'index'));
            }
            $this->Flash->error(__('Erro ao atualizar médico.'));
        }

        if (!$this->request->data) {
            $this->request->data = $medico;
        }
    }

    public function delete($id = null) {
    if ($this->request->is('post')) {
        if ($this->Medico->delete($id)) {
            $this->Flash->success(__('Médico excluído com sucesso!'));
        } else {
            $this->Flash->error(__('Erro ao excluir médico.'));
        }
    }
    return $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }
}
?>