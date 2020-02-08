<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User');?>
<h2 style="color:#000; text-align: center;">Please enter your login and password</h2>
<?php echo $this->Form->input('login');
	  echo $this->Form->input('password');?>
<?php echo $this->Form->end(__('Login'));?>