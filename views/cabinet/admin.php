<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Список сотрудников</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/work2/template/css/bootstrap.min.css">
    <link rel="stylesheet" href="/work2/template/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="/work2/template/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/work2/template/js/script.js"></script>
</head>

<body cz-shortcut-listen="true">
    <?php include ROOT . '/views/layouts/header.php';?>
        <div class="container content">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1" id="edit-holiday">
                    <h3>Ваши данные</h3>
                    <p> <span>Имя: </span>
                        <?=$user['name'];?>
                    </p>
                    <p> <span>email: </span>
                        <?=$user['email'];?>
                    </p>
                    <p><span>Должность: </span>Руководитель</p>
                    <br>
                    <?php if(count($userList)>=1){?>
                    <div class="table-responsive">
                        <table class="user-list table table-bordered table-striped table-highlight">
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Начало</th>
                            <th>Конец</th>
                            <th>Действие</th>
                        </tr>
                        <?php foreach($userList as $userItem){?>
                            <tr>
                                <td><?=$userItem['id'];?></td>
                                <td><?=$userItem['name'];?></td>
                                <td><?=$userItem['email'];?></td>
                                <td><?=$userItem['fromDate'];?></td>
                                <td><?=$userItem['toDate'];?></td>
                                <td class="action">
                                    <button type="button" class="btn btn-success" id="confirm" data-key='<?=$userItem['id'];?>'>Подтвердить</button>
                                </td>
                            </tr>
                            <?php  }?>
                        </table>
                    </div>
                    <?php }else{?>
                    <p>Нет событий</p>
                    <?php }?>
                </div>
            </div>
        </div>
        <?php include ROOT . '/views/layouts/footer.php';?>
</body>

</html>