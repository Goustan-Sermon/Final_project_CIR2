<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();

?>

    <div class="sidebar">
        <a href="user_home.php">
            <h2 style="color: white">Banana Music</h2>
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
                    <a href="user_my_library.php">
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

    <div class="main-container">


        <div class="spotify-playlists" ">
            <h2>My playlist</h2>

            <div class="list cs-hidden" style="justify-content: center;align-items: center id="autoWidth">
                <!-- exemple de carte -->
                <a href="#">
                    <div class="item">
                        <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                        <div class="play">
                            <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>
                        </div>
                        <h4>Today's Top Hits</h4>
                        <p>Rema & Selena Gomez are on top of the...</p>
                    </div>
                </a>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>RapCaviar</h4>
                    <p>New Music from Lil Baby, Juice WRLD an...</p>
                </div>

                <div class="item">
                    <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                    <div class="play">
                        <span class="fa fa-play"></span>
                    </div>
                    <h4>All out 2010s</h4>
                    <p>The biggest spmgs pf tje 2010s. Cover:...</p>
                </div>
            </div>
            <div class="button-container">
                <a class="prev" onclick="scrollToPrev()">&#10094;</a>
                <a class="next" onclick="scrollToNext()">&#10095;</a>
            </div>
        </div>

    </div>

<?php
$content_library = ob_get_clean();
require_once('template_library.php');