<h2>Добавить сотрудника</h2>
<h3><?= $message ?? ''; ?></h3>
<div class="form">
    <form method="post">
        <div class="cont">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="form_int">
                <input type="text" name="login" placeholder="Логин">
            </label>
            <label class="form_int">
                <input type="password" name="password" placeholder="Пароль">
            </label>
            <button>Добавить</button>
        </div>
    </form>
</div>

