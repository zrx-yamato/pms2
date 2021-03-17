<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Estimate $estimate
 */
    $this->assign('title', '「' . $estimate->title . '」の見積もり編集');
?>
<div class="estimates form large-9 medium-8 columns content">
    <?= $this->Form->create($estimate) ?>
    <fieldset>
        <?php
            echo $this->Form->control('title', ['label' => '見積もり名', 'class' => 'form-control']);
            echo $this->Form->control('document', ['label' => '概要', 'class' => 'form-control']);
            echo $this->Form->control('price', ['label' => '見積もり価格', 'id' => 'price', 'class' => 'form-control mb-1']), '<span id="test"></span>';
            echo $this->Form->control('project_id', ['options' => $projects, 'label' => 'プロジェクト名', 'class' => 'w-auto form-control']);
            echo $this->Form->control('status_id', ['options' => $statuses, 'label' => 'ステータス', 'class' => 'w-auto form-control']);
        ?>
    </fieldset>
    <button type="submit" class="btn btn-primary ml-auto d-block">
        <span class="icon text-white-50">
            <i class="fas fa-edit"></i>
        </span>
        <span class="text">更新する</span>
    </button>
    <?= $this->Form->end() ?>
</div>
