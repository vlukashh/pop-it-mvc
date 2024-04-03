<h2>Подсчет общего количества посадочных мест по типу помещения</h2>
<form class="count__form">
    <select name="quantity_type">
        <?php
        foreach ($room_types as $room_types){
            echo '<option value="' . $room_types->id_room_type . '">' . $room_types->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Посадочных мест:</h3>
<div class="block" >
    <?php
    $quantity_type = 0;
    if(!empty($rooms)):
        foreach ($rooms as $room) {
            $quantity_type += $room->quantity;
        }
        echo '<div class="counts" style="border: 2px solid black; height: 25px; font-weight: bold ">'.$quantity_type.'</div>';
    endif;
    ?>
</div>