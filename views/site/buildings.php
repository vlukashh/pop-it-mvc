<h2>Добавить здание</h2>
<div class="form">
    <form method="post"  enctype="multipart/form-data">
        <div class="cont">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="form_int">
                <input type="text" name="name" placeholder="Название">
            </label>
            <label class="form_int">
                <input type="text" name="address" placeholder="Адресс">
            </label>
            <label class="label">Фото <input type="file" name="img"></label>
            <button>Добавить</button>
        </div>
    </form>
</div>
<div class="block">
    <?php
    foreach ($buildings as $building) {
        echo '<div style="    background-color: #eabfe2;
        border-radius: 25px; padding: 10px 30px 10px 30px; width: 200px;
    height: 140px;margin: 0 0 10px 0" >' ;
        echo '<p>Название: ' . $building->name . '</p>';
        echo '<p>Адрес: ' . $building->address . '</p>';
        echo '<p style="font-size: 24px"><img style="width: 30px; height: 30px" src="/public/img/' . $building->img . '" alt=""></p>';

        echo '</div>' ;
    }
    ?>
</div>