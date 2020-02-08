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
echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->file('avatar');
echo $this->Form->end('Save User');
?>