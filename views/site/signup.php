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
<div class="pac">
    <?php
    foreach ($users as $user) {
        echo '<div style="    background-color: #eabfe2;
        border-radius: 25px; padding: 10px 30px 10px 30px; width: 400px;
    height: 115px;margin: 0 0 10px 0">' ;
        echo '<p style="font-size: 16px">Логин:' . $user->login . '</p>';
        echo '<p style="font-size: 16px">Пароль:' . $user->password . '</p>';
        echo '</div>' ;
    }
    ?>
</div>