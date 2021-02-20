<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel $personnel
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Personnel'), ['action' => 'edit', $personnel->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Personnel'), ['action' => 'delete', $personnel->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnel->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Personnels'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Personnel'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="personnels view large-9 medium-8 columns content">
    <h3><?= h($personnel->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($personnel->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Mail') ?></th>
            <td><?= h($personnel->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $personnel->has('company') ? $this->Html->link($personnel->company->name, ['controller' => 'Companies', 'action' => 'view', $personnel->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($personnel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Create At') ?></th>
            <td><?= h($personnel->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Update At') ?></th>
            <td><?= h($personnel->update_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Delete') ?></th>
            <td><?= $personnel->is_delete ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($personnel->projects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Git Data') ?></th>
                <th scope="col"><?= __('Id Pass Area') ?></th>
                <th scope="col"><?= __('Memo') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Personnel Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col"><?= __('Add User Id') ?></th>
                <th scope="col"><?= __('Add Update Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($personnel->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->title) ?></td>
                <td><?= h($projects->git_data) ?></td>
                <td><?= h($projects->id_pass_area) ?></td>
                <td><?= h($projects->memo) ?></td>
                <td><?= h($projects->company_id) ?></td>
                <td><?= h($projects->personnel_id) ?></td>
                <td><?= h($projects->is_delete) ?></td>
                <td><?= h($projects->create_at) ?></td>
                <td><?= h($projects->update_at) ?></td>
                <td><?= h($projects->add_user_id) ?></td>
                <td><?= h($projects->add_update_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($personnel->tasks)): ?>
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
            <?php foreach ($personnel->tasks as $tasks): ?>
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
