<h2>Подсчет общей площади учебных аудиторий по учебному заведению</h2>
<form class="count__form">
    <select name="square">
        <?php
        foreach ($buildings as $building){
            echo '<option value="' . $building->id_building . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Площадь:</h3>
<div class="block">
    <?php
    $squares = 0;
    if(!empty($rooms)):
        foreach ($rooms as $room) {
            $squares += $room->square;
        }
        echo '<div class="counts " style="border: 2px solid black; height: 25px; font-weight: bold ">'.$squares.' м^2'.'</div>';
    endif
    ?>
</div>