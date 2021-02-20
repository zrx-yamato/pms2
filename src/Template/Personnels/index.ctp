<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel[]|\Cake\Collection\CollectionInterface $personnels
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Personnel'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="personnels index large-9 medium-8 columns content">
    <h3><?= __('Personnels') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personnels as $personnel): ?>
            <tr>
                <td><?= $this->Number->format($personnel->id) ?></td>
                <td><?= h($personnel->name) ?></td>
                <td><?= h($personnel->mail) ?></td>
                <td><?= $personnel->has('company') ? $this->Html->link($personnel->company->name, ['controller' => 'Companies', 'action' => 'view', $personnel->company->id]) : '' ?></td>
                <td><?= h($personnel->is_delete) ?></td>
                <td><?= h($personnel->create_at) ?></td>
                <td><?= h($personnel->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $personnel->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $personnel->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $personnel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnel->id)]) ?>
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
