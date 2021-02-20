<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Personnels'), ['controller' => 'Personnels', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personnel'), ['controller' => 'Personnels', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Estimates'), ['controller' => 'Estimates', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Estimate'), ['controller' => 'Estimates', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="projects view large-9 medium-8 columns content">
    <h3><?= h($project->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Git Data') ?></th>
            <td><?= h($project->git_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $project->has('company') ? $this->Html->link($project->company->name, ['controller' => 'Companies', 'action' => 'view', $project->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Personnel') ?></th>
            <td><?= $project->has('personnel') ? $this->Html->link($project->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $project->personnel->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($project->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add User Id') ?></th>
            <td><?= $this->Number->format($project->add_user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Add Update Id') ?></th>
            <td><?= $this->Number->format($project->add_update_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($project->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($project->update_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Delete') ?></th>
            <td><?= $project->is_delete ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Id Pass Area') ?></h4>
        <?= $this->Text->autoParagraph(h($project->id_pass_area)); ?>
    </div>
    <div class="row">
        <h4><?= __('Memo') ?></h4>
        <?= $this->Text->autoParagraph(h($project->memo)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Estimates') ?></h4>
        <?php if (!empty($project->estimates)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Document') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Add User Id') ?></th>
                <th scope="col"><?= __('Update User Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->estimates as $estimates): ?>
            <tr>
                <td><?= h($estimates->id) ?></td>
                <td><?= h($estimates->title) ?></td>
                <td><?= h($estimates->document) ?></td>
                <td><?= h($estimates->price) ?></td>
                <td><?= h($estimates->project_id) ?></td>
                <td><?= h($estimates->add_user_id) ?></td>
                <td><?= h($estimates->update_user_id) ?></td>
                <td><?= h($estimates->status_id) ?></td>
                <td><?= h($estimates->is_delete) ?></td>
                <td><?= h($estimates->create_at) ?></td>
                <td><?= h($estimates->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estimates', 'action' => 'view', $estimates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estimates', 'action' => 'edit', $estimates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estimates', 'action' => 'delete', $estimates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($project->tasks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Content') ?></th>
                <th scope="col"><?= __('Assumption Time') ?></th>
                <th scope="col"><?= __('Real Time') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Personnel Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col"><?= __('Add User Id') ?></th>
                <th scope="col"><?= __('Add Update Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($project->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->id) ?></td>
                <td><?= h($tasks->title) ?></td>
                <td><?= h($tasks->content) ?></td>
                <td><?= h($tasks->assumption_time) ?></td>
                <td><?= h($tasks->real_time) ?></td>
                <td><?= h($tasks->status_id) ?></td>
                <td><?= h($tasks->project_id) ?></td>
                <td><?= h($tasks->personnel_id) ?></td>
                <td><?= h($tasks->is_delete) ?></td>
                <td><?= h($tasks->create_at) ?></td>
                <td><?= h($tasks->update_at) ?></td>
                <td><?= h($tasks->add_user_id) ?></td>
                <td><?= h($tasks->add_update_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $tasks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $tasks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tasks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
