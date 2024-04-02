<h2>Добавить помещение</h2>
<div class="form__room">
    <form method="post">
        <div class="cont__room">
            <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label class="form_int">
                <input type="text" name="name" placeholder="Название">
            </label>
            <select name="id_room_type" id="id_room_type">
                <?php
                foreach ($room_types as $room_types){
                    echo '<option value="' . $room_types->id . '">' . $room_types->name . '</option>';}
                ?>
            </select>
            <label class="form_int">
                <input type="text" name="square" placeholder="Площадь">
            </label>
            <label class="form_int">
                <input type="text" name="quantity" placeholder="Количество посадочных мест">
            </label>
            <select name="id_building" id="id_building">
                <?php
                foreach ($buildings as $building){
                    echo '<option value="' . $building->id . '">' . $building->name . '</option>';}
                ?>
            </select>
            <button>Добавить</button>
        </div>
    </form>
</div>
<div>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <input style="width: 250px; padding: 3px" type="search" name="search" id="search-input" placeholder="Поиск помещения по названию здания">
        <input type="submit" class="btn">
    </form>
</div>
<div class="block">
    <?php
    foreach ($rooms as $room) {
        echo '<div style="    background-color: #eabfe2;
        border-radius: 25px; padding: 10px 30px 10px 30px; width: 200px;
    height: 140px;margin: 0 0 10px 0" >' ;
        echo '<p>Название: ' . $room->name . '</p>';
//        echo '<p>Вид: ' . $room->id_room_type . '</p>';
        $room_types_name ='';
        foreach ($room_types as $room_type){
            if ($room_types->id == $room->id_room_type){
                $room_types_name = $room_types->name;
                break;
            }
        }
        echo '<p>Вид: ' . $room_types_name . '</p>';
        echo '<p>Площадь: ' . $room->square . '</p>';
        echo '<p>Количество: ' . $room->quantity . '</p>';
//        echo '<p>Здание: ' . $room->id_building . '</p>';
        $building_name = '';
            foreach ($buildings as $building) {
                if ($building->id == $room->id_building) {
                    $room->building_name = $building->name;
                    break; // Once we find the building, we can break the loop
                }
            }
        echo '<p>Здание: ' . $room->building_name . '</p>';

        echo '</div>' ;
    }
    ?>
</div>