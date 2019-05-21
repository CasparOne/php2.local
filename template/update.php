<body>
<div class="container">
    <h1>Админ панель</h1>
    <h4>Редактирование новости</h4>
    <form action="/admin/update.php" method="post">
        <input type="hidden" name="id" value="<?=$article->id;?>">
        <textarea name="title" cols="60" rows="3"><?=$article->title; ?></textarea> <br>
        <textarea name="text" cols="60" rows="20"><?=$article->text; ?></textarea> <br>
        <button>Отправить</button>
    </form>

</body>
</html>
</section>
