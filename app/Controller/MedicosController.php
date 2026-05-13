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

    // ---- AÇÕES AJAX ----

    public function ajaxAdd() {
        $this->autoRender = false;
        $this->response->type('json');

        if ($this->request->is('post')) {
            $this->Medico->create();
            if ($this->Medico->save($this->request->data)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Médico cadastrado!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao cadastrar médico.'));
            }
        }
    }

    public function ajaxEdit() {
        $this->autoRender = false;
        $this->response->type('json');

        if ($this->request->is('post')) {
            $id = $this->request->data['Medico']['id'];
            $this->Medico->id = $id;
            if ($this->Medico->save($this->request->data)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Médico atualizado!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao atualizar médico.'));
            }
        }
    }

    public function ajaxDelete($id = null) {
        $this->autoRender = false;
        $this->response->type('json');

        if ($this->request->is('post')) {
            if ($this->Medico->delete($id)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Médico excluído!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao excluir médico.'));
            }
        }
    }

    public function ajaxLista() {
        $this->autoRender = false;
        $this->response->type('json');

        $medicos = $this->Medico->find('all');
        $lista = array();

        foreach ($medicos as $m) {
            $lista[] = array(
                'id'           => $m['Medico']['id'],
                'nome'         => $m['Medico']['nome'],
                'crm'          => $m['Medico']['crm'],
                'especialidade'=> $m['Medico']['especialidade'],
                'email'        => $m['Medico']['email'],
            );
        }

        echo json_encode($lista);
    }
}
?>