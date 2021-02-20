<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Task'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personnels'), ['controller' => 'Personnels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Personnel'), ['controller' => 'Personnels', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tasks index large-9 medium-8 columns content">
    <h3><?= __('Tasks') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assumption_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('real_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('personnel_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_delete') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add_user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add_update_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= $this->Number->format($task->id) ?></td>
                <td><?= h($task->title) ?></td>
                <td><?= h($task->assumption_time) ?></td>
                <td><?= h($task->real_time) ?></td>
                <td><?= $task->has('status') ? $this->Html->link($task->status->name, ['controller' => 'Statuses', 'action' => 'view', $task->status->id]) : '' ?></td>
                <td><?= $task->has('project') ? $this->Html->link($task->project->title, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                <td><?= $task->has('personnel') ? $this->Html->link($task->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $task->personnel->id]) : '' ?></td>
                <td><?= h($task->is_delete) ?></td>
                <td><?= h($task->create_at) ?></td>
                <td><?= h($task->update_at) ?></td>
                <td><?= $this->Number->format($task->add_user_id) ?></td>
                <td><?= $this->Number->format($task->add_update_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
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
