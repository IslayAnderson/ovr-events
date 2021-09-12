<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'dashboard';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';
?>

    <main class="container">
        <div class="row d-flex justify-content-center flex-nowrap align-items-center flex-column">
            <div class="col col-lg-8 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h1>Staff</h1>
            </div>
            <div class="col col-lg-3 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h3>New users</h3>
            </div>
            <div class="col col-lg-3 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h3>Unapproved Users</h3>
            </div>
            <div class="col col-lg-3 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h3>New Events</h3>
            </div>
            <div class="col col-lg-3 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h3>Categories</h3>
            </div>
            <div class="col col-lg-3 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h3>Games</h3>
            </div>
        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';