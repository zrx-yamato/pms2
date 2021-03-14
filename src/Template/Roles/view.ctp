<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
    $this->assign('title', '「' . h($role->name) . '」権限の詳細');
?>
<?php if($authuser["role_id"] == 1) :?>
    <nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
        <!-- 編集 -->
        <?= $this->Html->link('
            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
            <span class="text">編集</span>',
            ['action' => 'edit', $role->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
        <!-- 削除 -->
        <?= $this->Form->postLink('
            <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
            <span class="text">削除</span>',
            ['action' => 'delete', $role->id], ['confirm' => __('権限名「'.$role->name.'」を本当に削除しますか？', $role->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
    </nav>
<?php endif;?>
<div class="roles view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($role->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('権限名') ?></th>
            <td><?= h($role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($role->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?php if($role->update_at != null) echo h($role->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
    </table>
<!-- 
    <div class="related">
        <h4><?= __('関連ユーザー') ?></h4>
        <?php if (!empty($role->users)): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Mail') ?></th>
                    <th scope="col"><?= __('Tel') ?></th>
                    <th scope="col"><?= __('Role Id') ?></th>
                    <th scope="col"><?= __('Create At') ?></th>
                    <th scope="col"><?= __('Update At') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <?php foreach ($role->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->name) ?></td>
                    <td><?= h($users->mail) ?></td>
                    <td><?= h($users->tel) ?></td>
                    <td><?= h($users->role_id) ?></td>
                    <td><?php if($users->create_at != null) echo h($users->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?php if($users->update_at != null) echo h($users->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
     -->
</div>
