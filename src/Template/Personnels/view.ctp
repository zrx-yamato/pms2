<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel $personnel
 */
	$this->assign('title', '「' . $personnel->name . '」担当者の詳細');
?>
<?php if($user->role_id != 4) :?> 
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $personnel->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $personnel->id], ['confirm' => __('担当者名「'.$personnel->name.'」を本当に削除しますか？', $personnel->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<?php endif ?>
<div class="personnels view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($personnel->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('担当者名') ?></th>
            <td><?= h($personnel->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('メールアドレス') ?></th>
            <td><?= h($personnel->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('関連会社') ?></th>
            <td><?= $personnel->has('company') ? $this->Html->link($personnel->company->name, ['controller' => 'Companies', 'action' => 'view', $personnel->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($personnel->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?php if($personnel->update_at != null) echo h($personnel->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
    </table>

<!-- 
    <div class="related">
        <h4><?= __('関連プロジェクト') ?></h4>
        <?php if (!empty($personnel->projects)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover dataTable"  cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Git Data') ?></th>
                    <th scope="col"><?= __('Id Pass Area') ?></th>
                    <th scope="col"><?= __('Memo') ?></th>
                    <th scope="col"><?= __('Company Id') ?></th>
                    <th scope="col"><?= __('Personnel Id') ?></th>
                    <th scope="col"><?= __('Is Delete') ?></th>
                    <th scope="col"><?= __('Create At') ?></th>
                    <th scope="col"><?= __('Update At') ?></th>
                    <th scope="col"><?= __('Add User Id') ?></th>
                    <th scope="col"><?= __('Add Update Id') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <?php foreach ($personnel->projects as $projects): ?>
                <tr>
                    <td><?= h($projects->id) ?></td>
                    <td><?= h($projects->title) ?></td>
                    <td><?= h($projects->git_data) ?></td>
                    <td><?= h($projects->id_pass_area) ?></td>
                    <td><?= h($projects->memo) ?></td>
                    <td><?= h($projects->company_id) ?></td>
                    <td><?= h($projects->personnel_id) ?></td>
                    <td><?= h($projects->is_delete) ?></td>
                    <td><?= h($projects->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?php if($projects->update_at != null) echo h($projects->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?= h($projects->add_user_id) ?></td>
                    <td><?= h($projects->add_update_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('関連タスク') ?></h4>
        <?php if (!empty($personnel->tasks)): ?>
        <div class="table-responsive">
        <table class="table table-bordered table-hover dataTable"  cellpadding="0" cellspacing="0">
            <thead>
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
            </thead>
            <?php foreach ($personnel->tasks as $tasks): ?>
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
                <td><?= h($tasks->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?php if($tasks->update_at != null) echo h($tasks->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
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
        </div>
        <?php endif; ?>
    </div>
-->
</div>
