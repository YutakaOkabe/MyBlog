<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
	<aside class="column">
		<div class="side-nav">
			<h4 class="heading"><?= __('Actions') ?></h4>
			<?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
		</div>
	</aside>
	<div class="column-responsive column-80">
		<div class="users form content">
			<?= $this->Form->create($user, ['type' => 'file']) ?>
			<fieldset>
				<legend><?= __('Add User') ?></legend>
				<?php
				echo $this->Form->control('username');
				echo $this->Form->control('email');
				echo $this->Form->control('password');

				// ファイルアップロード
				echo $this->Form->control('img', ['type' => 'file']);
				echo $this->ContentsFile->contentsFileHidden($user->contents_file_img, 'contents_file_img');
				if (!empty($user->contents_file_img)) {
					echo $this->ContentsFile->image($user->contents_file_img);
					echo $this->Form->control('delete_img', ['type' => 'checkbox', 'label' => 'delete']);
				}
				
				?>
			</fieldset>
			<?= $this->Form->button(__('Submit')) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>