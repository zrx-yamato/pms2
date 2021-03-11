<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
    $this->assign('title', '「' . $company->name . '」の関連会社編集');
?>
<div class="companies form large-9 medium-8 columns content">
    <?= $this->Form->create($company) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['label' => '関連会社名', 'class' => 'form-control']);
            echo $this->Form->control('tel', ['label' => '電話番号', 'class' => 'form-control']);
            echo $this->Form->control('address', ['label' => '住所', 'class' => 'form-control']);
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
