<?php
//$debug = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'front';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';

//$recentEvents = Event::getRecent();
$selects = Event::getSelects();
//var_dump($selects['categories']);

?>

    <main class="container">
        <h1>Categories</h1>
        <div class="row d-flex flex-wrap flex-row ">
            <form id="category-search" class="">
                <select name="category_id">
                    <option value=""></option>
                    <?php foreach($selects['categories'] as $cat): ?>
                        <option value="<?=$cat->id?>"><?=$cat->cat?></option>
                    <?php endforeach;?>
                </select>
                <select name="orderby">
                    <option value="dateASC">Date Ascending</option>
                    <option value="dateDESC">Date Descending</option>
                    <option value="titleASC">Title Ascending</option>
                    <option value="titleDESC">Title Descending</option>
                </select>
                <input type="submit" value="Get Events">
            </form>
        </div>
        <div class="row d-flex flex-wrap flex-row events">

            <!--<div class="col-lg-6 p-0 m-0">
                <div class=" p-3 m-3 card">
                    <div class="card-header p-0">
                        <img src="data:image/jpeg;base64,<?=$event->image1?>" alt="placeholder" class="event__image">
                    </div>
                    <div class="card-body px-0 py-3">
                        <span class="event__date">date - time</span>
                        <h3>title</h3>
                        <p>description...</p>
                        <a href="/event/?id=id" class="btn btn-primary">View Event</a>
                    </div>
                </div>
            </div> -->

        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';