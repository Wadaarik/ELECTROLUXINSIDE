<?php
$page = 'LOGIN';
include_once './back/head.php';
?>
<div class="main-content">
    <div class="container">
        <div class="electrolux__logo">
            <img src="./assets/img/home_electrolux.png" alt="Accueil Electrolux Illustration">
        </div>
        <div class="form">
            <section class="form_container">
                <h2>Je me connecte</h2>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p class='alert'>Merci de remplir tous les champs.</p>";
                    }
                    else if ($_GET["error"] == "invalidemail"){
                        echo "<p class='alert'>Merci d'utiliser un email valide.</p>";
                    }
                    else if ($_GET["error"] == "wronglogin"){
                        echo "<p class='alert'>Mauvais email ou mot de passe.</p>";
                    }
                    else if ($_GET["error"] == "connection"){
                        echo "<p class='alert'>Connectez-vous pour assister au live.</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p class='alert'>Quelque chose s'est mal passé, merci de réessayer dans un instant.</p>";
                    }
                }
                ?>
                <form action="./back/login.inc.php" method="post">
                    <div class="form-row">
                        <label for="email_usr">Email</label>
                        <div class="input">
                            <input type="email" name="email_usr" id="email_usr" placeholder="monemail@mail.com" required>&nbsp;
                            <div class="icons"><img src="./assets/img/email.png" alt="email icon Electrolux Inside"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="password_usr">Mot de passe</label>
                        <div class="input">
                            <input type="password" name="password_usr" id="password_usr" placeholder="••••••••" required>&nbsp;
                            <div style="cursor: pointer" id="visible_pwd" class="icons"><img src="./assets/img/lock.png" alt="visibility icon Electrolux Inside"></div>
                         </div>
                    </div>
                    <button type="submit" id="submit" name="submit">Me connecter&nbsp;<i
                                class='bx bx-right-arrow-alt'></i></button>
                </form>
            </section>
        </div>
    </div>
</div>

<script src="./public/index.js" type="text/javascript"></script>

<?php
include_once './back/footer.php';
?>
