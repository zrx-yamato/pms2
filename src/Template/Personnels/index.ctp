<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel[]|\Cake\Collection\CollectionInterface $personnels
 */
    $this->assign('title', '担当者一覧');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
        <span class="text">担当者追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="personnels index large-9 medium-8 columns content">
    <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', '担当者名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('mail', 'メールアドレス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id', '関連会社名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personnels as $personnel): ?>
            <tr>
                <td><?= $this->Number->format($personnel->id) ?></td>
                <td><?= h($personnel->name) ?></td>
                <td><?= h($personnel->mail) ?></td>
                <td><?= $personnel->has('company') ? $this->Html->link($personnel->company->name, ['controller' => 'Companies', 'action' => 'view', $personnel->company->id]) : '' ?></td>
                <td><?= h($personnel->create_at) ?></td>
                <td><?= h($personnel->update_at) ?></td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $personnel->id], ['escape' => false])?></span>
                    <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $personnel->id], ['escape' => false])?></span>
                    <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $personnel->id], ['confirm' => __('担当者名「'.$personnel->name.'」を本当に削除しますか？', $personnel->id),'escape' => false]) ?></span>
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
