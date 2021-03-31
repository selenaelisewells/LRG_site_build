<?php 

$title = "Membership";?>

<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<div class="mainContentWrap">
<h1 class="hidden">Membership</h1>

<section class="miniHeader">
        <div class="imageBanner" style="background-image: url(./images/HEADER_02_MEMBERSHIP.jpg)">
            <div class="titleWrap"><h2 class="miniHeaderTitle">Membership</h2></div>
        </div>
        <h3 class="miniHeaderTagline">perseverance, respect & teamwork </h3>        
</section>

<overview-component></overview-component>
<section class="ctaBanner">
        <h2>Interested in becoming a member of LRG? </h2>
        <div class="button"><a href="https://www.surveymonkey.com/r/3SZVJ7S">apply today</a></div> 
</section>

<section id="structure">
    <div class="banner">
        <h2 class="bannerTitle">
            Stucture
        </h2>
    </div>
    <employee-container></employee-container>

</section>


<sections-container></sections-container>



</div>


<?php include './templates/footer.php';?>

<?php include './templates/foot.php';?>