<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task[]|\Cake\Collection\CollectionInterface $tasks
 */
$this->assign('title', 'タスク一覧');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
        <span class="text">タスク追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="tasks index large-9 medium-8 columns content">
    <div class="table-responsive">
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('status_id', '進捗状況') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title', 'タスク名') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('project_id', 'プロジェクト') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('personnel_id', '担当者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('add_user_id', '登録者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('update_user_id', '更新者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                    <th scope="col" class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $this->Number->format($task->id) ?></td>
                    <td><?= $task->has('status') ? $this->Html->link($task->status->name, ['controller' => 'Statuses', 'action' => 'view', $task->status->id]) : '' ?></td>
                    <td><?= h($task->title) ?></td>
                    <td><?= $task->has('project') ? $this->Html->link($task->project->title, ['controller' => 'Projects', 'action' => 'view', $task->project->id]) : '' ?></td>
                    <td><?= $task->has('personnel') ? $this->Html->link($task->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $task->personnel->id]) : '' ?></td>
                    <td><?= h($task->user->name) ?></td>
                    <td><?= h($task->updater->name) ?></td>
                    <td><?= h($task->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?php if($task->update_at != null) echo h($task->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td class="actions">
                        <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $task->id], ['escape' => false])?></span>
                        <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $task->id], ['escape' => false])?></span>
                        <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $task->id], ['confirm' => __('権限名「'.$task->title.'」を本当に削除しますか？', $task->id),'escape' => false]) ?></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator d-flex justify-content-between">
        <p><?= $this->Paginator->counter(['format' => __('全 {{count}} 件中 {{current}} 件表示（ページ {{page}} / {{pages}}） ')]) ?></p>
        
        <ul class="pagination">
            <?= $this->Paginator->first('<< ') ?>
            <?= $this->Paginator->prev('< ') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(' >') ?>
            <?= $this->Paginator->last(' >>') ?>
        </ul>
    </div>
</div>
