<?php
class UsersController extends AppController {
    public $helpers = array('Html', 'Form', 'Flash');
    public $components = array('Flash');
    public $name = 'Users';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout');
    }

	public function login() {
		$user = null;
		if ($this->request->is('post')) {
			$a = AuthComponent::password($this->request->data['User']['password']);
			$user = $this->User->find('first', array(
		        'conditions' => array('User.login' => $this->request->data['User']['login'], 'User.password' => $a)
		    ));
		    if ($this->Auth->login($user)) {
		        $this->redirect('/posts');
		    } else {
		       $this->Flash->error('Invalid username or password, try again');
		    }
		}
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}

    public function index() {
    	$user = AuthComponent::user();
    	$this->set('user', $user);
    	$this->set('users', $this->User->find('all'));
	}

    public function add() {
    	$user = AuthComponent::user();
    	$this->set('user', $user);
        if ($this->request->is('post')) {

        	if(!empty($this->request->data['User']['avatar']['name'])){
                    $file = $this->request->data['User']['avatar'];
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'png');
                    if(in_array($ext, $arr_ext)){
                        $path = '../webroot/img/uploads/avatar/';
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . $path . $file['name']);
                        $this->request->data['User']['avatar'] = $file['name'];
                    }else{
            			$this->Flash->error('Image dont valid.');
                    }
            }else{
            	$this->request->data['User']['avatar'] = '';
            }

            if ($this->User->save($this->request->data)) {
                $this->Flash->success('Your user has been saved.');
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    public function edit($id = null) {
	    $this->User->id = $id;
	    $user = AuthComponent::user();
    	$this->set('user', $user);
	    if ($this->request->is('get')) {
	        $this->request->data = $this->User->findById($id);
	        if($this->request->data == null){
	        	$this->Flash->error('User does not exist.');
		    	$this->redirect(array('action' => 'index'));
	        }
	    } else {

	    	if(!empty($this->request->data['User']['avatar']['name'])){
                    $file = $this->request->data['User']['avatar'];
                    $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                    $arr_ext = array('jpg', 'jpeg', 'png');
                    if(in_array($ext, $arr_ext)){
                        $path = '../webroot/img/uploads/avatar/';
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . $path . $file['name']);
                        $this->request->data['User']['avatar'] = $file['name'];
                    }else{
            			$this->Flash->error('Image dont valid.');
                    }
            }else{
            	$this->request->data['User']['avatar'] = '';
            }

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