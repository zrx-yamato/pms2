<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate $estimate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Estimate'), ['action' => 'edit', $estimate->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Estimate'), ['action' => 'delete', $estimate->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimate->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Estimates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estimate'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="estimates view large-9 medium-8 columns content">
    <h3><?= h($estimate->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($estimate->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Project') ?></th>
            <td><?= $estimate->has('project') ? $this->Html->link($estimate->project->title, ['controller' => 'Projects', 'action' => 'view', $estimate->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $estimate->has('status') ? $this->Html->link($estimate->status->name, ['controller' => 'Statuses', 'action' => 'view', $estimate->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($estimate->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($estimate->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add User Id') ?></th>
            <td><?= $this->Number->format($estimate->add_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update User Id') ?></th>
            <td><?= $this->Number->format($estimate->update_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($estimate->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($estimate->update_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Delete') ?></th>
            <td><?= $estimate->is_delete ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Document') ?></h4>
        <?= $this->Text->autoParagraph(h($estimate->document)); ?>
    </div>
</div>
