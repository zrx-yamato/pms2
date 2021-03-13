<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */
    $this->assign('title', 'プロジェクト一覧');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-folder-plus"></i></span>
        <span class="text">プロジェクト追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="projects index large-9 medium-8 columns content">
    <div class="table-responsive">
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('title', 'プロジェクト') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('company_id', '関連会社名') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('personnel_id', '担当者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('add_user_id', '登録者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('add_update_id', '更新者') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('create_at', '登録日') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('update_at', '更新日') ?></th>
                    <th scope="col" class="actions"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $this->Number->format($project->id) ?></td>
                    <td><?= h($project->title) ?></td>
                    <td><?= $project->has('company') ? $this->Html->link($project->company->name, ['controller' => 'Companies', 'action' => 'view', $project->company->id]) : '' ?></td>
                    <td><?= $project->has('personnel') ? $this->Html->link($project->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $project->personnel->id]) : '' ?></td>
                    <td><?= $this->Html->link($project->user->name, ['controller' => 'Users', 'action' => 'view', $project->user->id]) ?></td>
                    <td><?= $this->Html->link($project->updater->name, ['controller' => 'Users', 'action' => 'view', $project->updater->id]) ?></td>
                    <td><?= h($project->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td><?php if($project->update_at != null) echo h($project->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                    <td class="actions">
                        <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $project->id], ['escape' => false])?></span>
                        <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $project->id], ['escape' => false])?></span>
                        <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $project->id], ['confirm' => __('ID{0}を本当に削除しますか？', $project->id),'escape' => false]) ?></span>
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
