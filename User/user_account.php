<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();
$info=User::get_info_client($user_id);



?>

    <body>

    <div class="sidebar">
        <a href="user_home.php">
        <h2 style="color: white; font-size: 2em; text-align: center">Banana Music</h2>
        <div class="logo">
            <img src="../image/banane.png" alt="Logo" />

        </div>
        </a>

        <div class="navigation">
            <ul>
                <li>
                    <a href="user_account.php">
                        <span class="fa fa-home"></span>
                        <span>Your account</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="fa fas fa-book"></span>
                        <span>Your Library</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="fa fas fa-plus-square"></span>
                        <span>Create Playlist</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="fa fas fa-heart"></span>
                        <span>Liked Songs</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>
    <input id='id_user' type='text' style='display: none;' value=<?php echo $user_id ?>>
    <div class="main-container" style="color:white;">

        <div id="profil-card" class="profile-card"></div><br>

        <div id="profil-form" style="display:none;">
            <form action="#" method="GET">

                <div class="card-header">

                    <label for="nomup">New Last name :</label><br>
                    <input type="text" id="nomup" name="nom" required value=<?php echo $info['nom']?>><br><br>

                    <label for="prenomup">New First name :</label><br>
                    <input type="text" id="prenomup" name="prenom" required value=<?php echo $info['prenom']?>><br><br>


                    <label for="emailup">New email :</label><br>
                    <input type="email" id="emailup" name="email" required value=<?php echo $info['email']?>><br><br>

                    <label for="birthup">New Birth-date :</label><br>
                    <input type="date" id="birthup" name="birth" required value=<?php echo $info['date_naissance']?>><br><br>

                </div>
                <div class="card-footer">


                    <button onclick="cacher_form()" class="contact-btn" id='new_data' type="button" value=<?php echo $user_id?>>Envoyer</button>
                    <button  type="button" value="Cancel" class="contact-btn" onclick="cacher_form()">Cancel</button>

                </div>

            </form>
        </div>




        

<?php
$content_account = ob_get_clean();
require_once('template_account.php');







