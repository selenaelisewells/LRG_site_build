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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
   
    <script src="https://kit.fontawesome.com/0f3adee742.js" crossorigin="anonymous"></script>
    <link rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
    <!--insert any google fonts here-->
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    
</head>

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
                <li class="navItem"><a href="../about.php">About Us</a></li>
                <li class="navItem"><a href="../membership.php">Membership</a></li>
                <li class="navItem"><a href="../jr-officials.php">Jr. Officials</a></li>
                <li class="navItem"><a href="../hire.php">Hire Officials</a></li>
                <li class="navItem"><a href="../contact.php">Contact</a></li>
                <li class="navItem Login"><a href="#">Login</a></li>
            </ul>
        </nav>   
        </div>       
        
    </div>
</header>
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