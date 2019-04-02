<h3>Ваши данные</h3>
<p> <span>Имя: </span>
    <?=$user['name'];?>
</p>
<p> <span>email: </span>
    <?=$user['email'];?>
</p>
<?php 
if($user['status']=='1'){?>
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
    <?php }else{?><p>Нет событий</p><?php } 
        }else{
        if($checkHolidays){?>
        <br>
        <p>Ваш запрос:</p>
        <div class="user-holiday">
            <table class="user-list">
                <tr>
                    <th>Начало</th>
                    <th>Конец</th>
                    <th>Статус</th>
                    <?php if($checkHolidays['status']!='1'){?>
                        <th>Действие</th>
                        <?php }?>
                </tr>
                <tr>
                    <td>
                        <?php echo $checkHolidays['fromDate'];?>
                    </td>
                    <td>
                        <?php echo $checkHolidays['toDate'];?>
                    </td>
                    <?php switch($checkHolidays['status']){
                            case '0':echo "<td>В проверке</td>";break;
                            case '1':echo "<td class='success'>Одобрен</td>";break;
                            default:echo "<td class='warning'>Не найден</td>";break;
                            }?>
                        <?php if($checkHolidays['status']!='1'){?>
                            <td><a href='JavaScript:void(0)' class='edit' id="edit">Изменить</a></td>
                            <?php }?>
                </tr>
            </table>
        </div>
        <?php }?>
            <?php if(!$checkHolidays || $checkHolidays['status']!='1'){?>
                <p id="set-holiday-p">Выберите отпускние дни</p>
                <div class="user-holiday" id="set-holiday">
                    <p class="datepicker">
                        <input type="text" name="daterange" value="" id="daterange" /> </p>
                    <button type="button" class='send btn btn-success' id="send">В отпуск!</button>
                </div>
                <?php } }?>