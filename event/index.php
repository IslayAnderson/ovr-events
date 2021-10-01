<?php
//$debug = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'front';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';

$id=$_GET['id'];
$event = new Event($id);
//var_dump($event);



?>

    <main class="container">
        <h1><?=$event->title?></h1>
        <div class="row d-flex flex-wrap flex-row">
            <img src="data:image/jpeg;base64,<?=$event->image1?>">
            <p><?=$event->description?></p>
            <p><?=$event->categories?></p>
            <p><?=$event->game?></p>
            <p><?=$event->date?></p>
            <p><?=$event->time?></p>
            <p><?=$event->approved?></p>

        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';