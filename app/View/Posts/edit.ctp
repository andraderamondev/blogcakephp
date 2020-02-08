<div style="background-color: #003d4c; padding:10px;">
    <span><?php echo $this->Html->link('Posts', '/posts', array('style'=>'color:#fff;'));?>&nbsp;</span>
    <?php if($user!=null){ ?>
        <span><?php echo $this->Html->link('Users', '/users', array('style'=>'color:#fff;'));?>&nbsp;</span>
        <span style="float: right;"><?php echo $this->Html->link('Logout', '/users/logout', array('style'=>'color:#fff;')); ?></span>
        <span style="float: right;color: #fff;"><?php  echo $user['User']['name'];?>&nbsp;/&nbsp;</span>
    <?php }else{ ?>
        <span style="float: right;"><?php echo $this->Html->link('Login', '/users/login', array('style'=>'color:#fff;')); ?></span>
    <?php } ?> 
</div>
<?php
	echo $this->Form->create('Post');
	echo $this->Form->input('id', array('type' => 'hidden'));
	echo $this->Form->input('title');
	echo $this->Form->hidden('users_id', array('value'=>$user['User']['id']));
	echo $this->Form->textarea(
	    'content',
	    array('rows' => '10', 'escape' => false)
	);
	echo $this->Form->end('Save Post');
?> 