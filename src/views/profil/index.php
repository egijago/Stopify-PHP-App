<?php
require_once(PROJECT_ROOT_PATH . "/src/views/partials/side_bar.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/song_item.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/icon.php");
require_once(PROJECT_ROOT_PATH . "/src/views/partials/font.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/icon.css">
    <link rel="stylesheet" href="css/song.css">
    <link rel="stylesheet" href="/css/register.css">
    <link rel="stylesheet" href="/css/profile.css">

    <?php echo Font(); ?>
    <title>Stopify - Profil</title>
    <body>
        <div class="whole-wrapper">
            <?php echo SideBar("Home"); ?>
            <div class="page-wrapper">
                <?php echo icon($_SESSION["username"]); ?>
                <input type="hidden" id="custId" name="custId" value="<?php echo $_SESSION["id_user"] ?>">
                <h1 style="margin-top: 5vw;">Good morning, <?php echo $_SESSION["username"] ?></h1>
                <br>
                <div class="edit-profil">
                    <div class="form">
                        <form method="post" id="registrationForm" onsubmit="sendForm()">
                            <div class="form_input">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" placeholder="Change your name">
                            </div>

                        <!-- <div class="form_input">
                            <label for="newpassword">New Password</label>
                            <input type="password" name="newpassword" id="newpassword" placeholder="Enter your new password">
                        </div>
                        
                        <div class="form_input">
                            <label for="confnewpassword">Confirm New Password</label>
                            <input type="password" name="confnewpassword" id="confnewpassword" placeholder="Enter your new confirm password">
                        </div>
                        <p id="newPasswordError" class="error-input" ></p>
                        
                        <div class="form_input">
                            <label for="oldpassword">Old Password</label>
                            <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter your old password">
                        </div>
                        <p id="passwordError" class="error-input" ></p> -->
                        
                        <div class="form_input">
                            <label for="cardnumber">Card Number</label>
                            <input type="text" name="cardnumber" id="cardnumber" placeholder="Enter you card number">
                        </div>
                        <p id="cardNumberError" class="error-input"></p> 
                        
                        <div class="form_input">
                            <label for="cardowner">Card Owner</label>
                            <input type="text" name="cardowner" id="cardowner" placeholder="Enter you card owner">
                        </div>
                        
                        <div class="form_input">
                            <label for="cardmonth">Card Exp Month</label>
                            <input type="text" name="cardmonth" id="cardmonth" placeholder="Enter you card expired month">
                        </div>
                        <p id="cardMonthError" class="error-input"></p> 
                        
                        <div class="form_input">
                            <label for="cardyear">Card Exp Year</label>
                            <input type="text" name="cardyear" id="cardyear" placeholder="Enter you card expired year">
                        </div>
                        <p id="cardYearError" class="error-input"></p> 

                        <div class="submit_form">
                            <input type="submit" name="submit" value="Sign up" id="submitButton" disable>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="js/profil.js"></script>
</html>
