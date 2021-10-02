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
        $events = Event::getEventByCat('order by date ASC', filter_var($_GET['cat'], FILTER_SANITIZE_STRING));
        break;
    case "dateDESC":
        $events = Event::getEventByCat('order by date DESC', filter_var($_GET['cat'], FILTER_SANITIZE_STRING));
        break;
    case "titleASC":
        $events = Event::getEventByCat('order by title ASC', filter_var($_GET['cat'], FILTER_SANITIZE_STRING));
        break;
    case "titleDESC":
        $events = Event::getEventByCat('order by title DESC', filter_var($_GET['cat'], FILTER_SANITIZE_STRING));
        break;
    default:
        $events = Event::getEventByCat('order by date ASC', filter_var($_GET['cat'], FILTER_SANITIZE_STRING));
        break;
}

?>

    <main class="container">
        <h1>Categories</h1>
        <div class="row d-flex flex-wrap flex-row ">
            <form id="category-search" class="" method="get" action="/categories/">
                <select name="cat">
                    <?php foreach($selects['categories'] as $cat): ?>
                        <option <?php if($cat->id == $_GET['cat']){ echo "selected";} ?> value="<?=$cat->id?>"><?=$cat->cat?></option>
                    <?php endforeach;?>
                </select>
                <select name="order">
                    <option <?php if($_GET['order'] == 'dateASC'){ echo "selected";} ?> value="dateASC">Date Ascending</option>
                    <option <?php if($_GET['order'] == 'dateDESC'){ echo "selected";} ?> value="dateDESC">Date Descending</option>
                    <option <?php if($_GET['order'] == 'titleASC'){ echo "selected";} ?> value="titleASC">Title Ascending</option>
                    <option <?php if($_GET['order'] == 'titleDESC'){ echo "selected";} ?> value="titleDESC">Title Descending</option>
                </select>
                <input type="submit" value="Get Events">
            </form>
        </div>
        <div class="row d-flex flex-wrap flex-row events">

            <?php
                if($_GET['order']):
                    foreach($events as $event):
            ?>
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
            <?php
                    endforeach;
                endif;
            ?>

        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';