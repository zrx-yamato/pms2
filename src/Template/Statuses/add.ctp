<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Statuses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Estimates'), ['controller' => 'Estimates', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Estimate'), ['controller' => 'Estimates', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tasks'), ['controller' => 'Tasks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Task'), ['controller' => 'Tasks', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="statuses form large-9 medium-8 columns content">
    <?= $this->Form->create($status) ?>
    <fieldset>
        <legend><?= __('Add Status') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('is_delete');
            echo $this->Form->control('create_at');
            echo $this->Form->control('update_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>