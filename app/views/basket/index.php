<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
    <meta name="description" content="Корзина">
    <link rel="stylesheet" type="text/css" href="/public/css/main.css" charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/public/css/products.css" charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
</head>
<body>
    <?php require_once 'public/blocks/header.php'?>

    <div class="container main">
        <h1>Корзина</h1>

        <?php if(count($data['products']) == 0): ?>
            <?=$data['empty']?>
        <?php else: ?>

        <div class="products">
            <form action="/basket" method="post">
                <input type="hidden" name="del_all" value="del_all">
                <button class="btn del all" ><i class="far fa-trash-alt"></i> Очистить</button>
            </form>

            <?php
            $sum = 0;
            for ($i = 0; $i < count($data['products']); $i++):
                $sum += $data['products'][$i]['price'];
                ?>

            <div class="row">
                <img src="/public/img/<?=$data['products'][$i]['img']?>" alt="<?=$data['products'][$i]['title']?>">
                <h4><?=$data['products'][$i]['title']?></h4>
                <span><?=$data['products'][$i]['price']?> грн</span>

                <form action="/basket" method="post">
                    <input type="hidden" name="item_id_del" value="<?=$data['products'][$i]['id']?>">
                    <button class="btn del" ><i class="far fa-trash-alt"></i></button>
                </form>
            </div>

            <?php endfor; ?>

            <button class="btn">Оформить заказ (<b><?=$sum?> грн</b>)</button>
        </div>

        <?php endif;?>

    </div>

    <?php require_once 'public/blocks/footer.php'?>

</body>
</html>