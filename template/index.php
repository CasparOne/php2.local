<!doctype html>
<html lang="RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>
<p><a href="/admin/">Админка</a></p>
<div><hr>
<h1>Последние новости</h1>
<hr>

<?php if (!empty($articles)):
foreach ($articles as $article):
     ?><br>
<article>
    <h3><a href="/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a></h3>
    <p><?php echo $article->text; ?></p>
</article>
<?php
endforeach;
else: ?>
<h1>Ошибко!!</h1>
<p>Что то пошло не так. Стукните программиста чем нибудь тяжелым!</p>
<?php
endif;
?>
</div>
</body>
</html>