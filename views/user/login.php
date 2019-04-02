<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Вход</title>
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>

<body cz-shortcut-listen="true">
    <div class="container user-form">
        <?php include ROOT . '/views/layouts/header.php';?>
            <div class="col-md-6 offset-md-3 signup-form">
                <h3>Вход</h3>
                <?php if(isset($errors) && is_array($errors)){?> <span class="error"><?php echo array_shift($errors);?></span>
                    <?php }?>
                        <form action="" method="post">
                            <p>
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" placeholder="" value="<?=$email;?>"> </p>
                            <p>
                                <label for="password">Пароль</label>
                                <input type="password" name="password" id="password" placeholder="" value=""> </p>
                            <p>
                                <input type="submit" name="submit" value="Войти"> </p>
                        </form>
                        <p>Ещё не зарегистрированы? <a href="/user/register">Регистрация</a></p>
            </div>
    </div>
    <script type="text/javascript" src="/template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/template/js/script.js"></script>
</body>

</html>