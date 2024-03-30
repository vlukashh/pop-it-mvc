<h2>Подсчет общего количества посадочных мест по зданию</h2>
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
    <?php
    $chair = 0;
    if(!empty($rooms)):
        foreach ($rooms as $room) {
            $chair += $room->quantity;
        }
        echo '<div class="count_square">' . $chair . ' мест' . '</div>';
    endif;
    ?>
</div>