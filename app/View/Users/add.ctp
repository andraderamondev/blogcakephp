<?php

echo $this->Form->create('User');
echo $this->Form->input('name');
echo $this->Form->input('login');
echo $this->Form->input('password');
echo $this->Form->file('avatar');
echo $this->Form->end('Save User');
