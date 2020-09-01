<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag[]|\Cake\Collection\CollectionInterface $tags
 */
?>
<div class="tags index content">
  <h3><?= __('Tags') ?></h3>
  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('title') ?></th>
          <th><?= $this->Paginator->sort('Number of Posts') ?></th>
          <th><?= $this->Paginator->sort('Recent Post') ?></th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($tags as $tag) : ?>
          <tr>
            <td><?= $this->Html->link($tag->title, ['action' => 'view', $tag->id])
             ?></td>
            <td><?= count($tag->posts) ?></td>
            <td><?= dd($tag->posts[0]->title) ?></td>
            <td><?= h($recentPost->title) ?></td>

          </tr>
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