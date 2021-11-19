<?php
$page = 'SIGNIN';
include_once './back/head.php';
?>
<div class="main-content">
    <div class="container">
        <div class="electrolux__logo">
            <img src="./assets/img/home_electrolux.png" alt="Accueil Electrolux Illustration">
        </div>
        <div class="form register-form">
            <section class="form_container register-section">
                <h2>Je m'enregistre</h2><br>
                <small>Nous vous avons transmis un mot de passe par message, merci d'utiliser ce nouveau mot de passe pour vous connecter.</small>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "emptyinput"){
                        echo "<p class='alert'>Merci de remplir tous les champs.</p>";
                    }
                    else if ($_GET["error"] == "invalidemail"){
                        echo "<p class='alert'>Merci d'utiliser un email valide.</p>";
                    }
                    else if ($_GET["error"] == "wronglogin"){
                        echo "<p class='alert'>Mauvais mot de passe.</p>";
                    }
                    else if ($_GET["error"] == "connection"){
                        echo "<p class='alert'>Connectez-vous pour assister au live.</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p class='alert'>Quelque chose s'est mal passé, merci de réessayer dans un instant.</p>";
                    }
                }
                ?>
                <form action="./back/register.inc.php" method="post">
                    <div class="form-row register">
                        <div class="row-column">
                            <label for="email_usr_reg">Email</label>
                            <div class="input">
                                <input type="email" name="email_usr_reg" id="email_usr_reg" placeholder="monemail@mail.com" required>&nbsp;
                                <div class="icons"><img src="./assets/img/email.png" alt="email icon Electrolux Inside"></div>
                            </div>
                        </div>
                        <div class="row-column">
                            <label for="username_user_reg">Nom Prénom</label>
                            <div class="input">
                                <input type="text" name="username_user_reg" id="username_user_reg" placeholder="Samuel Doe" required>&nbsp;
                                <div class="icons"><img src="./assets/img/user.png" alt="email icon Electrolux Inside"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="password_usr_reg">Mot de passe</label>
                        <div class="input">
                            <input type="password" name="password_usr_reg" id="password_usr_reg" placeholder="••••••••" required>&nbsp;
                            <div style="cursor: pointer" id="visible_pwd" class="icons"><img src="./assets/img/lock.png" alt="visibility icon Electrolux Inside"></div>
                        </div>
                        <a href="./login.php">J'ai déjà un compte</a>
                    </div>
                    <button type="submit" id="submit" name="submit">Rejoindre le live&nbsp;<i
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
