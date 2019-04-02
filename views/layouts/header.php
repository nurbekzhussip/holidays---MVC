<nav class="navbar bg-light container header">
<a href="/user/login" class="navbar-brand">Logo</a>
<span class="navbar-text">
<?php $page = explode("/", $_SERVER['REQUEST_URI']); $page = $page[2];
if(isset($user['id'])){?>
<a href="/cabinet/index" class="<?php echo ($page == "index" ? "active" : "");?>">Мой профиль</a>
<a href="/cabinet/holiday" class="<?php echo ($page == "holiday" ? "active" : "");?>">Сотрудники</a>
<a href="/user/logout">Выход</a>
<?php }else{?>
<a href="/user/register" class="<?php echo ($page == "register" ? "active" : "");?>">Регистрация</a>
<a href="/user/login" class="<?php echo ($page == "login" ? "active" : "");?>">Вход</a>
<?php }?>
</span>
</nav>