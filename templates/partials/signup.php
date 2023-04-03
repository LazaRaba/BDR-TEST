    <?php require 'actions/signupAction.php'; ?>
    <?php include 'includes/head.php'; ?>
    <?php include 'includes/navbar.php'; ?>
    <?php require 'actions/database.php'; ?>
    <link rel="stylesheet" href="assets/signup.css">


<div class="grand-parent flex aic container">
    <!-- Echo errorMsg si users n'a pas rempli tous les champs -->
    <?php if(isset($errorMsg)){ 
        echo '<p class="p">' .$errorMsg.  '</p>' ;
        } 
        else if(isset($sucess)){
            echo '<p class="p-success">' .$sucess.'</p>' ;
        }
        ?>
    <form class="form-parent" action="" method="POST">
        <div class="form-container">
            <div class="form" id="sign-in-form">
                <h1 class="signTitle">Inscription</h1>
                <div class="fields">
                    <input type="text" name="nom" placeholder="Votre nom*" >
                    <input type="text" name="prenom" placeholder="Prenom de votre enfant*" >
                    <input type="text" name="valeur_code" placeholder="Votre code d'inscription*" >    
                    <input type="text" name="email"  placeholder="Votre  email*" >
                    <input type="password" name="password" placeholder="Mot de passe*">
                </div>
                <div class="submit-container">
                    <button type="submit" name="validate" class="btn">s'inscrire</button>
                    <p class="link"><a href="login.php ">Avez vous un compte? Connectez-vous</a></p> 
                </div>
            </div>
        </div> 
    </form>
