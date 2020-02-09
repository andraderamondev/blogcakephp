<div style="background-color: #003d4c; padding:10px;">
    <?php if($user!=null){ ?>
        <div style="float: left; display:flex;">    
            <?php echo $this->Html->image('uploads/avatar/'.$user['User']['avatar'], array('width' => '20px','alt'=>'avatar'));?>
            <span style="color: #fff;">&nbsp;<?php echo $user['User']['name'];?></span>
        </div>
        <div style="float: right;">    
            <span style="float: right;"><?php echo $this->Html->link('Logout', '/users/logout', array('style'=>'color:#fff;')); ?>></span>
            <span>&nbsp;<?php echo $this->Html->link('Users', '/users', array('style'=>'color:#fff;'));?>&nbsp;</span>
        </div>
    <?php }else{ ?>
        <span style="float: right;">&nbsp;<?php echo $this->Html->link('Login', '/users/login', array('style'=>'color:#fff;')); ?></span>
    <?php } ?> 
    <span><?php echo $this->Html->link('Posts', '/posts', array('style'=>'color:#fff;float:right;'));?>&nbsp;</span>
</div>
<?php
echo $this->Form->create('User',array('url' => array('action' => 'edit'), 'enctype' => 'multipart/form-data'));
echo $this->Form->input('id', array('type' => 'hidden'));
echo $this->Form->input('name');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->input('avatar',array('type' => 'file'));
echo $this->Form->end('Save User');
?>