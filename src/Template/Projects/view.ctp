<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
    $this->assign('title', '「' . $project->title . '」プロジェクトの詳細');
    $this->assign('date', 'test');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $project->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $project->id], ['confirm' => __('ID{0}:' . $project->title . 'を本当に削除しますか？', $project->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>

<div class="paginator d-flex justify-content-between">
    <div>ID:<?= $this->Number->format($project->id) ?></div>
    <div>
        登録日:<?= h($project->create_at->i18nFormat('YYYY/MM/dd')) ?>(<?= $project->user->name?>)&nbsp;
        <?php if($project->update_at != null){ 
            echo('更新日:' . h($project->update_at->i18nFormat('YYYY/MM/dd')));
            echo '(' . $project->updater->name . ')';
        } ?>
    </div>
</div>
<div class="projects view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('プロジェクト名') ?></th>
            <td><?= h($project->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('git情報') ?></th>
            <td><?= h($project->git_data) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('クライアント') ?></th>
            <td><?= $project->has('company') ? $this->Html->link($project->company->name, ['controller' => 'Companies', 'action' => 'view', $project->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('担当者') ?></th>
            <td><?= $project->has('personnel') ? $this->Html->link($project->personnel->name, ['controller' => 'Personnels', 'action' => 'view', $project->personnel->id]) : '' ?></td>
        </tr>
    </table>
    
    <div class="card mb-4">
        <div class="card-header">ID、パスワード情報</div>
        <div class="card-body">
            <?= $this->Text->autoParagraph(h($project->id_pass_area)); ?>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">メモ</div>
        <div class="card-body">
            <?= $this->Text->autoParagraph(h($project->memo)); ?>
        </div>
    </div>

    <div class="related">
        <div class="card mb-4 border-left-dark">
            <div class="card-body">
                タスク一覧
            </div>
        </div>
        <?php if (!empty($project->tasks)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= __('ステータス') ?></th>
                <th scope="col"><?= __('タスク名') ?></th>
                <th scope="col"><?= __('概要') ?></th>
                <th scope="col"><?= __('想定時間') ?></th>
                <th scope="col"><?= __('実働時間') ?></th>
                <th scope="col"><?= __('担当者') ?></th>
                <th scope="col"><?= __('登録者') ?></th>
                <th scope="col"><?= __('更新者') ?></th>
                <th scope="col"><?= __('登録日') ?></th>
                <th scope="col"><?= __('更新日') ?></th>
                <th scope="col" class="actions"></th>
            </tr>
            </thead>
            <?php foreach ($project->tasks as $tasks): ?>
            <tr>
                <td><?= h($tasks->status->name) ?></td>
                <td><?= h($tasks->title) ?></td>
                <td><?= h($tasks->content) ?></td>
                <td><?= h($tasks->assumption_time) ?></td>
                <td><?= h($tasks->real_time) ?></td>
                <td><?= h($tasks->personnel->name) ?></td>
                <td><?= h($tasks->user->name); ?></td>
                <td><?= h($tasks->updater->name) ?></td>
                <td><?= h($tasks->create_at->i18nFormat('YYYY/MM/dd')) ?></td>
                <td><?= h($tasks->update_at->i18nFormat('YYYY/MM/dd')) ?></td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['controller' => 'tasks', 'action' => 'view', $tasks->id], ['escape' => false])?></span>
                    <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['controller' => 'tasks', 'action' => 'edit', $tasks->id], ['escape' => false])?></span>
                    <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['controller' => 'tasks', 'action' => 'delete', $tasks->id], ['confirm' => __('タスク名「' . $tasks->title . '」を本当に削除しますか？'),'escape' => false]) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>現在、タスクはありません。</p>
        <?php endif; ?>
    </div>
    
    <div class="related">
        <div class="card mb-4 border-left-dark">
            <div class="card-body">
                見積もり一覧
            </div>
        </div>
        <?php if (!empty($project->estimates)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col"><?= __('ステータス') ?></th>
                    <th scope="col"><?= __('見積もり名') ?></th>
                    <th scope="col"><?= __('概要') ?></th>
                    <th scope="col"><?= __('金額') ?></th>
                    <th scope="col"><?= __('登録者') ?></th>
                    <th scope="col"><?= __('更新者') ?></th>
                    <th scope="col"><?= __('登録日') ?></th>
                    <th scope="col"><?= __('更新日') ?></th>
                    <th scope="col" class="actions"></th>
                </tr>
            </thead>
            <?php foreach ($project->estimates as $estimates): ?>
            <tr>
                <td><?= h($estimates->status->name) ?></td>
                <td><?= h($estimates->title) ?></td>
                <td><?= h($estimates->document) ?></td>
                <td><?= h(number_format($estimates->price)) ?>円</td>
                <td><?= h($estimates->user->name) ?></td>
                <td><?= h($estimates->updater->name) ?></td>
                <td><?= h($estimates->create_at->i18nFormat('YYYY/MM/dd')) ?></td>
                <td><?= h($estimates->update_at->i18nFormat('YYYY/MM/dd')) ?></td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['controller' => 'estimates', 'action' => 'view', $estimates->id], ['escape' => false])?></span>
                    <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['controller' => 'estimates', 'action' => 'edit', $estimates->id], ['escape' => false])?></span>
                    <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['controller' => 'estimates', 'action' => 'delete', $estimates->id], ['confirm' => __('見積もり名「' . $estimates->title . '」本当に削除しますか？'),'escape' => false]) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php else: ?>
        <p>現在、見積もりはありません。</p>
        <?php endif; ?>
    </div>
</div>
