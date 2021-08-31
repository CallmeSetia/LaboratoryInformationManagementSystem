<ul class="list-unstyled menu-categories" id="accordionExample">
    <li class="menu">
        <div class="dropdown-toggle">
            <span>Hallo, <?php echo (string) $_SESSION['nama_akun'];  ?> </span>
        </div>
    </li>

    <li class="menu">
        <a href="index.php?page=packaging" aria-expanded="false" onClick="window.location.reload();" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-cw"><polyline points="23 4 23 10 17 10"></polyline><polyline points="1 20 1 14 7 14"></polyline><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path></svg>
                <span>Packaging</span>
            </div>
        </a>
    </li>
    <li class="menu">
        <a href="index.php?page=additive" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                <span>Additive</span>
            </div>
        </a>
    </li>

    <li class="menu">
        <a href="../logout.php" aria-expanded="false" class="dropdown-toggle">
            <div class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
                <span> Logout</span>
            </div>
        </a>
    </li>
</ul>