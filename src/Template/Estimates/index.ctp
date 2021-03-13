<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate[]|\Cake\Collection\CollectionInterface $estimates
 */
$this->assign('title', '見積もり一覧');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
        <span class="text">見積もり追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="estimates index large-9 medium-8 columns content">
    <table class="table table-bordered table-hover dataTable"  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title', '見積もり名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', '見積もり額') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id', 'プロジェクト名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('add_user_id', '登録者') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_user_id', '更新者') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id', 'ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estimates as $estimate): ?>
            <tr>
                <td><?= $this->Number->format($estimate->id) ?></td>
                <td><?= h($estimate->title) ?></td>
                <td><?= $this->Number->format($estimate->price), "円" ?></td>
                <td><?= $estimate->has('project') ? $this->Html->link($estimate->project->title, ['controller' => 'Projects', 'action' => 'view', $estimate->project->id]) : '' ?></td>
                <td><?= $estimate->user->name ?></td>
                <td><?= $estimate->updater->name ?></td>
                <td><?= $estimate->has('status') ? $this->Html->link($estimate->status->name, ['controller' => 'Statuses', 'action' => 'view', $estimate->status->id]) : '' ?></td>
                <td><?= $estimate->create_at->i18nFormat('yyyy年MM月dd日') ?></td>
                <td><?php if($estimate->update_at != null) echo $estimate->update_at->i18nFormat('yyyy年MM月dd日') ?></td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $estimate->id], ['escape' => false])?></span>
                    <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $estimate->id], ['escape' => false])?></span>
                    <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $estimate->id], ['confirm' => __('見積もり名「'.$estimate->title.'」を本当に削除しますか？', $estimate->id),'escape' => false]) ?></span>
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
