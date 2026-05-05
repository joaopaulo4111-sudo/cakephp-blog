<?php
App::uses('AppModel', 'Model');

class Medico extends AppModel {
    public $validate = array(
        'nome' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'O nome é obrigatório'
            )
        ),
        'crm' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'O CRM é obrigatório'
            )
        ),
        'especialidade' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A especialidade é obrigatória'
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