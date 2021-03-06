<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */
    $this->assign('title', '関連会社一覧');
?>
<?php if($user->role_id != 4) :?> 
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
        <span class="text">関連会社追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<?php endif ?>
<div class="companies index large-9 medium-8 columns content">
    <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name', '関連会社名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel', '電話番号') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address', '住所') ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($companies as $company): ?>
            <tr>
                <td><?= $this->Number->format($company->id) ?></td>
                <td><?= h($company->name) ?></td>
                <td><?= h($company->tel) ?></td>
                <td><?= h($company->address) ?></td>
                <td><?= h($company->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?php if($company->update_at != null) echo h($company->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $company->id], ['escape' => false])?></span>
                    <?php if($user->role_id != 4) :?> 
                        <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $company->id], ['escape' => false])?></span>
                        <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $company->id], ['confirm' => __('関連会社名「'.$company->name.'」を本当に削除しますか？', $company->id),'escape' => false]) ?></span>
                    <?php endif ?>
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
