<?php 

App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
    public $name = 'User';

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A name is required'
            )
        ),
        'login' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A login is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A password is required'
            )
        )
    );

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}