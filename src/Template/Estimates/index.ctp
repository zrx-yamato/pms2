<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate[]|\Cake\Collection\CollectionInterface $estimates
 */
$this->assign('title', '見積もり一覧');

$confirm_sum = null;
$prospect_sum = null;
foreach ($estimates_all as $estimate){
    if($estimate->status_id == 7){
        $confirm_sum += $estimate->price;
    } else if($estimate->status_id == 4 || $estimate->status_id == 5){
        $prospect_sum += $estimate->price;
    }
}
$request_status_id;
?>
<?php if($user->role_id != 4) :?> 
<nav class="large-3 medium-4 columns mb-3" id="actions-sidebar">
    <?= $this->Html->link('
        <span class="icon text-white-50"><i class="fas fa-plus-square"></i></span>
        <span class="text">見積もり追加</span>', ['action' => 'add'], ['class' => 'btn btn-secondary btn-icon-split', 'escape' => false]) ?>
</nav>
<?php endif ?>
<!-- 今年度合計売上 -->
<div class="card border-left-dark shadow mb-3">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col-5">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                    確定売上：</div>
                <div class="mb-0 font-weight-bold text-gray-800 text-lg">
                    <?= $this->Number->format($confirm_sum), '円' ?>
                </div>
            </div>
            <div class="col-5">
                <div class="text-xs font-weight-bold text-uppercase mb-1">
                    予定売上：</div>
                <div class="mb-0 font-weight-bold text-gray-800 text-lg">
                    <?= $this->Number->format($confirm_sum + $prospect_sum), '円 <span class="text-xs font-weight-bold text-uppercase mb-1">(内、見込み額：' . $this->Number->format($prospect_sum) . ')円</span>' ?>
                </div>
            </div>
            <div class="col-2 text-right">
                <i class="fas fa-yen-sign fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>

<!-- Bar Chart -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">今年度請求額グラフ</h6>
    </div>
    <div class="card-body">
        <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
        </div>
    </div>
</div>

<?= $this->Form->create(null, ['id'=> 'status', 'type' => 'post', 'url' => ['action'=> 'index']]) ?>
<select name="select_status" id="select_status" class="mb-2">
    <option value="">全件表示</option>
    <?php foreach ($statuses as $status):?>
        <option value="<?= $status->id ?>" <?php if($status->id == $request_status_id){ echo "selected"; } ?>><?= $status->name ?></option>
    <?php endforeach;?>
</select>
<?= $this->Form->end() ?>
<div class="estimates index large-9 medium-8 columns content">
    <table class="table table-bordered table-hover dataTable"  cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title', '見積もり名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price', '見積もり額') ?></th>
                <th scope="col"><?= $this->Paginator->sort('project_id', 'プロジェクト名') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id', 'ステータス') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fix_month', '請求月') ?></th>
                <th scope="col">
                    <?= $this->Paginator->sort('add_user_id', '登録者'), " / ", $this->Paginator->sort('update_user_id', '更新者') ?>
                </th>
                <th scope="col">
                    <?= $this->Paginator->sort('create_at', '登録日'), " / ", $this->Paginator->sort('update_at', '更新日') ?>
                </th>
                <th scope="col" class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($estimates) != 0):?>
            <?php foreach ($estimates as $estimate): ?>
            <tr>
                <td><?= $this->Number->format($estimate->id) ?></td>
                <td><?php echo $this->Html->Link(h($estimate->title) ,['action' => 'view', $estimate->id], ['escape' => false])?></td>
                <td data-price="<?= $estimate->price ?>" class="price"><?= $this->Number->format($estimate->price), "円" ?></td>
                <td><?= $estimate->has('project') ? $this->Html->link($estimate->project->title, ['controller' => 'Projects', 'action' => 'view', $estimate->project->id]) : '' ?></td>
                <td class="status_area" data-status-id="<?= $estimate->status->id ?>"><?= $estimate->has('status') ? $this->Html->link($estimate->status->name, ['controller' => 'Statuses', 'action' => 'view', $estimate->status->id]) : '' ?></td>
                <td class="fix_month">
                    <?php
                        $month = [0 => '未設定', 1 => '1月', 2 => '2月', 3 => '3月', 4 => '4月', 5 => '5月', 6 => '6月', 7 => '7月', 8 => '8月', 9 => '9月', 10 => '10月', 11 => '11月', 12 => '12月'];
                        echo $month[$estimate->fix_month] ?>
                </td>
                <td><?= $estimate->user->name, " / ", $estimate->updater->name ?></td>
                <td class="estimat_month" data-month="<?= $estimate->fix_month ?>">
                    <?php
                        echo $estimate->create_at->i18nFormat('yyyy年MM月dd日'), "<br>";
                        if($estimate->update_at != null){
                            echo $estimate->update_at->i18nFormat('yyyy年MM月dd日');
                        }
                     ?>
                </td>
                <td class="actions">
                    <span><?php echo $this->Html->Link('<i class="fas fa-desktop"></i> 表示',['action' => 'view', $estimate->id], ['escape' => false])?></span>
                    <?php if($user->role_id != 4) :?> 
                        <span><?php echo $this->Html->Link('<i class="fas fa-edit"></i> 編集',['action' => 'edit', $estimate->id], ['escape' => false])?></span>
                        <span><?= $this->Form->postLink('<i class="fas fa-trash-alt"></i> 削除', ['action' => 'delete', $estimate->id], ['confirm' => __('見積もり名「'.$estimate->title.'」を本当に削除しますか？', $estimate->id),'escape' => false]) ?></span>
                    <?php endif ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>
            <tr>
                <td colspan="8">データがありません。</td>
            </tr>
            <?php endif ?>
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

<pre>
<?php /*print_r($estimates);*/?>
</pre>