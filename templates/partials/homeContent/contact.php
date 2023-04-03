<?php include 'includes/head.php'; ?>
<?php require 'actions/contactAction.php'; ?>


<link rel="stylesheet" href="assets/contact.css">

<div class="contactMere  container">
    <section id="contact" class="contact ">
        <div class="titreContact" id="titreContact">
            <h3 data-aos="flip-left" data-aos-offset="200" data-aos-easing="ease-in-sine">Contact</h3>
        </div>
        <!---
        <?php if(isset($errorMsg)){ 
                    echo '<p class="p">' .$errorMsg.  '</p>' ;
                    } 
                    else if(isset($sucess)){
                        echo '<p class="p-sucess">' .$sucess.'</p>' ;
                    }
                ?>
        ---->

        <div class="contact-box" >
            <div class="contact-list" data-aos="fade-down" data-aos-offset="200" data-aos-easing="ease-in-sine">
                <h3 class="titreContent">MAM Brin de Rêves</h3>
                <div class="list">
                    <h4>  
                        <i class="fa"><img src="assets/images/Icon/accueil.png" alt=""></i>
                        - <span>Adresse:</span> 
                    </h4>
                    <p>5 Rue Aymé kunc 31600 Muret</p>
                </div>
                <div class="list">
                    <h4 >
                        <i class="fa"><img src="assets/images/Icon/call.png" alt=""></i>
                        - <span>Tel:</span>
                    </h4>
                    <div class="tel flex jcsa  aic">
                        <p>Laure:</p>
                        <p>06 02 52 04 47</p>
                    </div>
                    <div class="tel flex jcc  aic">
                        <p>Christidie:</p>
                        <p>06 21 89 57 37</p>
                    </div>
                    <div class="tel flex jcsa  aic">
                        <p>Laurie:</p>
                        <p>06 32 71 07 04</p>
                    </div>
                </div>
                <div class="list">
                    <h4>
                    <i class="fa"><img src="assets/images/Icon/email.png" alt=""></i> 
                        - <span>Email:</span></h4>
                    <p>mam.brindereves@gmail.com</p>
                </div>
            </div>
            <div class="contact-form-wrapper flex  aic jcc" data-aos="fade-up" data-aos-offset="200" data-aos-easing="ease-in-sine">
                <form method="POST">
                    
                    <div class="form-item ">
                        <input type="text" name="nom" placeholder="nom" >
                    </div>
                    <div class="form-item">
                        <input type="text" name="email" placeholder="Email" >
                    </div>
                    <div class="form-item">
                        <input type="text" name="objet" placeholder="Objet de votre message" >
                    </div>                   
                    <div class="form-item">
                        <textarea class="textearea" name="message" placeholder="Votre message" ></textarea>
                    </div>
                    <button type="submit" name="validate" class="btn">Envoyer</button>
                </form>
            </div>
        </div>
    </section>

</div>