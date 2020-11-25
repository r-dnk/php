<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$data['title']?></title>
    <meta name="description" content="<?=$data['anons']?>">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css" charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/product.css" charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'public/blocks/header.php'?>

    <div class="container main">
        <a href="/categories/<?=$data['category']?>">Назад</a>
        <h1><?=$data['title']?></h1>
        <div class="info">
            <div>
                <img src="/public/img/<?=$data['img']?>" alt="<?=$data['title']?>">
            </div>
            <div>
                <p><?=$data['anons']?></p><br>
                <p><?=$data['text']?></p>
            </div>
            <div>
                <form action="/basket" method="post">
                    <input type="hidden" name="item_id" value="<?=$data['id']?>">
                    <button class="btn">Купить за <?=$data['price']?> грн</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>