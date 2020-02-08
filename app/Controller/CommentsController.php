<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $name = 'Comments';

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('logout');
    }

    public function index() {

	}

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Comment->save($this->request->data)) {
                $this->Flash->success('Your comment has been saved.');
                $this->redirect(array(
				    'controller' => 'posts',
				    'action' => 'view', $this->request->data['Comment']['posts_id'])
				);
            }
        }
    }
}