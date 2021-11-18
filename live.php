<?php
$page = 'LIVE';

include './back/gestion.php';
include_once './back/head.php';

if (empty($_SESSION['email'])){
    header('location: ./login.php?error=connection');
}

?>

<div class="main-content">
    <div class="container live">
        <div class="form">
            <section class="form_container chat_container">
                <h2>Envoyer un message</h2>
                <?php
                if (isset($_GET["error"])){
                    if ($_GET["error"] == "nomessage"){
                        echo "<p class='alert'>Merci de remplir tous les champs.</p>";
                    }
                    else if ($_GET["error"] == "stmtfailed"){
                        echo "<p class='alert'>Quelque chose s'est mal passé, merci de réessayer dans un instant.</p>";
                    }
                }
                ?>
                <form action="./back/back.php" method="post">
                    <div class="form-row">
                        <label for="message_usr">Message</label>
                        <div class="input">
                            <input type="text" value="<?= $_SESSION['email'] ?>" name="user_session" id="user_session" required hidden>
                            <textarea name="message_usr" id="message_usr" cols="10" rows="5" placeholder="Mon message..." required></textarea>
                        </div>
                    </div>
                    <button type="submit" id="submit" name="submit">Envoyer&nbsp;<i class='bx bxs-send'></i></button>
                </form>
            </section>
        </div>
        <iframe src="https://player.vimeo.com/video/124381218?h=0f574a5928&color=ef9018&title=0&byline=0&portrait=0" width="950" height="540" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
</div>
<?php
include_once './back/footer.php';
?>

