<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
	$this->assign('title', 'ユーザー編集');
?>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->control('name', ['label' => '氏名', 'class' => 'form-control']);
            //echo $this->Form->control('password', ['label' => 'パスワード', 'class' => 'form-control']);
            echo $this->Form->control('mail', ['label' => 'メールアドレス', 'class' => 'form-control']);
            echo $this->Form->control('tel', ['label' => '電話番号', 'class' => 'form-control']);
            echo $this->Form->control('role_id', ['label' => '権限', 'class' => 'w-auto form-control', 'options' => $roles]);
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
