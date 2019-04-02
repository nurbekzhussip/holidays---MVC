<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Список сотрудников</title>
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
    <div class="container content">
      <div class="row">
        <div class="col-md-8 offset-md-2">
         <h3>Список сотрудников</h3>
          <div class="table-responsive">
            <table class="user-list table table-bordered table-striped table-highlight">
            <tr><th>Имя</th><th>Email</th><th>Начало</th><th>Конец</th><th>Статус</th></tr>
            <?php foreach($userList as $userItem){?>
            <tr>
            <td><?php echo $userItem['name'];?></td>
            <td><?php echo $userItem['email'];?></td>
            <td><?php echo $userItem['fromDate'];?></td>
            <td><?php echo $userItem['toDate'];?></td>
            <?php switch($userItem['status']){
                        case '0':echo "<td>В проверке</td>";break;
                        case '1':echo "<td class='success'>Одобрен</td>";break;
                        default:echo "<td>Не найден</td>";break;
}?>
            </tr>
           <?php }?>
           </table>
         </div>
        </div>
      </div>
    </div>
    <?php include ROOT . '/views/layouts/footer.php';?>
</body>
</html>