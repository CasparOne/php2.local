<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новость</title>
</head>
<body>

<?php if (false != $article):?>
<hr>
<h1><?php echo $article->title; ?></h1>
<hr><br>
<p><?php echo $article->text;?></p>
<?php else: ?>
    <h1>Ошибко!!</h1>
    <p>Что то пошло не так. Стукните программиста чем нибудь тяжелым!</p>
<?php
endif;
?>
<br> <a href="index.php"> <<< Back</a>
</body>
</html>