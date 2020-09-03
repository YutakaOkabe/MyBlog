<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>

<head>
  <?= $this->Html->charset() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?= $cakeDescription ?>:
    <?= $this->fetch('title') ?>
  </title>
  <?= $this->Html->meta('icon') ?>

  <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

  <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>

<body>
  <nav class="top-nav">
    <div class="top-nav-title">
      <a href="<?= $this->Url->build('/') ?>"><span>MyBlog - CMS</a>
    </div>
    <div class="top-nav-links">
      <a href="/admin/posts">記事一覧</a>
      <a href="/admin/tags">タグ一覧</a>
      <a href="/admin/users">ユーザ一覧</a>
      <?php if (is_null($this->request->getAttribute('identity'))) : ?>
        <a href="/posts">フロント画面に戻る</a>
      <?php else : ?>
        <a href="/admin/users/logout">ログアウト</a>
      <?php endif; ?>
    </div>
  </nav>
  <main class="main">
    <div class="container">
    <?php if (!is_null($this->request->getAttribute('identity'))) : ?>
      <div class="loginuser">ログイン中のユーザ：<?= h($this->request->getAttribute('identity')->username);?></div>
    <?php endif; ?>
      <?= $this->Flash->render() ?>
      <?= $this->fetch('content') ?>
    </div>
  </main>
  <footer>
  </footer>
</body>

</html>