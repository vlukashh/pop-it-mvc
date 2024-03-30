<h2>Выбор помещения по зданию</h2>
<form class="count__form">
    <select name="id_building" id="id_building">
        <?php
        foreach ($building as $building){
            echo '<option value="' . $building->id . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<div class="form__cho">
    <form >
        <h3>Название помещений</h3>
        <p><input type="checkbox" name="a" value="1417"> Название</p>
        <p><input type="checkbox" name="a" value="1680"> Название</p>
        <p><input type="checkbox" name="a" value="1883"> Название</p>
        <p><input type="checkbox" name="a" value="1934"> Название</p>
    </form>
</div>