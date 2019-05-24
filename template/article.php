<?php
$title = 'Новости';

include __DIR__ . '/head.php';

?>
<body>
<?php if (false != $article):?>
<div class="container">
<header><h2 class="article-header"><?php echo $article->title; ?></h2></header>
</div>
<section class="news-text">
    <div class="col-3 col-md-4 col-lg-12">
        <p class="news-text__main"><?php echo $article->text;?></p>
    </div>
</section>
<?php else: ?>
    <h1>Ошибко!!</h1>
    <p>Что то пошло не так. Стукните программиста чем нибудь тяжелым!</p>
<?php
endif;
?>
<br> <a href="/"> <<< Back</a>
</body>
</html>