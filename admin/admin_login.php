<?php
    require_once '../load.php';
    ini_set('display_errors', 1);

    // var_dump(password_hash('admin123', PASSWORD_DEFAULT));

    $ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_SESSION['user_id'])) {
        redirect_to("index.php");
}  

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $result = login($username, $password, $ip);
            $message = $result;
        } else {
            $message = 'Please fill out the required fields.';
        }
    }

    $uri_segments = explode('/', $_SERVER['REQUEST_URI']);
    $path = $uri_segments[count($uri_segments) - 1];
    // Exception for 'admin/login' due to pathing
    if($path === 'admin_login.php') {
        $path = 'admin/admin_login.php';
    }

    $pages = [
        '../about.php' => 'About Us',
        '../membership.php' => 'Membership',
        '../jr-officials.php' => 'Jr. Officials',
        '../hire.php' => 'Hire Officials',
        '../contact.php' => 'Contact',
        '../admin/admin_login.php' => 'Login'
    ];
?>
<?php include  './admin_head.php';?>
<body>
<header id="mainHeader">
    <div class="fullNavWrap">
        <h1 class="hidden">London Referees Group</h1>
        <div class="headerRibbonWrap">
             <ul class="headerRibbon">
                <li class="partnersLogo"><a href="https://www.hockeycanada.ca/en-ca/home"><img src="../images/partners/hockeyCanada-bw.svg" alt="hockey canada logo"></a></li>
                <li class="partnersLogo"><a href="https://www.ohf.on.ca/"><img src="../images/partners/ohf-bw.svg" alt="ohf logo"></a></li>
                <li class="partnersLogo"><a href="https://alliancehockey.com/"><img src="../images/partners/alliance-bw.svg" alt="alliance logo"></a></li>
                <li class="partnersLogo"><a href="https://www.omha.net/"><img src="../images/partners/omha-bw.svg" alt="omha logo"></a></li>
                <li class="partnersLogo"><a href="https://www.owha.on.ca/"><img src="../images/partners/owha-bw.svg" alt="owha logo"></a></li>
                <li class="partnersLogo"><a href="http://www.ohahockey.ca/view/oha"><img src="../images/partners/oha-bw.svg" alt="oha logo"></a></li>
                <li class="partnersLogo"><a href="https://sportabilitybc.ca/"><img src="../images/partners/sportAbility-bw.svg" alt="sport ability logo"></a></li>
            </ul>
        </div>
        <div class="bottomNavWrap">      
        <nav class="navListWrap">
            <div class="mainLogo">
                <a href="../index.php">
                    <img src="../images/mainLogo.svg" alt="">
                </a>
            </div>
            <button class="menuButton" data-toggle id="js-navbar-toggle"><img src="../images/BURGER.svg" alt="menu button"></button>
            <ul class="mainNav">
                <?php foreach ($pages as $page_path => $page_title): ?>
                    <li class="navItem<?php echo $page_path === $path ? ' active' : ''; ?><?php echo $page_path == '../admin/admin_login.php' ? ' Login' : ''; ?>">
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
        <li class="partnersLogo"><a href="https://www.hockeycanada.ca/en-ca/home"><img src="../images/partners/hockeyCanada-bw.svg" alt="hockey canada logo"></a></li>
        <li class="partnersLogo"><a href="https://www.ohf.on.ca/"><img src="../images/partners/ohf-bw.svg" alt="ohf logo"></a></li>
        <li class="partnersLogo"><a href="https://alliancehockey.com/"><img src="../images/partners/alliance-bw.svg" alt="alliance logo"></a></li>
        <li class="partnersLogo"><a href="https://www.omha.net/"><img src="../images/partners/omha-bw.svg" alt="omha logo"></a></li>
        <li class="partnersLogo"><a href="https://www.owha.on.ca/"><img src="../images/partners/owha-bw.svg" alt="owha logo"></a></li>
        <li class="partnersLogo"><a href="http://www.ohahockey.ca/view/oha"><img src="../images/partners/oha-bw.svg" alt="oha logo"></a></li>
        <li class="partnersLogo"><a href="https://sportabilitybc.ca/"><img src="../images/partners/sportAbility-bw.svg" alt="sport ability logo"></a></li>
    </ul>
        
</div>

<div id="app" class="loginWrapper">
    <h2 class="miniHeaderTagline">Fill out the form below to login to LRG</h2>
    <div class="loginErrMessage"><?php echo !empty($message)?$message:'';?></div>
    <form class="loginForm" action="admin_login.php" method="post">
    <label for="username" class="hidden">Username</label>
    <input placeholder="username" class="loginInput" id="username" type="text" name="username" value="">
    
    <label for="password" class="hidden">Password:</label>
    <input placeholder="password" class="loginInput" id="password" type="password" name="password">
    
    <button class="button" type="submit" name="submit" >LOGIN</button>
    </form>
</div>
<footer id="mainFooter">
   
    <div class="footerWrap">
        <div class="footerContainer">
            <nav class="footerNavWrap">
                <ul class="footerNav">
                <li class="navItem"><a href="../about.php">About Us</a></li>
                    <li class="navItem"><a href="../membership.php">Membership</a></li>
                    <li class="navItem"><a href="../jr-officials.php">Jr. Officials</a></li>
                    <li class="navItem"><a href="../hire.php">Hire Officials</a></li>
                    <li class="navItem"><a href="../contact.php">Contact</a></li>
                    <li class="navItem Bottom-Login"><a href="#">Login</a></li>
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
                <img src="../images/ARROW.svg" alt="back to top arrow">
            </button>
            <span id="toTopText" class="toTopText">BACK TO TOP</span>
            </div>
        </div>
    </div>
</footer>
<script type="module" src="../js/main.js"></script>   
    
</body>
</html>