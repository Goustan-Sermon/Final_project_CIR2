<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();


?>

    <input id='id_user_home' type='text' style='display: none;' value=<?php echo $user_id ?>>


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

<div class="main-container" id="body">
    <div class="topbar">
        <div class="prev-next-buttons">
            <div class="search-box">
                <button class="btn-search"><ion-icon name="search-outline"></ion-icon></button>
                <label>
                    <input type="text" class="input-search" placeholder="Type to Search...">
                </label>
            </div>
        </div>
        <div class="navbar">
            <button type="button" style="display: flex; align-items: center;">
                <a style="text-decoration: none;color=inherit;" href="user_logout.php">Log out</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </button>
        </div>
    </div>

    <div class="spotify-playlists">
        <h2>Album</h2>
        <div class="list cs-hidden" >
            <div id="scrollable-content">
                <form action="user_home.php" method="get" id="autoWidth"></form>
            </div>
        </div>
        <div class="button-container">
            <a class="prev" onclick="scrollToPrev()">&#10094;</a>
            <a class="next" onclick="scrollToNext()">&#10095;</a>
        </div>
    </div>

    <div class="spotify-playlists">
        <h2>Music</h2>
        <div class="list cs-hidden" id="autoWidth1"></div>
        <div class="button-container">
            <a class="prev" onclick="scrollToPrev2()">&#10094;</a>
            <a class="next" onclick="scrollToNext2()">&#10095;</a>
        </div>
    </div>

    <div id='b_playlist' class="spotify-playlists">
        <h2>Banana Playlists</h2>
        <div class="list cs-hidden" id="autoWidth2"></div>
        <div class="button-container">
            <a class="prev" onclick="scrollToPrev3()">&#10094;</a>
            <a class="next" onclick="scrollToNext3()">&#10095;</a>
        </div>
    </div>

    <script src="../js/carousel.js"></script>
<?php
$content_home = ob_get_clean();
require_once('template_home.php');


