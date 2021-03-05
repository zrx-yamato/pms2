<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
    $this->assign('title', '「' . h($user->name) . '」ユーザーの詳細');
?>
<div class="users view large-9 medium-8 columns content">
    <nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
        <!-- 編集 -->
        <?= $this->Html->link('
            <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
            <span class="text">編集</span>',
            ['action' => 'edit', $user->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
        <!-- 削除 -->
        <?= $this->Form->postLink('
            <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
            <span class="text">削除</span>',
            ['action' => 'delete', $user->id], ['confirm' => __('ID{0}を本当に削除しますか？', $user->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
    </nav>
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('氏名') ?></th>
            <td><?= h($user->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('メールアドレス') ?></th>
            <td><?= h($user->mail) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('電話番号') ?></th>
            <td><?= h($user->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('権限') ?></th>
            <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($user->create_at) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?= h($user->update_at) ?></td>
        </tr>
    </table>
</div>
