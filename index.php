<?php

 
 
$title = "London Referees Group";
//chang the title for each page
include  './templates/head.php';?>

<?php include './templates/header.php';?>
<main class="mainContentWrap">
    <section id="heroWrap">
        <video  loop autoplay playsinline muted>
       
            <source src="./images/hero.webm" 
                    type="video/webm">
            <source src="./images/hero.mp4" 
                    type="video/mp4">
            <source src="./images/hero.ogg" 
                    type="video/ogg">    
        
        </video>
        <div class="heroContent">
            <h2 class="hidden">Hero Image</h2>
            <div class="heroTextWrap">
                <div class="heroTitle">Play it safe with LRG</div>
                <div class="heroTagline">Looking for an organization to referee your hockey league?</div>
               <a class="button" href="./hire.php">Hire Officials</a>
            </div>
        </div>
    </section>

    <sections-container></sections-container>

    <section id="ourServices" class="whiteBanner">
        <div class="banner">
            <h2 class="bannerTitle">
                Our Values
            </h2>
        </div>
        <div class="servicesContent">
            <div class="service">
            <img src="./images/TEAM.svg" alt="teamwork">
                
                <div class="serviceTitle">
                    <span>Respect</span>
                </div>
            </div>
            <div class="service">
            <img src="./images/SHAKEHAND.svg" alt="teamwork">
                
                <div class="serviceTitle">

                    <span>Integrity</span>
                </div>
            </div>
            <div class="service">
            <img src="./images/SCALES.svg" alt="teamwork">
               
                <div class="serviceTitle">
                    <span>teamwork</span>
                </div>
            </div>
        </div>

        <div class="refereeCamp">
            <div class="campContent blackBanner">
                <!--put this heading in the database and include a span-->
                <h2 class="campTitle"><span><span class="red">Don Koharski</span>Officiating and Development referee camp</span></h2>
                <img src="./images/DON.jpg" alt="referee camp photo">
                <p class="text"> 
                Whether your goal is to learn the basics to get you started, move up to the Pee Wee level, JR. hockey or go all the way up to the professional ranks, our camps are designed to provide you that exposure and the necessary tools to improve your officiating skills.

                </p>
                <div><a class="button" href="https://dkrefcamps.com/">Sign up today</a></div> 
            </div>
        </div>
    </section>

    <section class="ctaBanner">
        <h2>Are your kids interested in becoming a referee?</h2>
        <a class="button" href="./jr-officials.php">Learn More</a>
    </section>

    <section id="partners">
        <div class="banner">
            <h2 class="bannerTitle">Partners</h2>
        </div>
       <div class="partnersLogosWrapper">
            <ul  class="partnersLogos">
                <li class="partnersLogo"><a href="https://www.hockeycanada.ca/en-ca/home"><img src="./images/partners/hockeyCanada.png" alt="hockey canada logo"></a></li>
                <li class="partnersLogo"><a href="https://www.ohf.on.ca/"><img src="./images/partners/OHF.png" alt="ohf logo"></a></li>
                <li class="partnersLogo"><a href="https://alliancehockey.com/"><img src="./images/partners/alliance.png" alt="alliance logo"></a></li>
                <li class="partnersLogo"><a href="https://www.omha.net/"><img src="./images/partners/OMHA.png" alt="omha logo"></a></li>
                <li class="partnersLogo"><a href="https://www.owha.on.ca/"><img src="./images/partners/OWHA.png" alt="owha logo"></a></li>
                <li class="partnersLogo"><a href="http://www.ohahockey.ca/view/oha"><img src="./images/partners/OHA.png" alt="oha logo"></a></li>
                <li class="partnersLogo"><a href="https://sportabilitybc.ca/"><img src="./images/partners/sportAbility.png" alt="sport ability logo"></a></li>
            </ul>
       </div>
    </section>

</main>
<?php include './templates/footer.php';?>

<?php include './templates/foot.php';?>