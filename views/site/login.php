<h2>Авторизация</h2>
<h3><?= $message ?? ''; ?></h3>

<h3><?= app()->auth->user()->name ?? ''; ?></h3>
<?php
if (!app()->auth::check()):
    ?>
    <div class="form">
        <form method="post">
            <div class="cont">
                <label class="form_int">
                    <input type="text" name="login" placeholder="Логин">
                </label>
                <label class="form_int">
                    <input type="password" name="password" placeholder="Пароль">
                </label>
                <button>Войти</button>
            </div>
        </form>
    </div>
<?php endif;