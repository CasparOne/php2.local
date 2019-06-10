<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update</title>
</head>
<body>
<hr>
<h1>Админ панель</h1>
<hr>
<h2>Редактирование новости</h2>
<form action="/admin/update.php" method="post">
    <input type="hidden" name="id" value="<?=$article->id;?>">
    <textarea name="title" cols="60" rows="3"><?=$article->title; ?></textarea> <br>
    <textarea name="text" cols="60" rows="20"><?=$article->text; ?></textarea> <br>
    <button>Отправить</button>
</form>

</body>
</html>