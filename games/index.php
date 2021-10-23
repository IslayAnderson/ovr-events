<?php
//$debug = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'front';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';

//$recentEvents = Event::getRecent();
$selects = Event::getSelects();
//var_dump($selects['categories']);

switch($_GET['order']){
    case "dateASC":
        $events = Event::getEventByGame('order by date ASC', filter_var($_GET['game'], FILTER_SANITIZE_STRING));
        break;
    case "dateDESC":
        $events = Event::getEventByGame('order by date DESC', filter_var($_GET['game'], FILTER_SANITIZE_STRING));
        break;
    case "titleASC":
        $events = Event::getEventByGame('order by title ASC', filter_var($_GET['game'], FILTER_SANITIZE_STRING));
        break;
    case "titleDESC":
        $events = Event::getEventByGame('order by title DESC', filter_var($_GET['game'], FILTER_SANITIZE_STRING));
        break;
    default:
        $events = Event::getEventByGame('order by date ASC', filter_var($_GET['game'], FILTER_SANITIZE_STRING));
        break;
}

?>

    <main class="container">
        <h1>Games</h1>
        <div class="row d-flex flex-wrap flex-row ">
            <form id="category-search" class="" method="get" action="/games/">
                <select name="game" class="btn btn-light">
                    <?php foreach($selects['games'] as $game): ?>
                        <option <?php if($game->id == $_GET['game']){ echo "selected";} ?> value="<?=$game->id?>"><?=$game->game?></option>
                    <?php endforeach;?>
                </select>
                <select name="order" class="btn btn-light">
                    <option <?php if($_GET['order'] == 'dateASC'){ echo "selected";} ?> value="dateASC">Date Ascending</option>
                    <option <?php if($_GET['order'] == 'dateDESC'){ echo "selected";} ?> value="dateDESC">Date Descending</option>
                    <option <?php if($_GET['order'] == 'titleASC'){ echo "selected";} ?> value="titleASC">Title Ascending</option>
                    <option <?php if($_GET['order'] == 'titleDESC'){ echo "selected";} ?> value="titleDESC">Title Descending</option>
                </select>
                <input type="submit" value="Get Events" class="btn btn-primary">
            </form>
        </div>
        <div class="row d-flex flex-wrap flex-row events">

            <?php
                if($_GET['order']):
                    foreach($events as $event):
                        if($key%2):
                            ?>
                            <div class="col-lg-12 p-0 m-0 animate__load" data-animate="animate__slideInRight">
                                <div class=" p-3 m-3 row d-flex flex-row flex-wrap">
                                    <div class=" px-5 py-3 col-lg-4">
                                        <h3><?=$event->title?></h3>
                                        <span><?=$event->date?> - <?=$event->time?></span>
                                        <p><?=substr($event->description, 0, 256)?>...</p>
                                        <a href="/event/?id=<?=$event->id?>" class="btn btn-primary">View Event</a>
                                    </div>
                                    <div class=" p-0 col-lg-8">
                                        <img src="data:image/jpeg;base64,<?=$event->image1?>" alt="placeholder" class="event__image">
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-lg-12 p-0 m-0 animate__load" data-animate="animate__slideInLeft">
                                <div class=" p-3 m-3 row d-flex flex-row flex-wrap">
                                    <div class=" p-0 col-lg-8">
                                        <img src="data:image/jpeg;base64,<?=$event->image1?>" alt="placeholder" class="event__image">
                                    </div>
                                    <div class=" px-5 py-3 col-lg-4">
                                        <h3><?=$event->title?></h3>
                                        <span><?=$event->date?> - <?=$event->time?></span>
                                        <p><?=substr($event->description, 0, 256)?>...</p>
                                        <a href="/event/?id=<?=$event->id?>" class="btn btn-primary">View Event</a>
                                    </div>
                                </div>
                            </div>
                        <?php

                        endif;
                    endforeach;
                endif;
            ?>

        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';