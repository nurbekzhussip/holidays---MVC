<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Личный кабинет</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="/template/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="/template/css/style.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
   <script type="text/javascript" src="/template/js/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="/template/js/script.js"></script>
</head>
<body cz-shortcut-listen="true">
   <?php include ROOT . '/views/layouts/header.php';?>
    <div class="container">
      <div class="row">
       <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1" id="edit-holiday">
           <h3>Ваши данные</h3>
                <p>
                    <span>Имя: </span><?=$user['name'];?>
                </p>
                <p>
                    <span>email: </span><?=$user['email'];?>
                </p>
                <br>
                   <?php if($holidayList){?>
                    <p>Ваш запрос:</p>
                        <div class="user-holiday">
                        <table class="user-list">
                        <tr><th>Начало</th><th>Конец</th><th>Статус</th><?php if($holidayList['status']!='1'){?><th>Действие</th><?php }?></tr>
                        <tr><td><?php echo $holidayList['fromDate'];?></td><td><?php echo $holidayList['toDate'];?></td>
                        <?php switch($holidayList['status']){
                        case '0':echo "<td>В проверке</td>";break;
                        case '1':echo "<td class='success'>Одобрен</td>";break;
                        default:echo "<td class='warning'>Не найден</td>";break;
                        }?><?php if($holidayList['status']!='1'){?><td><a href='JavaScript:void(0)' class='edit' id="edit">Изменить</a></td><?php }?>
                        </tr>
                        </table>
                        </div>
                        <?php }?>
                        <?php if(!$holidayList || $holidayList['status']!='1'){?>
                <p id="set-holiday-p">Выберите отпускние дни</p>
            <div class="user-holiday" id="set-holiday">
                <p class="datepicker"><input type="text" name="daterange" value="" id="daterange"/></p>
                <button type="button"  class='send btn btn-success' id="send">В отпуск!</button>
            </div> 
            <?php }?>
        </div>
      </div>
    </div>
    
</body>
</html>