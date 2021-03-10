<div class="users form">
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
	<fieldset>
		<legend>アカウント名とパスワードを入力して下さい。</legend>
		<?= $this->Form->input('name', ['class' => 'form-control']) ?>
		<?= $this->Form->input('password', ['class' => 'form-control']) ?>
	</fieldset>
<?= $this->Form->button('Login', array('class' => 'btn btn-primary btn-user btn-block')); ?>
<?= $this->Form->end() ?>
</div>