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
<br>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Login</th>
        <th>Created</th>
        <th>Actions</th>
    </tr>

    <?php 
        if(count($users)>0){
        foreach ($users as $user){ ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td><?php echo $user['User']['name'];?></td>
            <td><?php echo $user['User']['login']; ?></td>
            <td><?php echo date('d/m/Y H:i:s',strtotime($user['User']['created'])); ?></td>
            <td>
                <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?'));
                ?>
                <?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']));?>
            </td>
        </tr>
    <?php }}else{ ?>
        <tr>
            <td colspan="5" style="text-align:center;"><strong>No users found</strong></td>
        </tr>
    <?php } ?> 
</table>

<?php if($user!=null){ ?>
<div style="position: fixed; right: 30px; bottom:30px; border-radius: 16px; padding: 10px;border: 1px solid #2d6324; background: #62af56; background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230)">
    <?php echo $this->Html->image("https://cdn0.iconfinder.com/data/icons/social-media-glyph-1/64/Facebook_Social_Media_User_Interface-35-512.png", array(
        "alt" => "New User",
        "title" => "New User",
        "style" => "width: 40px;height: 40px;",
        'url' => array('controller' => 'users', 'action' => 'add')
    )); ?>
</div>
<?php } ?>