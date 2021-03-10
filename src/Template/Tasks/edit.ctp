<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
	$this->assign('title', '「' . $task->title . '」のタスク編集');
?>
<div class="tasks form large-9 medium-8 columns content">
    <?= $this->Form->create($task) ?>
    <fieldset>
        <?php
            echo $this->Form->control('title', ['label' => 'タスク名', 'class' => 'form-control']);
            echo $this->Form->control('content', ['label' => '概要', 'class' => 'form-control']);
            echo $this->Form->control('assumption_time', ['label' => '予定時間', 'class' => 'form-control']);
            echo $this->Form->control('real_time', ['label' => '実作業時間', 'class' => 'form-control']);
            echo $this->Form->control('status_id', ['label' => 'ステータス', 'class' => 'form-control w-auto', 'options' => $statuses]);
            echo $this->Form->control('project_id', ['label' => 'プロジェクト名', 'class' => 'form-control w-auto', 'options' => $projects]);
            echo $this->Form->control('personnel_id', ['label' => '担当者', 'class' => 'form-control w-auto', 'options' => $personnels]);
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
