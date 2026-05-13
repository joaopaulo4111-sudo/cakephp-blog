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
            } else {
                $this->Flash->error(__('Erro ao cadastrar paciente.'));
            }
        }
        return $this->redirect(array('controller' => 'home', 'action' => 'index'));
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
            } else {
                $this->Flash->error(__('Erro ao atualizar paciente.'));
            }
            return $this->redirect(array('controller' => 'home', 'action' => 'index'));
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
        return $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    // ---- AÇÕES AJAX ----

    public function ajaxAdd() {
        $this->autoRender = false; // não renderiza view
        $this->response->type('json'); // retorna JSON

        if ($this->request->is('post')) {
            $this->Paciente->create();
            if ($this->Paciente->save($this->request->data)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Paciente cadastrado!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao cadastrar paciente.'));
            }
        }
    }

    public function ajaxEdit() {
        $this->autoRender = false;
        $this->response->type('json');

        if ($this->request->is('post')) {
            $id = $this->request->data['Paciente']['id'];
            $this->Paciente->id = $id;
            if ($this->Paciente->save($this->request->data)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Paciente atualizado!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao atualizar paciente.'));
            }
        }
    }

    public function ajaxDelete($id = null) {
        $this->autoRender = false;
        $this->response->type('json');

        if ($this->request->is('post')) {
            if ($this->Paciente->delete($id)) {
                echo json_encode(array('sucesso' => true, 'mensagem' => 'Paciente excluído!'));
            } else {
                echo json_encode(array('sucesso' => false, 'mensagem' => 'Erro ao excluir paciente.'));
            }
        }
    }

    public function ajaxLista() {
        $this->autoRender = false;
        $this->response->type('json');

        $pacientes = $this->Paciente->find('all');
        $lista = array();

        foreach ($pacientes as $p) {
            $lista[] = array(
                'id'               => $p['Paciente']['id'],
                'nome'             => $p['Paciente']['nome'],
                'cpf'              => $p['Paciente']['cpf'],
                'data_nascimento'  => $p['Paciente']['data_nascimento'],
                'email'            => $p['Paciente']['email'],
            );
        }

        echo json_encode($lista);
    }
}
?>