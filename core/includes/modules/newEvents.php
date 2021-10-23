<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$newEvents = Event::getRecent();
foreach($newEvents as $key=> $event):
?>
    <a href="https://event.liamanderson.co.uk/event?id=<?=$event->id;?>">
        <span><strong>ID: </strong><?=$event->id;?>,<strong>Title: </strong><?=$event->title;?>,<strong>Date/time: </strong><?=$event->date;?>/<?=$event->time;?></span>
    </a><br>
<?php
endforeach;
