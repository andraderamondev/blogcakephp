<?php 

App::uses('User', 'Model');
App::uses('Comment', 'Model');

class Post extends AppModel {
    public $name = 'Post';

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A title is required'
            )
        ),
        'content' => array(
            'required' => array(
                'rule' => array('notBlank'),
                'message' => 'A content is required'
            )
        )
    );

    public function beforeSave($options = array()) {
        return true;
    }

    function getUser($id){  
        $userModel = new User;
        $user = $userModel->findById($id);
        return $user;
    }

    function getCommets($id){
        $commentModel = new Comment;
        $comments = $commentModel->find('all',array('conditions' => array('Comment.posts_id' => $id)));
        return $comments;
    }
}