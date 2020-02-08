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
<div style="background-color: #fff;padding:2% 6% 0 6%;">
    <?php foreach ($posts as $post) {?>  
    <div style="background-color: #ddd; padding:3%; border-radius:12px; margin-bottom: 3%;">
        <h2 style="margin-bottom:0px; background:none;color:#000;font-weight:bold;"><?php echo $post['Post']['title'];?></h2>
        <span style="color:#808080; fonte-size:11px;">por <?php echo $post['Post']['users_id']['User']['name'];?> em <?php echo date('d/m/Y H:i:s',strtotime($post['Post']['created']));?></span>
        <br>
        <hr>
        <p style="margin-top:10px;color:#000;"><?php echo substr($post['Post']['content'], 0, 400);echo (strlen($post['Post']['content'])>400) ? '...' : '';?></p>
        <?php echo $this->Html->link('Ler Mais', array('action' => 'view', $post['Post']['id']));?>
        <?php if($user!=null){ ?>
        <span style="float:right;"><?php echo $this->Html->link('Editar', array('action' => 'edit', $post['Post']['id']));?></span>
        <span style="float:right;">
            <?php echo $this->Form->postLink(
                'Delete',
                array('action' => 'delete', $post['Post']['id']),
                array('confirm' => 'Are you sure?'));
            ?> / 
        </span>
        <?php } ?>
    </div>
    <?php } ?>  
</div>

<?php if($user!=null){ ?>
<div style="position: fixed; right: 30px; bottom:30px; border-radius: 16px; padding: 10px;border: 1px solid #2d6324; background: #62af56; background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230)">
    <?php echo $this->Html->image("https://cdn4.iconfinder.com/data/icons/seo-and-web-glyph-3/64/seo-and-web-glyph-3-04-512.png", array(
        "alt" => "New Post",
        "title" => "New Post",
        "style" => "width: 40px;height: 40px;",
        'url' => array('controller' => 'posts', 'action' => 'add')
    )); ?>
</div>
<?php } ?>