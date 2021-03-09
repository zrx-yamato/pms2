<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status $status
 */
    $this->assign('title', '「' . h($status->name) . '」ステータスの詳細');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $status->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $status->id], ['confirm' => __('ステータス名「'.$status->name.'」を本当に削除しますか？', $status->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="statuses view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($status->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ステータス名') ?></th>
            <td><?= h($status->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($status->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($status->update_at) ?></td>
        </tr>
    </table>
    <!-- <div class="related">
        <h4><?= __('Related Estimates') ?></h4>
        <?php if (!empty($status->estimates)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Document') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Project Id') ?></th>
                <th scope="col"><?= __('Add User Id') ?></th>
                <th scope="col"><?= __('Update User Id') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($status->estimates as $estimates): ?>
            <tr>
                <td><?= h($estimates->id) ?></td>
                <td><?= h($estimates->title) ?></td>
                <td><?= h($estimates->document) ?></td>
                <td><?= h($estimates->price) ?></td>
                <td><?= h($estimates->project_id) ?></td>
                <td><?= h($estimates->add_user_id) ?></td>
                <td><?= h($estimates->update_user_id) ?></td>
                <td><?= h($estimates->status_id) ?></td>
                <td><?= h($estimates->is_delete) ?></td>
                <td><?= h($estimates->create_at) ?></td>
                <td><?= h($estimates->update_at) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Estimates', 'action' => 'view', $estimates->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Estimates', 'action' => 'edit', $estimates->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Estimates', 'action' => 'delete', $estimates->id], ['confirm' => __('Are you sure you want to delete # {0}?', $estimates->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tasks') ?></h4>
        <?php if (!empty($status->tasks)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
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
            <?php foreach ($status->tasks as $tasks): ?>
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
    </div> -->
</div>
