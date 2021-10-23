<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$selects = Event::getSelects();
foreach($selects['games'] as $key=> $game):
    ?>
    <a href="https://event.liamanderson.co.uk/dashboard/game?id=<?=$game->id;?>">
        <span><?=$game->game;?></span>
    </a><br>
<?php
endforeach;
