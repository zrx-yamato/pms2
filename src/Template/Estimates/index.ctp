<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate[]|\Cake\Collection\CollectionInterface $estimates
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Estimate'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estimates index large-9 medium-8 columns content">
    <h3><?= __('Estimates') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estimates as $estimate): ?>
            <tr>
                <td><?= $this->Number->format($estimate->id) ?></td>
                <td><?= h($estimate->title) ?></td>
                <td><?= $this->Number->format($estimate->price) ?></td>
                <td><?= $estimate->has('project') ? $this->Html->link($estimate->project->title, ['controller' => 'Projects', 'action' => 'view', $estimate->project->id]) : '' ?></td>
                <td><?= $this->Number->format($estimate->add_user_id) ?></td>
                <td><?= $this->Number->format($estimate->update_user_id) ?></td>
                <td><?= $estimate->has('status') ? $this->Html->link($estimate->status->name, ['controller' => 'Statuses', 'action' => 'view', $estimate->status->id]) : '' ?></td>
                <td><?= h($estimate->is_delete) ?></td>
                <td><?= h($estimate->create_at) ?></td>
                <td><?= h($estimate->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $estimate->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $estimate->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $estimate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimate->id)]) ?>
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
