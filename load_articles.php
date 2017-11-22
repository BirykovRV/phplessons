<?php
require_once 'dbconnection.php';
$db->Connect();
// нашли все статьи по id
$articles = $db->FindAllBy('articles', '*');
arsort($articles);
?>
<!-- проходим по массиву и выводим статьи -->
<?php foreach ($articles as $key => $value): ?>
  <!-- находим пользователя по id -->
  <?php $user = $db->GetUserById(array($value['userid'])); ?>
  <div class="articles">
    <h1><?php echo $value['title']; ?></h1>
    <p><?php echo $value['article']; ?></p>
    <div class="">
      <h5>Создан: <?php echo $value['created'] . " / Автор: " . $user['login']; ?></h5>
    </div>
    <div class="like" data-id="<?php print $value['articleid'] ?>">
      <span class="counter"><?php print $value['count_like'] ?></span>
    </div>
  </div>
<?php endforeach; ?>

<?php $db->Close(); ?>
