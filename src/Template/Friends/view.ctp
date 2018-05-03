<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friend $friend
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Friend'), ['action' => 'edit', $friend->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Friend'), ['action' => 'delete', $friend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $friend->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Friends'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Friend'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Senders'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sender'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receivers'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receiver'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="friends view large-9 medium-8 columns content">
    <h3><?= h($friend->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sender') ?></th>
            <td><?= $friend->has('sender') ? $this->Html->link($friend->sender->name, ['controller' => 'Users', 'action' => 'view', $friend->sender->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Receiver') ?></th>
            <td><?= $friend->has('receiver') ? $this->Html->link($friend->receiver->name, ['controller' => 'Users', 'action' => 'view', $friend->receiver->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($friend->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($friend->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($friend->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $friend->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
