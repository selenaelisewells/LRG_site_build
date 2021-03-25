<?php 
//chang the title for each page
$title = "Contact";?>

<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<section class="miniHeader">
    <div class="imageBanner">
        <h2 class="miniHeaderTitle">About</h2>
    </div>
    <h3 class="miniHeaderTagline">Join our ever growing roster of Junior Officials</h3>        
</section>
<section class="contactFormWrap">
    <form action="./includes/mail/send.php" method="POST" id="mail-form">
            <label for="firstname">Full Name</label>
        <input type="text" id="name" name="name" placeholder="full name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="email" required>

        <label for="message">Your Message</label>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>

        <!-- <div class="g-recaptcha" data-sitekey="6Lcb7-cZAAAAAOA-4FcHohBjpcKcAvpAzDK68LDi"></div> -->
        <!--Automatically render the reCAPTCHA widget-->

        <button class="submit-wrapper">
            <span class="submit">Send</span>
            
        </button>

    </form>


</section>


<?php include './templates/footer.php';?>
<?php include './templates/foot.php';?>