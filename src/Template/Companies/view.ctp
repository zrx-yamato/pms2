<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
	$this->assign('title', '「' . $company->name . '」関連会社の詳細');
?>
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <!-- 編集 -->
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-edit"></i></span>
        <span class="text">編集</span>',
        ['action' => 'edit', $company->id], ['class' => 'btn btn-secondary btn-icon-split mr-2', 'escape' => false]) ?>
    <!-- 削除 -->
    <?= $this->Form->postLink('
        <span class="icon text-white-50"><i class="fas fa-trash-alt"></i></span>
        <span class="text">削除</span>',
        ['action' => 'delete', $company->id], ['confirm' => __('関連会社名「'.$company->name.'」を本当に削除しますか？', $company->id), 'class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<div class="companies view large-9 medium-8 columns content">
    <table class="table table-striped">
        <tr>
            <th scope="row"><?= __('ID') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('関連会社名') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('電話番号') ?></th>
            <td><?= h($company->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('住所') ?></th>
            <td><?= h($company->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('登録日') ?></th>
            <td><?= h($company->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('更新日') ?></th>
            <td><?php if($company->update_at != null) echo h($company->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
        </tr>
    </table>
<!-- 
    <div class="related">
        <h4><?= __('Related Personnels') ?></h4>
        <?php if (!empty($company->personnels)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Mail') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <?php foreach ($company->personnels as $personnels): ?>
            <tr>
                <td><?= h($personnels->id) ?></td>
                <td><?= h($personnels->name) ?></td>
                <td><?= h($personnels->mail) ?></td>
                <td><?= h($personnels->company_id) ?></td>
                <td><?= h($personnels->is_delete) ?></td>
                <td><?= h($personnels->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?php if($personnels->update_at != null) echo h($personnels->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Personnels', 'action' => 'view', $personnels->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Personnels', 'action' => 'edit', $personnels->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Personnels', 'action' => 'delete', $personnels->id], ['confirm' => __('Are you sure you want to delete # {0}?', $personnels->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Projects') ?></h4>
        <?php if (!empty($company->projects)): ?>
        <table class="table table-bordered table-hover dataTable" cellpadding="0" cellspacing="0">
            <thead>
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Git Data') ?></th>
                <th scope="col"><?= __('Id Pass Area') ?></th>
                <th scope="col"><?= __('Memo') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Personnel Id') ?></th>
                <th scope="col"><?= __('Is Delete') ?></th>
                <th scope="col"><?= __('Create At') ?></th>
                <th scope="col"><?= __('Update At') ?></th>
                <th scope="col"><?= __('Add User Id') ?></th>
                <th scope="col"><?= __('Add Update Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <?php foreach ($company->projects as $projects): ?>
            <tr>
                <td><?= h($projects->id) ?></td>
                <td><?= h($projects->title) ?></td>
                <td><?= h($projects->git_data) ?></td>
                <td><?= h($projects->id_pass_area) ?></td>
                <td><?= h($projects->memo) ?></td>
                <td><?= h($projects->company_id) ?></td>
                <td><?= h($projects->personnel_id) ?></td>
                <td><?= h($projects->is_delete) ?></td>
                <td><?= h($projects->create_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?php if($projects->update_at != null) echo h($projects->update_at->i18nFormat('yyyy年MM月dd日')) ?></td>
                <td><?= h($projects->add_user_id) ?></td>
                <td><?= h($projects->add_update_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $projects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $projects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $projects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $projects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
-->
</div>
