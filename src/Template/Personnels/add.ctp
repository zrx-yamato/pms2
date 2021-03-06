<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Personnel $personnel
 */
    $this->assign('title', '担当者追加');
?>
<div class="personnels form large-9 medium-8 columns content">
    <?= $this->Form->create($personnel) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['label' => '担当者名', 'class' => 'form-control']);
            echo $this->Form->control('mail', ['label' => 'メールアドレス', 'class' => 'form-control']);
            echo $this->Form->control('company_id', ['options' => $companies, 'label' => '関連会社名', 'class' => 'w-auto form-control']);
        ?>
    </fieldset>
    <button type="submit" class="btn btn-primary ml-auto d-block">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">追加する</span>
    </button>
    <?= $this->Form->end() ?>
</div>
