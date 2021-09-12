<ul>
    <li><a href="https://event.liamanderson.co.uk/" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
    <li><a href="https://event.liamanderson.co.uk/events" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Events</span></a></li>
    <li><a href="https://event.liamanderson.co.uk/categories" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Categories</span></a></li>
    <li><a href="https://event.liamanderson.co.uk/games" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Games</span></a></li>
    <?php
        if(json_decode(User::checkUser())->auth == 'success'):
    ?>
        <li><a href="https://event.liamanderson.co.uk/login" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>login</span></a></li>
    <?php else: ?>
        <li><a href="https://event.liamanderson.co.uk/logout" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>logout</span></a></li>
    <?php endif; ?>
</ul>