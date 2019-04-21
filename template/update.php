<?php
$title = 'Update';

include __DIR__ . '/head.php';

?>
<body>
<hr>
<h1>Админ панель</h1>
<hr>
<h2>Редактирование новости</h2>
<form action="/admin/update.php" method="post">
    <input type="hidden" name="id" value="<?=$article->id;?>">
    <textarea name="title" cols="60" rows="3"><?=$article->title; ?></textarea> <br>
    <textarea name="text" cols="60" rows="20"><?=$article->text; ?></textarea> <br>
    <textarea name="author" cols="60" rows="1"><?=$article->author; ?></textarea> <br>
    <button>Отправить</button>
</form>

</body>
</html>