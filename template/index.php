<?php
$title = 'Новости';

include __DIR__ . '/head.php';

?>
<body>
<div class="container">
    <header class="header">
        <a href="/admin/">Админка</a>
        <h1 class="main-header">Последние новости</h1>
    </header>

<?php if (!empty($articles)):
foreach ($articles as $article):
     ?>
    <section class="main-content">
        <div class="row">
            <div class="col-3 col-md-6 col-lg-8">
                <h3 class="article-header"><a href="/article/id<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h3>
                <p class="article-text"><?php echo $article->text; ?></p>
                <p class="article-author__name"><?php echo $article->author->nick_name; ?></p>
            </div>
        </div>
    </section>
<?php
endforeach;
else: ?>
<h1 class="alert">Ошибко!!</h1>
<p class="text-capitalize text-alert">Что то пошло не так. Стукните программиста чем нибудь тяжелым!</p>
<?php
endif;
?>
</div>
</body>
</html>