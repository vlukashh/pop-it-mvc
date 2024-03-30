<h2>Подсчет общей площади учебных аудиторий по зданию</h2>
<form class="count__form">
    <select name="id_building" id="id_building">
        <?php
        foreach ($building as $building){
            echo '<option value="' . $building->id . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<div class="qwe">
    <h3>Посадочных мест:</h3>
    <input class="count__int">
</div>
