<?php
?>
$( document ).ready(function() {
    //event listeners
    document.querySelector(".profile .admin-update").addEventListener('click', adminProfileUpdate);

    //resolution change

});

//profile updating functions
function adminProfileUpdate(){
    let perms = document.querySelector("#permissions");
    let approved = document.querySelector("#approved");
    let safe = document.querySelector("#safe");
    let data = {
        'perms': perms,
        'approved': approved,
        'safe': safe
    };

    $.ajax({
        url: "https://event.liamanderson.co.uk/core/ajax/postData.php",
        action: 'adminProfileUpdate',
        data: data
    }).success(function() {
        notification('', '', 'message');
    });

}

//misc functions
function notification(type, state, message){

}