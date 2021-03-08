<?php 
$cert_clinics_section = [
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
$overview_section = [
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
//chang the title for each page
$title = "Membership";?>

<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<div class="mainContentWrap">
<h1 class="hidden">Membership</h1>

<section class="miniHeader">
    <div class="imageBanner">
        <h2 class="miniHeaderTitle">Membership</h2>
    </div>
    <h3 class="miniHeaderTagline">INSERT CATCHY TITLE ABOUT BECOMING A MEMBER</h3>        
</section>

<section id="overview">
    <div class="banner">
        <h2 class="bannerTitle">
            <?php echo $overview_section['title']; ?>
        </h2>
    </div>
    <div class="sectionContent">
        <div class="sectionText">
            <h3 class="tagline"><?php echo $overview_section['tagline']; ?></h3>
            <p class="text"><?php echo $overview_section['body']; ?></p>
        </div>
        
            <div class="Image">
                <img src="./images/<?php echo $overview_section['image']; ?>" 
                    alt="<?php echo $overview_section['alt'] ?? $overview_section['title']; ?>">
            </div>
            <button class="button">Learn More</button>
        
    </div>
</section>

<section id="structure">
    <div class="banner">
        <h2 class="bannerTitle">
            Stucture
        </h2>
    </div>
    <div class="structureInfographic"></div>
</section>

<section id="cert-clinics">
    <div class="banner">
        <h2 class="bannerTitle">
            <?php echo $cert_clinics_section['title']; ?>
        </h2>
    </div>
    <div class="sectionContent">
        <div class="sectionText">
            <h3 class="tagline"><?php echo $cert_clinics_section['tagline']; ?></h3>
            <p class="text"><?php echo $cert_clinics_section['body']; ?></p>
        </div>
        
            <div class="Image">
                <img src="./images/<?php echo $cert_clinics_section['image']; ?>" 
                    alt="<?php echo $cert_clinics_section['alt'] ?? $cert_clinics_section['title']; ?>">
            </div>
            <button class="button">Learn More</button>
        
    </div>
</section>

<section id="schedule">
    <div class="banner">
        <h2 class="bannerTitle">
            <?php echo $overview_section['title']; ?>
        </h2>
    </div>
    <div class="sectionContent">
        <div class="sectionText">
            <h3 class="tagline"><?php echo $overview_section['tagline']; ?></h3>
            <p class="text"><?php echo $overview_section['body']; ?></p>
        </div>
        
            <div class="Image">
                <img src="./images/<?php echo $overview_section['image']; ?>" 
                    alt="<?php echo $overview_section['alt'] ?? $overview_section['title']; ?>">
            </div>
            <button class="button">Learn More</button>
        
    </div>
</section>


<section id="skill-building">
    <div class="banner">
        <h2 class="bannerTitle">
            <?php echo $overview_section['title']; ?>
        </h2>
    </div>
    <div class="sectionContent">
        <div class="sectionText">
            <h3 class="tagline"><?php echo $overview_section['tagline']; ?></h3>
            <p class="text"><?php echo $overview_section['body']; ?></p>
        </div>
        
            <div class="Image">
                <img src="./images/<?php echo $overview_section['image']; ?>" 
                    alt="<?php echo $overview_section['alt'] ?? $overview_section['title']; ?>">
            </div>
            <button class="button">Learn More</button>
        
    </div>
</section>

</div>


<?php include './templates/footer.php';?>

<?php include './templates/foot.php';?>