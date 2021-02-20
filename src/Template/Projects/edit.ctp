<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Personnels'), ['controller' => 'Personnels', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Personnel'), ['controller' => 'Personnels', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Estimates'), ['controller' => 'Estimates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estimate'), ['controller' => 'Estimates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <legend><?= __('Edit Project') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('git_data');
            echo $this->Form->control('id_pass_area');
            echo $this->Form->control('memo');
            echo $this->Form->control('company_id', ['options' => $companies]);
            echo $this->Form->control('personnel_id', ['options' => $personnels]);
            echo $this->Form->control('is_delete');
            echo $this->Form->control('create_at');
            echo $this->Form->control('update_at');
            echo $this->Form->control('add_user_id');
            echo $this->Form->control('add_update_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
