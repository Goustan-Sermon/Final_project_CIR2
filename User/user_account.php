<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();
$info=User::get_info_client($user_id);


?>

    <body>

    <div class="sidebar">
        <h2 style="color: white; font-size: 2em; text-align: center">Banana Music</h2>
        <div class="logo">
            <a href="user_home.php">
                <img src="../image/banane.png" alt="Logo" />
            </a>
        </div>

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

        <div class="policies">
            <ul>
                <li>
                    <a href="#">Cookies</a>
                </li>
                <li>
                    <a href="#">Privacy</a>
                </li>
            </ul>
        </div>
    </div>
    <input id='id_user' type='text' style='display: none;' value=<?php echo $user_id ?>>
    <div class="main-container" style="color:white;">

        <div id="profil-card" class="profile-card"></div>

        <div id="profil-form" style="display:none;">
            <form action="#" method="GET">

                <label for="nomup">New Last name :</label>
                <input type="text" id="nomup" name="nom" required><br>

                <label for="prenomup">New First name :</label>
                <input type="text" id="prenomup" name="prenom" required><br>


                <label for="emailup">New email :</label>
                <input type="email" id="emailup" name="email" required><br>


                <button onclick="cacher_form()" id='new_data' type="button" value=<?php echo $user_id?>>Envoyer</button>
                <button  type="button" value="Cancel" onclick="cacher_form()">Cancel</button>

            </form>
        </div>




<?php
$content_account = ob_get_clean();
require_once('template_account.php');

