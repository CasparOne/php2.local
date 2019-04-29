<?php
$title = 'Админ Панель';

include_once __DIR__ . '/head.php';

?>
<body>
<div class="container">
    <header class="header">
        <a href="../index.php">Главная</a>
        <a href="create.php">Новая тема</a>
        <h1 class="main-header">
            Админ панель
        </h1>
    </header>
    <?php if (!empty($articles)):
        foreach ($articles as $article):
            ?>
        <section class="main-content">
            <div class="row">
                <div class="col-3 col-md-6 col-lg-8">
                    <h3><?php echo $article->title; ?></h3>
                    <p><?php echo $article->text; ?></p>
                    <p><i>
                            <?php echo ucfirst($article->author->first_name[1]) .
                                '. ' .
                                $article->author->last_name; ?>
                        </i></p>
                    <p align="left"><a href="update.php?id=<?php echo $article->id; ?>">Редактировать</a>&nbsp&nbsp&nbsp&nbsp
                        <a href="delete.php?id=<?php echo $article->id; ?>">Удалить</a>
                </div>
            </div>
        </section>
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