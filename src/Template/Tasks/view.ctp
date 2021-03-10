<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
    $this->assign('title', '「' . h($task->title) . '」タスクの詳細');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $task->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $task->id], ['confirm' => __('タスク名「'.$task->title.'」を本当に削除しますか？', $task->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>

<div class="paginator d-flex justify-content-between mb-2">
    <div>ID:<?= $this->Number->format($task->id) ?></div>
    <div>
        登録日:<?= h($task->create_at->i18nFormat('YYYY/MM/dd')) ?>(<?= $task->user->name?>)&nbsp;
        <?php if($task->update_at != null){ 
            echo('更新日:' . h($task->update_at->i18nFormat('YYYY/MM/dd')));
            echo '(' . $task->updater->name . ')';
        } ?>
    </div>
</div>
<div class="tasks view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('タスク名') ?></th>
            <td><?= h($task->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('作業想定時間') ?></th>
            <td><?= h($task->assumption_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('実作業時間') ?></th>
            <td><?= h($task->real_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ステータス') ?></th>
            <td><?= $task->has('status') ? $this->Html->link($task->status->name, ['controller' => 'Statuses', 'action' => 'view', $task->status->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('プロジェクト') ?></th>
            <td><?= $task->has('project') ? $this->Html->link($task->project->title, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('担当者') ?></th>
            <td><?= $task->has('personnel') ? $this->Html->link($task->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $task->personnel->id]) : '' ?></td>
        </tr>
    </table>

    <div class="card mb-4">
        <div class="card-header">タスク概要</div>
        <div class="card-body">
            <?= $this->Text->autoParagraph(h($task->content)); ?>
        </div>
    </div>
</div>
