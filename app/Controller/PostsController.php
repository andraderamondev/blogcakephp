<?php
class PostsController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $name = 'Posts';

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('logout');
    }

    public function index() {
    	$posts = array();
    	foreach ($this->Post->find('all') as $post) {
    		$post['Post']['users_id'] = $this->Post->getUser($post['Post']['users_id']);
    		$posts[] = $post;
    	} 
    	$this->set('posts', $posts);
	}

	function view($id){
		$post = $this->Post->findById($id);
		$post['Post']['users_id'] = $this->Post->getUser($post['Post']['users_id']);
		$post['Post']['comments'] = $this->Post->getCommets($post['Post']['id']);
		$this->set('post', $post);
	}

    public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success('Your post has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
	    $this->Post->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->Post->findById($id);
	        if($this->request->data == null){
	        	$this->Flash->error('Post does not exist.');
		    	$this->redirect(array('action' => 'index'));
	        }
	    } else {
	        if ($this->Post->save($this->request->data)) {
	            $this->Flash->success('Your post has been updated.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }

	}

	public function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Post->delete($id)) {
	        $this->Flash->success('The post with id: ' . $id . ' has been deleted.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}