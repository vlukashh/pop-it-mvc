<h1>Список бобиков</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->title . '</li>';
    }
    ?>
</ol>
