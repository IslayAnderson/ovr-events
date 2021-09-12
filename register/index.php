<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';
?>

    <main class="container">
        <div class="row d-flex justify-content-center flex-nowrap align-items-center flex-column">
            <div class="col col-lg-8 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                <h1>register</h1>
                <div class="col col-lg-8 col-md-12 d-flex justify-content-center flex-nowrap align-items-center flex-column">
                    <form action="https://event.liamanderson.co.uk/core/login/register.php" method="POST" class="d-flex justify-content-center flex-nowrap align-items-center flex-column">
                        <label for="email">Email: &nbsp;</label><input name="email" id="email" type="email" />
                        <label for="username">Username: &nbsp;</label><input name="username" id="username" type="text" />
                        <label for="password">Password: &nbsp;</label><input name="password" id="password" type="password" />
                        <input name="submit" id="submit" type="submit" value="Submit" />
                    </form>
                </div>
            </div>
        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';