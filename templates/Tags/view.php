<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<div class="row">
	<aside class="column">
		<div class="side-nav">
			<h4 class="heading"><?= __('Actions') ?></h4>
			<?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
		</div>
	</aside>
	<div class="column-responsive column-80">
		<div class="tags view content">
			<h3><?= h($tag->title) ?></h3>
			<table>
				<tr>
					<th><?= __('Title') ?></th>
					<td><?= h($tag->title) ?></td>
				</tr>
				<tr>
					<th><?= __('Number of Articles') ?></th>
					<td><?= count($tag->posts) ?></td>
				</tr>
			</table>
			<div class="related">
				<h4><?= __('Related Posts') ?></h4>
				<?php if (!empty($tag->posts)) : ?>
					<div class="table-responsive">
						<table>
							<tr>
								<th><?= __('User Name') ?></th>
								<th><?= __('Title') ?></th>
								<th><?= __('Created') ?></th>
							</tr>
							<?php foreach ($tag->posts as $post) : ?>
								<tr>
									<td><?= h($post->user->username) ?></td>
									<td><?= $this->Html->link($post->title, ['controller' => 'Posts', 'action' => 'view', $post->id]) ?></td>
									<td><?= h($post->created) ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>