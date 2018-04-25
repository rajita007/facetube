<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password') ?>
<?= $this->Form->button('Login') ?>
<?php echo $this->Html->link('New User','/Users/add', array('class'=>'button'))?>
<?= $this->Form->end() ?>
