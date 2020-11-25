<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <meta name="description" content="Регистрация" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/main.css?url=<?=mt_rand(0,100)?>" type="text/css" charset="utf-8">
    <link rel="stylesheet" href="/public/css/form.css?url=<?=mt_rand(0,100000)?>" type="text/css" charset="utf-8">
</head>
<body>
<?php require_once 'public/blocks/header.php'; ?>

<div class="container main">
    <h1>Регистрация</h1>
    <p>Здесь Вы можете зарегестрироваться</p>
    <form action="/user/reg" method="post" class="form-controll">
        <input type="text" name="name" placeholder="Введите имя" value="<?=$_POST['name']?>"><br>
        <input type="email" name="email" placeholder="Введите email" value="<?=$_POST['email']?>"><br>
        <input type="password" name="pass" placeholder="Введите пароль" value="<?=$_POST['pass']?>"><br>
        <input type="password" name="re_pass" placeholder="Повторите пароль" value="<?=$_POST['re_pass']?>"><br>
        <div class="error"><?=$data['message']?></div>
        <button class="btn" id="send">Регистрация</button>
    </form>
</div>

<?php require_once 'public/blocks/footer.php'; ?>
</body>
</html>