<span><?php echo $this->Html->link('Add User', array('action' => 'add')); ?></span>
<span style="float: right;"><?php echo $this->Html->link('Logout', array('action' => 'logout')); ?></span>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Login</th>
        <th>Actions</th>
        <th>Created</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['User']['id']; ?></td>
            <td><?php echo $user['User']['name'];?></td>
            <td><?php echo $user['User']['login']; ?></td>
            <td>
                <?php echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $user['User']['id']),
                    array('confirm' => 'Are you sure?'));
                ?>
                <?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id']));?>
            </td>
            <td><?php echo date('d/m/Y H:i:s',strtotime($user['User']['created'])); ?></td>
        </tr>
    <?php endforeach; ?>

</table>