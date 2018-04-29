<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Friend[]|\Cake\Collection\CollectionInterface $friends
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Friend'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Senders'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sender'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="friends index large-9 medium-8 columns content">
    <h3><?= __('Friends') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sender_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('receiver_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($friends as $friend): ?>
            <tr>
                <td><?= $this->Number->format($friend->id) ?></td>
                <td><?= $friend->has('sender') ? $this->Html->link($friend->sender->name, ['controller' => 'Users', 'action' => 'view', $friend->sender->id]) : '' ?></td>
                <td><?= $friend->has('receiver') ? $this->Html->link($friend->receiver->name, ['controller' => 'Users', 'action' => 'view', $friend->receiver->id]) : '' ?></td>
                <td><?= h($friend->status) ?></td>
                <td><?= h($friend->created) ?></td>
                <td><?= h($friend->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $friend->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $friend->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $friend->id], ['confirm' => __('Are you sure you want to delete # {0}?', $friend->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
