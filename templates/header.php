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
<header id="mainHeader">
    <div class="fullNavWrap">
        <h1 class="hidden">London Referees Group</h1>
        <div class="headerRibbonWrap">
             <ul class="headerRibbon">
                <li class="partnersLogo"><a href="https://www.hockeycanada.ca/en-ca/home"><img src="./images/partners/hockeyCanada-bw.svg" alt="hockey canada logo"></a></li>
                <li class="partnersLogo"><a href="https://www.ohf.on.ca/"><img src="./images/partners/ohf-bw.svg" alt="ohf logo"></a></li>
                <li class="partnersLogo"><a href="https://alliancehockey.com/"><img src="./images/partners/alliance-bw.svg" alt="alliance logo"></a></li>
                <li class="partnersLogo"><a href="https://www.omha.net/"><img src="./images/partners/omha-bw.svg" alt="omha logo"></a></li>
                <li class="partnersLogo"><a href="https://www.owha.on.ca/"><img src="./images/partners/owha-bw.svg" alt="owha logo"></a></li>
                <li class="partnersLogo"><a href="http://www.ohahockey.ca/view/oha"><img src="./images/partners/oha-bw.svg" alt="oha logo"></a></li>
                <li class="partnersLogo"><a href="https://sportabilitybc.ca/"><img src="./images/partners/sportAbility-bw.svg" alt="sport ability logo"></a></li>
            </ul>
        </div>
        <div class="bottomNavWrap">      
        <nav class="navListWrap">
            <div class="mainLogo">
                <a href="index.php">
                    <img src="./images/mainLogo.svg" alt="">
                </a>
            </div>
            <button class="menuButton" data-toggle id="js-navbar-toggle"><img src="./images/BURGER.svg" alt="menu button"></button>
            <ul class="mainNav">
                <?php foreach ($pages as $page_path => $page_title): ?>
                    <li class="navItem<?php echo $page_path === $path ? ' active' : ''; ?><?php echo $page_path == 'admin/admin_login.php' ? ' Login' : ''; ?>">
                        <a href="<?php echo $page_path; ?>">
                            <?php echo $page_title; ?>
                        </a>
                    </li>
                <?php endforeach?>
            </ul>
        </nav>   
        </div>       
        
    </div>
</header>

<div class="overlayNav Toggle">
    <!-- <button class="menuButton" data-toggle id="js-navbar-toggle-close"><img src="./images/BURGER.png" alt="menu button"></button>
    <div class="mainLogo">
        <a href="index.php">
            <img src="./images/mainLogo.svg" alt="">
        </a>
    </div> -->
    <ul class="mobileNav">
        <?php foreach ($pages as $page_path => $page_title): ?>
            <li class="navItem<?php echo $page_path === $path ? ' active' : ''; ?><?php echo $page_path == 'admin/login.php' ? ' Login' : ''; ?>">
                <a href="<?php echo $page_path; ?>">
                    <?php echo $page_title; ?>
                </a>
            </li>
        <?php endforeach?>
    </ul>
 
    <ul class="headerRibbon">
        <li class="partnersLogo"><a href="https://www.hockeycanada.ca/en-ca/home"><img src="./images/partners/hockeyCanada-bw.svg" alt="hockey canada logo"></a></li>
        <li class="partnersLogo"><a href="https://www.ohf.on.ca/"><img src="./images/partners/ohf-bw.svg" alt="ohf logo"></a></li>
        <li class="partnersLogo"><a href="https://alliancehockey.com/"><img src="./images/partners/alliance-bw.svg" alt="alliance logo"></a></li>
        <li class="partnersLogo"><a href="https://www.omha.net/"><img src="./images/partners/omha-bw.svg" alt="omha logo"></a></li>
        <li class="partnersLogo"><a href="https://www.owha.on.ca/"><img src="./images/partners/owha-bw.svg" alt="owha logo"></a></li>
        <li class="partnersLogo"><a href="http://www.ohahockey.ca/view/oha"><img src="./images/partners/oha-bw.svg" alt="oha logo"></a></li>
        <li class="partnersLogo"><a href="https://sportabilitybc.ca/"><img src="./images/partners/sportAbility-bw.svg" alt="sport ability logo"></a></li>
    </ul>
        
</div>
