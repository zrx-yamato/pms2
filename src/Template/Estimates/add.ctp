<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate $estimate
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Estimates'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['controller' => 'Projects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['controller' => 'Statuses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Status'), ['controller' => 'Statuses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="estimates form large-9 medium-8 columns content">
    <?= $this->Form->create($estimate) ?>
    <fieldset>
        <legend><?= __('Add Estimate') ?></legend>
        <?php
            echo $this->Form->control('title');
            echo $this->Form->control('document');
            echo $this->Form->control('price');
            echo $this->Form->control('project_id', ['options' => $projects]);
            echo $this->Form->control('add_user_id');
            echo $this->Form->control('update_user_id');
            echo $this->Form->control('status_id', ['options' => $statuses]);
            echo $this->Form->control('is_delete');
            echo $this->Form->control('create_at');
            echo $this->Form->control('update_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
