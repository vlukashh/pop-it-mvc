<h2>Подсчет общего количества посадочных мест по зданию</h2>
<form class="count__form">
    <select name="quantity">
        <?php
        foreach ($buildings as $building){
            echo '<option value="' . $building->id_building . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Посадочных мест:</h3>
<div class="block">
    <?php
    $quantity = 0;
    if(!empty($rooms)):
        foreach ($rooms as $room) {
            $quantity += $room->quantity;
        }
        echo '<div class="counts" style="border: 2px solid black; height: 25px; font-weight: bold ">'.$quantity.' посадочных мест'.'</div>';
    endif
    ?>
</div>