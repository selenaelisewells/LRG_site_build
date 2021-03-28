<?php
$who_we_are_section = [
    'id' => 25,
    'title' => 'who we are',
    'body' => '  They are often described as the third team on the ice.The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
    'image' => 'referee.jpg',
    'tagline' => 'Officials play a vital role in the game.',
    'alt' => 'My awesome image'
];
$the_referee_section = [
    'id' => 25,
    'title' => 'the referee',
    'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
    minim veniam, quis nostrud consequat. Duis autem dolor in hendrerit velit esse
    molestie consequat, praesent luptatum ut laoreet dolore magna aliquam erat
    volutpatzzril delenit augue duis dolore te feugait nulla facilisi.
    Ut wisi enim aderat volutpat. Ut wisi enim consectetuer adipiscing elit, ad minim
    veniam, quis tincidunt ut nostrud consequat.
    To know more about us and what we do, you can visit our About section',
    'image' => 'placeholder.jpg',
    'tagline' => 'INSERT SUPER CATCHY PHRASE',
    'alt' => 'My awesome image'
];
$our_services_section = [
    'id' => 25,
    'title' => 'TITLE PLACEHOLDER',
    'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
    euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad
    minim veniam, quis nostrud consequat. Duis autem dolor in hendrerit velit esse
    molestie consequat, praesent luptatum ut laoreet dolore magna aliquam erat
    volutpatzzril delenit augue duis dolore te feugait nulla facilisi.
    Ut wisi enim aderat volutpat. Ut wisi enim consectetuer adipiscing elit, ad minim
    veniam, quis tincidunt ut nostrud consequat.
    To know more about us and what we do, you can visit our About section',
    'image' => 'placeholder.jpg',
    'tagline' => 'INSERT SUPER CATCHY PHRASE',
    'alt' => 'My awesome image'
];
$referee_camp_section = [
    'id' => 25,
    'title' => 'TITLE PLACEHOLDER',
    'body' => 'Officials play a vital role in the game, they are often described as the third team on the ice. The basic role of the on-ice officials can be broken down into two simple words – safe and fair. For a referee to view and officiate the game with these two words in mind, they should be able to call a game that is acceptable to all of the participants.',
    'image' => 'placeholder.jpg',
    'tagline' => 'INSERT SUPER CATCHY PHRASE',
    'alt' => 'My awesome image'
];
 
 
$title = "London Referees Group";
//chang the title for each page
include  './templates/head.php';?>

<?php include './templates/header.php';?>
<main class="mainContentWrap">
    <section id="heroWrap">
        <video src="./images/HERO_3.mp4" loop autoplay playsinline muted></video>
        <div class="heroContent">
            <h2 class="hidden">Hero Image</h2>
            <div class="heroTextWrap">
                <div class="heroTitle">Play it safe with LRG</div>
                <div class="heroTagline">Looking for an organization to referee your hockey league?</div>
                <div class="button"><a href="./hire.php">Hire Officials</a></div>
            </div>
        </div>
    </section>


        <section id="whoWeAre" class="whiteBanner bannerWrapper">
            <div class="banner">
                <h2 class="bannerTitle">
                    <?php echo $who_we_are_section['title']; ?>
                </h2>
            </div>
            <div class="sectionContent">
                <div class="sectionText">
                    <h3 class="tagline"><?php echo $who_we_are_section['tagline']; ?></h3>
                    <p class="text"><?php echo $who_we_are_section['body']; ?></p>
                </div>
                
                <div class="Image">
                    <img src="./images/<?php echo $who_we_are_section['image']; ?>" 
                    alt="<?php echo $who_we_are_section['alt'] ?? $who_we_are_section['title']; ?>">
                </div>
                <button class="button">Learn More</button>
                
            </div>
        </section>
        
        <section id="theReferee" class="blackBanner bannerWrapper">
            <div class="banner blackBanner">
                <h2 class="bannerTitle"> 
                    <?php echo $the_referee_section['title']; ?>
                </h2>
            </div>
            <div class="sectionContent">
            <div class="Image">
                <img src="./images/<?php echo $the_referee_section['image']; ?>" 
                    alt="<?php echo $the_referee_section['alt'] ?? $the_referee_section['title']; ?>">
            </div>
       
            <div class="sectionText">
                <h3 class="tagline"><?php echo $who_we_are_section['tagline']; ?></h3>
                <p class="text">
                    <?php echo $the_referee_section['body'];?>
                </p>
            </div>
            <button class="button">Learn More</button>  
         
        </div>
    </section>

    <section id="ourServices" class="whiteBanner">
        <div class="banner">
            <h2 class="bannerTitle">
                Our Values
            </h2>
        </div>
        <div class="servicesContent">
            <div class="service">
                
                <div class="serviceTitle">
                    <span>Respect</span>
                </div>
            </div>
            <div class="service">
                
                <div class="serviceTitle">
                    <span>Integrity</span>
                </div>
            </div>
            <div class="service">
               
                <div class="serviceTitle">
                    <span>teamwork</span>
                </div>
            </div>
        </div>

        <div class="refereeCamp">
            <div class="campContent">
                <!--put this heading in the database and include a span-->
                <h2 class="campTitle"><span><span class="red">Don Koharski</span>Officiating and Development referee camp</span></h2>
                <img src="./images/DON.jpg" alt="referee camp photo">
                <p class="text"> 
                Whether your goal is to learn the basics to get you started, move up to the Pee Wee level, JR. hockey or go all the way up to the professional ranks, our camps are designed to provide you that exposure and the necessary tools to improve your officiating skills.

                </p>
                <button class="button">Sign Up Today</button> 
            </div>
        </div>
    </section>

    <section class="ctaBanner">
        <h2>Are you looking to sign your kids up to become a referee?</h2>
        <button class="button">Learn More</button> 
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