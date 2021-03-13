<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
    $this->assign('title', '「' . $project->title . '」のプロジェクト編集');
?>

<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create($project) ?>
    <fieldset>
        <?php
            echo $this->Form->control('title', ['label' => 'プロジェクト名', 'class' => 'form-control']);
            echo $this->Form->control('git_data', ['label' => 'git情報', 'class' => 'form-control']);
            echo $this->Form->control('id_pass_area', ['label' => 'ID、パスワード情報', 'class' => 'form-control']);
            echo $this->Form->control('memo', ['label' => 'メモ', 'class' => 'form-control']);
            echo $this->Form->control('company_id', ['label' => '関連会社名', 'options' => $companies, 'class' => 'w-auto form-control']);
            echo $this->Form->control('personnel_id', ['label' => '担当者', 'options' => $personnels, 'class' => 'w-auto form-control']);
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
