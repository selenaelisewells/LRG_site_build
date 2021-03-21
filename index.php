<?php
$who_we_are_section = [
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
    'image' => 'referee.jpg',
    'tagline' => 'INSERT SUPER CATCHY PHRASE',
    'alt' => 'My awesome image'
];
$the_referee_section = [
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
 
 
$title = "London Referees Group";
//chang the title for each page
include  './templates/head.php';?>

<?php include './templates/header.php';?>
<main class="mainContentWrap">
    <section id="heroWrap">
        <h2 class="hidden">Hero Image</h2>
        <div class="heroTextWrap">
            <div class="heroTitle">Ready to play it Safe?</div>
            <div class="heroTagline">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</div>
            <button class="button">Become A Referee</button>
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
                <?php echo $our_services_section['title'];?>
            </h2>
        </div>
        <div class="servicesContent">
            <div class="service">
                
                <div class="serviceTitle">
                    <span>TITLE</span>
                </div>
            </div>
            <div class="service">
                
                <div class="serviceTitle">
                    <span>TITLE</span>
                </div>
            </div>
            <div class="service">
               
                <div class="serviceTitle">
                    <span>TITLE</span>
                </div>
            </div>
        </div>

        <div class="refereeCamp">
            <div class="campContent">
                <!--put this heading in the database and include a span-->
                <h2 class="campTitle"><span><span class="red">Don Koharski</span>Officiating and Development referee camp</span></h2>
                <img src="./images/placeholder.jpg" alt="referee camp photo">
                <p class="text"> 
                    <?php echo $referee_camp_section['body'];?>
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
       <div class="partnersLogos">
        <ul>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
            <li class="partnerLogo"><a href="#">LOGO</a></li>
        </ul>
       </div>
    </section>

</main>
<?php include './templates/footer.php';?>

<?php include './templates/foot.php';?>