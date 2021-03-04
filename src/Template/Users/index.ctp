<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
	$this->assign('title', 'ユーザー');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-user-plus"></i></span>
        <span class="text">ユーザー追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="users index large-9 medium-8 columns content">
    <div class="table-responsive">
        <table class="table table-bordered dataTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name', '名前') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('mail', 'メール') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('tel', 'TEL') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('role_id', '権限') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                    <th scope="col" class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->name) ?></td>
                    <td><?= h($user->mail) ?></td>
                    <td><?= h($user->tel) ?></td>
                    <td><?= $user->has('role') ? $this->Html->link($user->role->name, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                    <td><?= h($user->create_at) ?></td>
                    <td><?= h($user->update_at) ?></td>
                    <td class="actions">
                        <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $user->id], ['escape' => false])?></span>
                        <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'view', $user->id], ['escape' => false])?></span>
                        <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $user->id], ['confirm' => __('ID{0}を本当に削除しますか？', $user->id),'escape' => false]) ?></span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</div>
