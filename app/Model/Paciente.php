<?php
App::uses('AppModel', 'Model');

class Paciente extends AppModel {
    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'O nome é obrigatório'
            )
        ),
        'cpf' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'O CPF é obrigatório'
            )
        ),
        'data_nascimento' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A data de nascimento é obrigatória'
            )
        ),
        'email' => array(
            'valid' => array(
                'rule' => 'email',
                'message' => 'Digite um email válido'
            )
        )
    );
}
?>