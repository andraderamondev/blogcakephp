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
