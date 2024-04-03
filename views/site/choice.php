<h2>Выбор помещения по зданию</h2>
<form class="count__form">
    <select name="name">
        <?php
        foreach ($buildings as $building){
            echo '<option value="' . $building->id_building . '">' . $building->name . '</option>';}
        ?>
    </select>
    <button class="count__btn">Выбрать</button>
</form>
<h3>Название помещений:</h3>
<div class="form__cho">
    <ul class="dash-list">
        <?php
        if(!empty($rooms)):
            foreach ($rooms as $room) {
                echo '<li>'.$room->name.'</li>';
            }
        endif
        ?>
    </ul>
</div>