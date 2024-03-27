<h2>Добавить сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
    <label>Логин <input type="text" name="login"></label>
    <label>Пароль <input type="password" name="password"></label>
    <button>Добавить</button>
</form>