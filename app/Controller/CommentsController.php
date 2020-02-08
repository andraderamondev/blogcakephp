<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $name = 'Comments';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
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

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $comment = $this->Comment->findById($id);
        if($comment!=null){
            var_dump($comment);
            if ($this->Comment->delete($id)) {
                $this->Flash->success('The comment with id: ' . $id . ' has been deleted.');
                $this->redirect(array(
                    'controller' => 'posts',
                    'action' => 'view', $comment['Comment']['posts_id'])
                );
            }
        }
    }
}