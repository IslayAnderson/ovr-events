<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'dashboard';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';
?>

    <main class="container">
        <div class="row d-flex justify-content-center flex-wrap align-items-center">
            <div class="col-12">
                <h1>Admin</h1>
            </div>
            <div class="col col-lg-8 col-md-12 px-1 pb-1">
                <div class="card px-1">
                    <h3>New Events</h3>
                    <div id="newEvents">
                        <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/modules/newEvents.php';?>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-12 px-1 pb-1">
                <div class="card px-1">
                    <h3>New users</h3>
                    <div id="newUsers">
                        <?php include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/modules/newUsers.php';?>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-12 px-1 pb-1">
                <div class="card px-1">
                    <h3>Categories</h3>
                </div>
            </div>
            <div class="col col-lg-3 col-md-6 col-sm-12 px-1 pb-1">
                <div class="card px-1">
                    <h3>Games</h3>
                </div>
            </div>
        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';