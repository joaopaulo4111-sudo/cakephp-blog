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
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Erro ao cadastrar paciente.'));
        }
    }

    public function edit($id = null) {

    // PEGA ID DO FORM (quando vem do modal)
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
            return $this->redirect($this->referer());
        }

        $this->Flash->error(__('Erro ao atualizar paciente.'));
    }

    if (!$this->request->data) {
        $this->request->data = $paciente;
    }
    }

    public function delete($id = null) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    if ($this->Paciente->delete($id)) {
        $this->Flash->success(
            __('Paciente excluído com sucesso!'),
            array('class' => 'alert alert-success')
        );
    } else {
        $this->Flash->error(
            __('Erro ao excluir paciente.'),
            array('class' => 'alert alert-danger')
        );
    }

    return $this->redirect(array('action' => 'index'));
}
}
?>