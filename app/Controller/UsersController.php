<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        //$this->Auth->allow('logout');
    }

	public function login() {
		$user = null;
		if ($this->request->is('post')) {
			$a = AuthComponent::password($this->request->data['User']['password']);
			$user = $this->User->find('first', array(
		        'conditions' => array('User.login' => $this->request->data['User']['login'], 'User.password' => $a)
		    ));
		    if ($this->Auth->login($user)) {
		        $this->redirect($this->Auth->redirect());
		    } else {
		       $this->Flash->error('Invalid username or password, try again');
		    }
		}
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

    public function index() {
    	$this->set('users', $this->User->find('all'));
	}

    public function add() {
        if ($this->request->is('post')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Your user has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
	    $this->User->id = $id;
	    if ($this->request->is('get')) {
	        $this->request->data = $this->User->findById($id);
	        if($this->request->data == null){
	        	$this->Flash->error('User does not exist.');
		    	$this->redirect(array('action' => 'index'));
	        }
	    } else {
	        if ($this->User->save($this->request->data)) {
	            $this->Flash->success('Your user has been updated.');
	            $this->redirect(array('action' => 'index'));
	        }
	    }

	}

	public function delete($id) {
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->User->delete($id)) {
	        $this->Flash->success('The user with id: ' . $id . ' has been deleted.');
	        $this->redirect(array('action' => 'index'));
	    }
	}
}