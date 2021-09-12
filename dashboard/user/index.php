<?php
//$debug = true;
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/includes.php';
$menu = 'dashboard';
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/head.php';

$id = $_GET['id'];

$user = new User($id);

//var_dump($user);

?>

    <main class="container">
        <div class="row d-flex justify-content-center flex-wrap align-items-center">
            <div class="col-lg-6 col-md-12">
                <h1>User</h1>
                <div class="profile">
                    <span class="full"><span class="pre-info">ID: </span>
                        <span class="info"><?= $user->id ?></span>
                    </span>
                    <span class="full"><span class="pre-info">Username: </span>
                        <span class="info"><?= $user->username ?></span></span>
                    <span class="full"><span class="pre-info">Email: </span>
                        <span class="info"><?= $user->email ?></span></span>
                    <span class="full"><span class="pre-info">Permissions: </span>
                        <span class="info">
                            <select id="permissions" value="<?= $user->permissions ?>">
                                <option value="admin" <?php if($user->permissions == 'admin'){ echo 'selected';} ?>>Admin</option>
                                <option value="staff" <?php if($user->permissions == 'staff'){ echo 'selected';} ?>>Staff</option>
                                <option value="user" <?php if($user->permissions == 'user'){ echo 'selected';} ?>>User</option>
                            </select>
                        </span>
                    </span>
                    <span class="full"><span class="pre-info">Approved: </span>
                        <span class="info">
                            <select id="approved" value="<?= $user->approved ?>">
                                <option value="1" <?php if($user->approved == '1'){ echo 'selected';} ?>>Approved</option>
                                <option value="0" <?php if($user->approved == '0'){ echo 'selected';} ?>>Not Approved</option>
                            </select>
                        </span>
                    </span>
                    <span class="full"><span class="pre-info">Safe: </span>
                        <span class="info">
                            <select id="safe" value="<?= $user->safe ?>">
                                <option value="1" <?php if($user->safe == '1'){ echo 'selected';} ?>>Safe</option>
                                <option value="0" <?php if($user->safe == '0'){ echo 'selected';} ?>>un-safe</option>
                            </select>
                        </span>
                    </span>
                    <span class="full"><span class="pre-info">Date joined: </span>
                        <span class="info"><?= $user->dateJoined?></span></span>
                    <span class="full"><span class="pre-info">Total events:</span>
                        <span class="info"><?= $user->totalEvents ?></span></span>
                    <span class="full"><span class="pre-info">Active Events: </span>
                        <span class="info"><?= $user->activeEvents ?></span></span>
                    <div class="unapproved-events">

                    </div>
                    <a class="btn btn-info admin-update">Update</a>
                </div>
            </div>
        </div>

    </main>

<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/core/includes/components/foot.php';