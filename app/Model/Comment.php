<?php 

App::uses('User', 'Model');

class Comment extends AppModel {
    public $name = 'Comment';

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A username is required'
            )
        ),
        'text' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A text is required'
            )
        )
    );
}