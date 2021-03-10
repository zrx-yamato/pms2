<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
	$this->assign('title', '権限追加');
?>
<div class="roles form large-9 medium-8 columns content">
    <?= $this->Form->create($role) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['label' => '権限名', 'class' => 'form-control']);
        ?>
    </fieldset>
    <button type="submit" class="btn btn-primary ml-auto d-block">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">追加する</span>
    </button>
    <?= $this->Form->end() ?>
</div>
