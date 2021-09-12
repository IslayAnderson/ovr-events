<ul>
    <li><a href="https://event.liamanderson.co.uk/" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
    <li><a href="https://event.liamanderson.co.uk/dashboard" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Dashboard</span></a></li>
    <li><a href="https://event.liamanderson.co.uk/events" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Events</span></a></li>
    <?php if(User::permissions()->permissions == 'staff' || User::permissions()->permissions == 'admin'): ?>
        </P><li><a href="https://event.liamanderson.co.uk/dashboard/staff" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Staff</span></a></li>
    <?php endif; ?>
    <?php if(User::permissions()->permissions == 'admin'): ?>
        </P><li><a href="https://event.liamanderson.co.uk/dashboard/admin" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Admin</span></a></li>
    <?php endif; ?>
    <li><a href="https://event.liamanderson.co.uk/dashboard/profile" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Profile</span></a></li>
    <?php
    if(json_decode(User::checkUser())->auth == 'success'):
        ?>
        <li><a href="https://event.liamanderson.co.uk/login" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>login</span></a></li>
    <?php else: ?>
        <li><a href="https://event.liamanderson.co.uk/logout" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>logout</span></a></li>
    <?php endif; ?>
</ul>