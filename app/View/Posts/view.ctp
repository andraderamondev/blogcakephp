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

<div style="background-color: #fff;padding:2% 6% 0 6%;">
    <div style="background-color: #ddd; padding:3%; border-radius:12px; margin-bottom: 3%;">
        <h2 style="margin-bottom:0px; background:none;color:#000;font-weight:bold;"><?php echo $post['Post']['title'];?></h2>
        <span style="color:#808080; fonte-size:11px;">por <?php echo $post['Post']['users_id']['User']['name'];?> em <?php echo date('d/m/Y H:i:s',strtotime($post['Post']['created']));?></span>
        <br>
        <hr>
        <p style="margin-top:10px;color:#000;"><?php echo $post['Post']['content'];?></p>
    </div>
    <div style="background-color: #ddd; padding:3%; border-radius:12px; margin-bottom: 3%;">
        <h3 style="color:#000;font-weight:bold;">Comments [<?php echo count($post['Post']['comments']); ?>]</h3>
        <?php 
            echo $this->Form->create('Comment', array('url'=>'/comments/add'));
            echo $this->Form->input('username');
            echo $this->Form->hidden('posts_id', array('value'=>$post['Post']['id']));
            echo $this->Form->textarea(
                'text',
                array('rows' => '5', 'escape' => false)
            );
            echo $this->Form->end('Save Comment');
        ?> 
        <hr>
        <br>
        <?php foreach ($post['Post']['comments'] as $comment) { ?>
        <div style="display: flex;margin-bottom: 10px; width:100%;">
            <div style="margin-right: 15px;">
                <img src="https://abad.com.br/wp-content/uploads/2019/11/user-icon.svg" width="60px" alt="">
            </div>
            <div style="width: 100%;">
                <span style="font-weight: bold; font-size: 14px;"><?php echo $comment['Comment']['username'];?></span>
                <p style="text-align: justify;font-size: 12px;margin-top: 10px;"><?php echo $comment['Comment']['text'];?></p>
                <?php if($user!=null){ ?>
                <span style="float:right;">
                    <?php echo $this->Form->postLink(
                        'Delete',
                        array('controller' => '/comments/delete/'.$comment['Comment']['id']),
                        array('confirm' => 'Are you sure?'));
                    ?>
                </span>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>