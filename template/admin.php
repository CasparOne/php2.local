<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News - Admin panel</title>
</head>
<body>
<hr>
<a href="../index.php">Главная</a>
<h1>Админ панель</h1>
<a href="create.php">Новая тема</a>
<hr>
<br>
<h2>Список новостей</h2>
<?php if (!empty($articles)):
    foreach ($articles as $article):
        ?><br>
        <article>
            <h3><?php echo $article->title; ?></h3>
            <p><?php echo $article->text; ?></p>
            <p align="left"><a href="update.php?id=<?php echo $article->id; ?>">Редактировать</a>&nbsp&nbsp&nbsp&nbsp
                <a href="delete.php?id=<?php echo $article->id; ?>">Удалить</a>
        </article>
    <?php
    endforeach;
else: ?>
    <h1>Ошибко!!</h1>
    <p>Что то пошло не так. Стукните программиста чем нибудь тяжелым!</p>
<?php
endif;
?>

</body>
</html>