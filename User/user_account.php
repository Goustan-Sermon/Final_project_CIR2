<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();
$info=User::get_info_client($user_id);


?>

    <body>

    <div class="sidebar">
        <div class="logo">
            <a href="user_home.php">
                <img src="https://storage.googleapis.com/pr-newsroom-wp/1/2018/11/Spotify_Logo_CMYK_Green.png" alt="Logo" />
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

    <div class="main-container" style="color:white;">





<?php
$content_account = ob_get_clean();
require_once('template_account.php');


