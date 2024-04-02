<h2>Подсчет общей площади учебных аудиторий по учебному заведению</h2>
<form class="count__form">
    <select name="id_building" id="id_building">
        <?php
        foreach ($buildings as $building){
            echo '<option value="' . $building->id . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Площадь:</h3>
<div class="block">
    <?php
    foreach ($rooms as $room) {
        echo '<div style="    background-color: #eabfe2;
        border-radius: 25px; padding: 10px 30px 10px 30px; width: 200px;
    height: 140px;margin: 0 0 10px 0" >' ;
        echo '<p>Площадь: ' . $room->square . '</p>';

        echo '</div>' ;
    }
    ?>
</div>