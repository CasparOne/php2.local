<?php
$title = 'Админ Панель';

include __DIR__ . '/head.php';

?>
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
            <p><i><?php echo $article->author; ?></i></p>
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