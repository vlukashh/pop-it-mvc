<h2>Выбор помещения по зданию</h2>
<div>
    <select name="id_building" id="id_building">
        <?php
        foreach ($building as $building){
            echo '<option value="' . $building->id . '">' . $building->name . '</option>';}
        ?>
    </select>
</div>
<div class="form__cho">
   <p>Название помещения</p>
</div>
<div class="block">
    <?php
    foreach ($rooms as $room) {
        echo '<div style="    background-color: #eabfe2;
        border-radius: 25px; padding: 10px 30px 10px 30px; width: 200px;
    height: 140px;margin: 0 0 10px 0" >' ;
        echo '<p>Название: ' . $room->name . '</p>';
        echo '<p>Вид: ' . $room->id_room_type . '</p>';
        echo '<p>Площадь: ' . $room->square . '</p>';
        echo '<p>Количество: ' . $room->quantity . '</p>';
        echo '<p>Здание: ' . $room->id_building . '</p>';
        echo '<p >Фото:<img style="width: 30px; height: 30px" src="/public/img/' . $room->img . '" alt=""></p>';
        echo '</div>' ;
    }
    ?>
</div>