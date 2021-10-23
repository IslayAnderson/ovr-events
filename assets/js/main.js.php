<?php
?>
//lazy load images
var replaceSrc = function () {
    x = document.getElementsByClassName('lazy-load-me');
    for (i = 0; i < x.length; i++){
        if (x[i].getBoundingClientRect().top < window.innerHeight) {
            img = x[i]
            if(window.innerWidth < 850 && x[i].getAttribute('mobi-src') != null){
                lazySRC = x[i].getAttribute('mobi-src');
            }else{
                lazySRC = x[i].getAttribute('desk-src');
            }
            if(x[i].tagName == 'VIDEO'){
                x[i].canPlayType("video/mp4");
                x[i].src = lazySRC;
                x[i].load();
                x[i].onload = x[i].play();
                x[i].classList.remove("lazy-load-me");
            }else{
                x[i].src = lazySRC;
                x[i].classList.remove("lazy-load-me");
            }
        }
    }
};
//run animations on entering the viewport
function replaceAnim(firstload) {
    const x = document.querySelectorAll('.animate__load');
    x.forEach(function(item, index){
        console.log("index: ",index," ",item.getBoundingClientRect().top)
        if (item.getBoundingClientRect().top < window.innerHeight) {
            item.classList.remove("animate__load");
            animation = item.dataset["animate"];
            if(firstload){
                item.classList.add("animate__animated", animation, "animate__delay-1s");
            }else{
                item.classList.add("animate__animated", animation);
            }
        }
    })
};
$( document ).ready(function() {
    //fade in body on load
    setTimeout(function (){$("body").fadeIn();$("html").css("background-color","#fff");}, 500);
    //variables on load
    replaceSrc();
    replaceAnim(true);

    //event listeners
    if(document.querySelector(".profile .admin-update")){
        document.querySelector(".profile .admin-update").addEventListener('click', adminProfileUpdate);
    }
    document.querySelector("main.container").addEventListener('scroll', function(event){
        replaceSrc();
        }, false);
    document.querySelector("main.container").addEventListener('scroll', function(event){
        replaceAnim();
    }, false);

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