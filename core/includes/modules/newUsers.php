<?php
$newUsers = User::newUsers();
foreach($newUsers as $key=> $user):
?>
    <a href="https://event.liamanderson.co.uk/dashboard/user?id=<?=$user->id;?>">
        <span><strong>ID: </strong><?=$user->id;?>,<strong>Username: </strong><?=$user->username;?></span>
    </a><br>
<?php
endforeach;
