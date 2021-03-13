<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
	$this->assign('title', 'タスク追加');
?>
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <?php
            echo $this->Form->control('title', ['label' => 'タスク名', 'class' => 'form-control']);
            echo $this->Form->control('content', ['label' => '概要', 'class' => 'form-control']);
            echo $this->Form->control('assumption_time', ['label' => '予定時間', 'class' => 'form-control']);
            echo $this->Form->control('real_time', ['label' => '実作業時間', 'class' => 'form-control']);
            echo $this->Form->control('status_id', ['options' => $statuses, 'label' => 'ステータス', 'class' => 'w-auto form-control']);
            echo $this->Form->control('project_id', ['options' => $projects, 'label' => 'プロジェクト名', 'class' => 'w-auto form-control']);
            echo $this->Form->control('personnel_id', ['options' => $personnels, 'label' => '担当者', 'class' => 'w-auto form-control']);
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
