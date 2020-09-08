<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Post[]|\Cake\Collection\CollectionInterface $posts
 */
?>
<div class="posts index content">
	<h3><?= __('Posts') ?></h3>
	<div class="table-responsive">
		<table>
			<thead>
				<tr>
					<th><?= $this->Paginator->sort('title') ?></th>
					<th><?= $this->Paginator->sort('tags') ?></th>
					<th><?= $this->Paginator->sort('body') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($posts as $post) : ?>
					<?php if ($post->published) : ?>
						<tr>
							<td><?= $this->Html->link($post->title, ['action' => 'view', $post->id]) ?></td>
							<td>
								<?php foreach ($post->tags as $tag) : ?>
									<?= $this->Html->link($tag->title, ['controller' => 'Tags', 'action' => 'view', $tag->id]) ?>
								<?php endforeach; ?>
							</td>
							<td><?= mb_strimwidth( h($post->body), 0, 20, '…', 'UTF-8' ); ?></td>
							<td><?= h($post->created) ?></td>
							<td class="actions">
								<?= $this->Html->link(__('View'), ['action' => 'view', $post->id]) ?>
								<?= $this->Html->link(__('Comment'), ['controller' => 'Comments', 'action' => 'add', $post->id]) ?>
            </td>
						</tr>
					<?php endif; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="paginator">
		<ul class="pagination">
			<?= $this->Paginator->first('<< ' . __('first')) ?>
			<?= $this->Paginator->prev('< ' . __('previous')) ?>
			<?= $this->Paginator->numbers() ?>
			<?= $this->Paginator->next(__('next') . ' >') ?>
			<?= $this->Paginator->last(__('last') . ' >>') ?>
		</ul>
		<p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
	</div>
</div>