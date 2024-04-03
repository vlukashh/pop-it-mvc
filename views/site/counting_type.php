<h2>Подсчет общей площади учебных аудиторий по типу помещения</h2>
<form class="count__form">
    <select name="square_type">
        <?php
        foreach ($room_types as $room_types){
            echo '<option value="' . $room_types->id_room_type . '">' . $room_types->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Площадь:</h3>
<div class="block" >
    <?php
    $square_type = 0;
    if(!empty($rooms)):
        foreach ($rooms as $room) {
            $square_type += $room->square;
        }
        echo '<div class="counts" style="border: 2px solid black; height: 25px; font-weight: bold ">'.$square_type.' м^2'.'</div>';
    endif;
    ?>
</div>