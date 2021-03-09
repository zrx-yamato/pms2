<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
	$this->assign('title', '「' . $status->name . '」ステータス編集');
?>
<div class="statuses form large-9 medium-8 columns content">
    <?= $this->Form->create($status) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['label' => 'ステータス名', 'class' => 'form-control']);
        ?>
    </fieldset>
    <button type="submit" class="btn btn-primary ml-auto d-block">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">更新する</span>
    </button>
    <?= $this->Form->end() ?>
</div>
