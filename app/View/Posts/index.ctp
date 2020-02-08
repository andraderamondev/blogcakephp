<div style="background-color: #fff;padding:2% 6% 0 6%;">
    <?php foreach ($posts as $post) {?>  
    <div style="background-color: #ddd; padding:3%; border-radius:12px; margin-bottom: 3%;">
        <h2 style="margin-bottom:0px; background:none;color:#000;font-weight:bold;"><?php echo $post['Post']['title'];?></h2>
        <span style="color:#808080; fonte-size:11px;">por <?php echo $post['Post']['users_id']['User']['name'];?> em <?php echo date('d/m/Y H:i:s',strtotime($post['Post']['created']));?></span>
        <br>
        <hr>
        <p style="margin-top:10px;color:#000;"><?php echo substr($post['Post']['content'], 0, 400);echo (strlen($post['Post']['content'])>400) ? '...' : '';?></p>
        <?php echo $this->Html->link('Ler Mais', array('action' => 'view', $post['Post']['id']));?>
    </div>
    <?php } ?>  
</div>