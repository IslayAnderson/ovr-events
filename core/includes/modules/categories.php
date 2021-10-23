<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$selects = Event::getSelects();
foreach($selects['categories'] as $key=> $cat):
?>
    <a href="https://event.liamanderson.co.uk/dashboard/category?id=<?=$cat->id;?>">
        <span><?=$cat->cat;?></span>
    </a><br>
<?php
endforeach;
