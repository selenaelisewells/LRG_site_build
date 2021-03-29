<?php 

//chang the title for each page
$title = "About Us";?>
<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<div class="mainContentWrap">
<h1 class="hidden">About Us</h1>
    <section class="miniHeader">
        <div class="imageBanner" style="background-image: url(./images/HEADER_01_ABOUT.jpg)">
            <div class="titleWrap"><h2 class="miniHeaderTitle">About Us</h2></div>
        </div>
        <h3 class="miniHeaderTagline">An orangization of more than 250 hockey referees proudly serving london and surrounding areas</h3>        
    </section>

    <overview-component></overview-component>


    <section id="history">
        <div class="banner">
            <h2 class="bannerTitle">
               History
            </h2>
        </div>
        <div class="historyInfographic"></div>
    </section>


</div>



<?php include './templates/footer.php';?>
<?php include './templates/foot.php';?>