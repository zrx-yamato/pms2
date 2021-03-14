<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate $estimate
 */
    $this->assign('title', '「' . $estimate->title . '」見積もりの詳細');
?>
<?php if($user->role_id != 4) :?> 
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $estimate->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $estimate->id], ['confirm' => __('見積もり名「' . $estimate->title . '」を本当に削除しますか？', $estimate->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<?php endif ?>

<div class="paginator d-flex justify-content-between">
    <div>ID:<?= $this->Number->format($estimate->id) ?></div>
    <div>
        登録日:<?= h($estimate->create_at->i18nFormat('yyyy年MM月dd日')) ?>(<?= $estimate->user->name?>)&nbsp;
        <?php if($estimate->update_at != null){ 
            echo('更新日:' . h($estimate->update_at->i18nFormat('yyyy年MM月dd日')));
            echo '(' . $estimate->updater->name . ')';
        } ?>
    </div>
</div>
<div class="estimates view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('見積もり名') ?></th>
            <td><?= h($estimate->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('プロジェクト名') ?></th>
            <td><?= $estimate->has('project') ? $this->Html->link($estimate->project->title, ['controller' => 'Projects', 'action' => 'view', $estimate->project->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ステータス') ?></th>
            <td><?= $estimate->has('status') ? $this->Html->link($estimate->status->name, ['controller' => 'Statuses', 'action' => 'view', $estimate->status->id]) : '' ?></td>
        </tr>
    </table>
    <div class="card border-left-dark shadow mb-3">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                        見積もり価格：</div>
                    <div class="mb-0 font-weight-bold text-gray-800 text-lg">
                        <?= $this->Number->format($estimate->price), '円' ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-yen-sign fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">概要</div>
        <div class="card-body">
        <?= $this->Text->autoParagraph(h($estimate->document)); ?>
        </div>
    </div>
</div>
