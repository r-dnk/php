<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная страница</title>
    <meta name="description" content="Главная страница интернет-магизина">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css" charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Популярные товары</h1>
        <div class="products">
            <?php for($i = 0; $i < count($data); $i++): ?>
                <div class="product">
                    <div class="image">
                        <img src="/public/img/<?=$data[$i]['img']?>" alt="<?=$data[$i]['title']?>">
                    </div>
                    <h3><?=$data[$i]['title']?></h3>
                    <p><?=$data[$i]['anons']?></p>
                    <a href="/product/<?=$data[$i]['id']?>"><button class="btn">Детальнее</button></a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
    <?php require_once 'public/blocks/footer.php'?>

</body>
</html>