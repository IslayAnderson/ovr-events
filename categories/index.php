<?php
//$debug = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'front';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';

$recentEvents = Event::getRecent();
//var_dump($recentEvents);

?>

    <main class="container">
        <h1>test</h1>
        <div class="row d-flex flex-wrap flex-row">
            <?php foreach($recentEvents as $key=>$event): ?>
            <div class="col-lg-6 p-0 m-0">
                <div class=" p-3 m-3 card">
                    <div class="card-header p-0">
                        <img src="data:image/jpeg;base64,<?=$event->image1?>" alt="placeholder" class="event__image">
                    </div>
                    <div class="card-body px-0 py-3">
                        <span class="event__date"><?=$event->date?> - <?=$event->time?></span>
                        <h3><?=$event->title?></h3>
                        <p><?=substr($event->description, 0, 256)?>...</p>
                        <a href="/event/?id=<?=$event->id?>" class="btn btn-primary">View Event</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';