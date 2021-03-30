<?php 
//chang the title for each page
$title = "Contact";

include './load.php'; 
include  './templates/head.php';
include './templates/header.php';
// RESET SESSION FOR TESTING
// $_SESSION['contact_form_submitted'] = false;
?>

<section class="miniHeader">
        <div class="imageBanner" style="background-image: url(./images/HEADER_05_CONTACT.jpg)">
            <div class="titleWrap"><h2 class="miniHeaderTitle">Contact</h2></div>
        </div>
        <?php if(isset($_SESSION['contact_form_submitted']) && $_SESSION['contact_form_submitted']): ?>

        <?php else: ?>
        <h3 class="miniHeaderTagline">we would love to hear from you</h3> 
        <?php endif; ?>       
</section>




<section class="contactFormWrap">
    <?php if(isset($_SESSION['contact_form_submitted']) && $_SESSION['contact_form_submitted']): ?> 
            <!-- HTML FOR THANK YOU GOES HERE -->
         <div class="contactSubmitted">
             <img src="./images/Thanks.png" alt="">
         <h1 class="submittedTitle">Thanks for Contacting LRG!</h1>
         <p class="submittedText">We will get back to you soon.</p>
         </div>
    <?php else: ?>
        <form  action="./includes/mail/send.php" method="POST" id="mail-form">
        
            <p class="contactFormParagraph">Are you interested in becoming a Referee, hire some of ours to your league or even just would like to know a bit more about who we are and what we do? You’ve come to the right place, then! Fill out the following contact form and ask away, we will get back to you as soon as 1 business day to set up an appointment.</p>
            
            <div class="textInputWrapper">
                <label for="firstname" class="hidden">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Name" required autocomplete="on">
                
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
    <?php endif; ?>

</section>
</div>


<?php include './templates/footer.php';?>
<?php include './templates/foot.php';?>