<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body cz-shortcut-listen="true">
    <?php include ROOT . '/views/layouts/header.php';?>
        <div class="container user-form">
            <div class="col-md-6 offset-md-3 signup-form">
                <?php if($result){?>
                    <div class="success-form">
                        <p class="success">Спасибо! Вы успешно зарегистрированы!</p>
                        <p>Для входа в Личный кабинет нажмите на кнопку "Вход" в правом верхнем углу</p>
                    </div>
                    <?php }else{ ?>
                        <h3>Регистрация</h3>
                        <?php if(isset($errors) && is_array($errors)){?> <span class="error"><?php echo array_shift($errors);?></span>
                            <?php } ?>
                                <form action="" method="post">
                                    <p>
                                        <label for="name">Имя <span class="require">*</span></label>
                                        <input type="text" name="name" id="name" placeholder="" value="<?=$name;?>"> </p>
                                    <p>
                                        <label for="email">Email <span class="require">*</span></label>
                                        <input type="email" name="email" id="email" placeholder="" value="<?=$email;?>"> </p>
                                    <p>
                                        <label for="password">Пароль <span class="require">*</span></label>
                                        <input type="password" name="password" id="password" placeholder="" value=""> </p>
                                    <p>
                                        <input type="submit" name="submit" value="Зарегиcтрироваться"> </p>
                                </form>
                                <p>Уже зарегистрированы? <a href="/user/login">Войти</a></p>
                                <?php } ?>
            </div>
        </div>
        <script type="text/javascript" src="/template/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/template/js/script.js"></script>
</body>

</html>