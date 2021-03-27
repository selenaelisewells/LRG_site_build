<?php 
//chang the title for each page
$title = "Contact";?>

<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<section class="miniHeader">
        <div class="imageBanner" style="background-image: url(./images/HEADER_01_ABOUT.jpg)">
            <div class="titleWrap"><h2 class="miniHeaderTitle">Contact</h2></div>
        </div>
        <h3 class="miniHeaderTagline">An orangization of more than 200 hockey referees proudly serving london and surrounding areas</h3>        
</section>




<section class="contactFormWrap">

    <form  action="./includes/mail/send.php" method="POST" id="mail-form">
    
        <p class="contactFormParagraph">Are you interested in becoming a Referee, hire some of ours to your league or even just would like to know a bit more about who we are and what we do? You’ve come to the right place, then! Fill out the following contact form and ask away, we will get back to you as soon as 1 business day to set up an appointment.</p>
        
        <div class="textInputWrapper">
            <label for="firstname" class="hidden">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Name" required>
            
            <label for="email" class="hidden">Email</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <label for="message" class="hidden">Your Message</label>
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Message..."></textarea>

        <!-- <div class="g-recaptcha" data-sitekey="6Lcb7-cZAAAAAOA-4FcHohBjpcKcAvpAzDK68LDi"></div> -->
        <!--Automatically render the reCAPTCHA widget-->

        <button class="submit-wrapper button">
            <span class="submit">Send</span>
            
        </button>

    </form>  


</section>
</div>


<?php include './templates/footer.php';?>
<?php include './templates/foot.php';?>