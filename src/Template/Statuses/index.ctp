<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Status[]|\Cake\Collection\CollectionInterface $statuses
 */
	$this->assign('title', 'ステータス一覧');
?>
<?php if($authuser["role_id"] == 1) :?>
    <nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
        <?= $this->Html->link('
            <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
            <span class="text">ステータス追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
    </nav>
<?php endif;?>
<div class="statuses index large-9 medium-8 columns content">
    <div class="table-responsive">
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name', 'ステータス名') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                    <th scope="col" class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($statuses as $status): ?>
                <tr>
                    <td><?= $this->Number->format($status->id) ?></td>
                    <td><?= h($status->name) ?></td>
                    <td><?= h($status->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?php if($status->update_at != null) echo h($status->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td class="actions">
                        <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $status->id], ['escape' => false])?></span>
                        <?php if($authuser["role_id"] == 1) :?>
                            <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $status->id], ['escape' => false])?></span>
                            <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $status->id], ['confirm' => __('ステータス名「'.$status->name.'」を本当に削除しますか？', $status->id),'escape' => false]) ?></span>
                        <?php endif;?>
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
