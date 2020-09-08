<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post $post
 */
?>
<div class="row">
	<aside class="column">
		<div class="side-nav">
			<h4 class="heading"><?= __('Actions') ?></h4>

			<?= $this->Html->link(__('List Posts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>

		</div>
	</aside>
	<div class="column-responsive column-80">
		<div class="posts view content">
			<h3><?= h($post->title) ?></h3>
			<table>
				<tr>
					<th><?= __('Title') ?></th>
					<td><?= h($post->title) ?></td>
				</tr>
				<tr>
					<th><?= __('Tags') ?></th>
					<td>
						<?php foreach ($post->tags as $tag) : ?>
							<?= $this->Html->link($tag->title, ['controller' => 'Tags', 'action' => 'view', $tag->id]) ?>
						<?php endforeach; ?>
					</td>
				</tr>
				<tr>
					<th><?= __('UserName') ?></th>
					<td><?= h($post->user->username) ?></td>
				</tr>
				<tr>
					<th><?= __('Created') ?></th>
					<td><?= h($post->created) ?></td>
				</tr>
				<tr>
					<th><?= __('Modified') ?></th>
					<td><?= h($post->modified) ?></td>
				</tr>
			</table>
			<div class="text">
				<strong><?= __('Body') ?></strong>
				<blockquote>
					<?= $this->Text->autoParagraph(h($post->body)); ?>
				</blockquote>
				<strong><?= __('Comments') ?></strong>
				<blockquote>
					<?php foreach ($post->comments as $comment) : ?>
						<!-- <?= $this->Text->autoParagraph(h($comment->body) . '  by' . h($comment->user->username)) ?> -->
						<?= $this->Text->autoParagraph(h($comment->body)) ?>
					<?php endforeach; ?>
				</blockquote>
			</div>
		</div>
		<div class="text">

		</div>
	</div>
</div>