<?php
    $uri_segments = explode('/', $_SERVER['REQUEST_URI']);
    $path = $uri_segments[count($uri_segments) - 1];

    // Exception for 'admin/login' due to pathing
    if($path === 'admin_login.php') {
        $path = 'admin/admin_login.php';
    }

    $pages = [
        'about.php' => 'About Us',
        'membership.php' => 'Membership',
        'jr-officials.php' => 'Jr. Officials',
        'hire.php' => 'Hire Officials',
        'contact.php' => 'Contact',
        'admin/admin_login.php' => 'Login'
    ];
?>

<footer id="mainFooter">
   
    <div class="footerWrap">
        <div class="footerContainer">
            <nav class="footerNavWrap">
            <ul class="footerNav">
                <?php foreach ($pages as $page_path => $page_title): ?>
                    <li class="navItem<?php echo $page_path === $path ? ' active' : ''; ?><?php echo $page_path == 'admin/admin_login.php' ? ' Login' : ''; ?>">
                        <a href="<?php echo $page_path; ?>">
                            <?php echo $page_title; ?>
                        </a>
                    </li>
                <?php endforeach?>
            </ul>
            </nav>

            <nav class="legalNavWrap">
                <ul class="legalNav">
                    <li class="navItemFoot footerCopywrite">Copyright &#xA9; <?php echo date('Y');?> London Referees Group</li>
                    <li class="navItemFoot"><a href="#">Privacy</a></li>
                    <li class="navItemFoot"><a href="#">Legal</a></li>               
                </ul>
            </nav>
            <div class="backToTop">
            <button id="scrollToTopBtn" aria-labelledby="toTopText" class="toTopBtn">
                <img src="./images/ARROW.svg" alt="back to top arrow">
            </button>
            <span id="toTopText" class="toTopText">BACK TO TOP</span>
            </div>
        </div>
    </div>
</footer>

</div>