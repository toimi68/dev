<?php require_once ('include/header.inc.php' );
require_once("include/init.inc.php");

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // on vérifie si on a bien cliqué sur le submit ( utile si on a pulisuer submit => leur donner un name pour les identifier et ne pas les activer tous en même temps)
    if (isset($_POST['submit'])) {
            $destinataire = "ba.simeon@lepoles.com";
            // on le link au destinataire (celui qui va recevoir le mail)
            $sujet = $_POST['objet'];
            // on le link a l' objet
            $message = $_POST['message'];
            // on le link au text du message

            //  a partir de ci dessous, on va linker tout ce qui va concerner l' expéditeur

            $entetes = "MIME-Version 1.0 \n";
            // protocole d' envoi de mail (1991)************************************LIGNE OBLIGATOIRE**************************************************
            $entetes .= "FROM: $_POST[email]\n";
            // entete expéditeur => le FROM est onligatoire, pas autre chose
            $entetes .= "Reply-to: ba.simeon@lepoles.com \n";
            // entete d' adresse de retour
            $entetes .= "X-priority: 1\n";
            // priorité urgente => a ecrire obligatoirement, comme le MIME
            $entetes .= "Content-type: text/html; charset=utf-8\n";
            // type de contenu html => me permet d' ecrire du html dans la textarea, sera traduit par la navigateur

            mail($destinataire,$sujet,$message,$entetes);
            // fonction prédéfinie permettant l' envoi d' un mail. Toujours 4 arguments(parametrés ci dessus): destinataire, sujet, mesdsage et expéditeur. Cet ordre est crucial, sinon ne fonctionne pas
        }
    ?>

<hr class="style1">
<div class="card mt-4 bg-dark rounded-0">

    <h5 class="info-color white-text text-center py-4">
        <strong>Contact</strong>
        <h5 class="font-weight-bold text-uppercase mb-4"></h5>
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="#!">

            <div class="form-row">
                <div class="col">
                    <!-- First name -->
                    <div class="md-form">
                        <input type="text" id="materialRegisterFormFirstName" class="form-control rounded-pill">
                        <label for="materialRegisterFormFirstName">First name</label>
                    </div>
                </div>
                <div class="col">
                    <!-- Last name -->
                    <div class="md-form">
                        <input type="email" id="materialRegisterFormLastName" class="form-control rounded-pill">
                        <label for="materialRegisterFormLastName">Last name</label>
                    </div>
                </div>
            </div>

            <!-- E-mail -->
            <div class="md-form mt-0">
                <input type="email" id="materialRegisterFormEmail" class="form-control rounded-pill">
                <label for="materialRegisterFormEmail">E-mail</label>
            </div>

            <!-- Password -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPassword" class="form-control rounded-pill" aria-describedby="materialRegisterFormPasswordHelpBlock">
                <label for="materialRegisterFormPassword" placeholder="Vôtre mot de pass">Password</label>
                <small id="materialRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                   
                </small>
            </div>

            <!-- Phone number -->
            <div class="md-form">
                <input type="password" id="materialRegisterFormPhone" class="form-control rounded-pill" aria-describedby="materialRegisterFormPhoneHelpBlock">
                <label for="materialRegisterFormPhone">Numero de telphone</label>
                <small id="materialRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
                    
                </small>
            </div>
            <!-- Message -->
            <div class="form-group shadow-textarea">
                            <label for="exampleFormControlTextarea6">Shadow and placeholder</label>
                            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="Write something here..."></textarea>
            </div>
            <!-- Newsletter -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="materialRegisterFormNewsletter">
                <label class="form-check-label" for="materialRegisterFormNewsletter rounded-pill">Souscrire à ma newsletter</label>
            </div>
            
            <!-- Sign up button -->
            <button class="btn btn-outline-light btn-rounded btn-block my-4 waves-effect z-depth-0 rounded-pill" type="submit">Sign in</button>

            <hr class="style1">


        </form>
        <!-- Form -->

    </div>

</div>
<!-- Material form register -->
<hr class="style1">



<?php require_once 'include/footer.inc.php' ?>