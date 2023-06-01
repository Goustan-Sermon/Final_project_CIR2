<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();
?>

<body>

<div class="sidebar">
    <h2 style="color: white">Banana Music</h2>
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
</div>

<div class="main-container">
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
        <h2>Listened Recently</h2>

        <div class="list cs-hidden" id="autoWidth">
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

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Rock Classics</h4>
                <p>Rock Legends & epic songs that continue t...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Chill Hits</h4>
                <p>Kick back to the best new and recent chill...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Viva Latino</h4>
                <p>Today's top Latin hits elevando nuestra...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Mega Hit Mix</h4>
                <p>A mega mix of 75 favorites from the last...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>All out 80s</h4>
                <p>The biggest songs of the 1090s.</p>
            </div>
        </div>
        <div class="button-container">
            <a class="prev" onclick="scrollToPrev()">&#10094;</a>
            <a class="next" onclick="scrollToNext()">&#10095;</a>
        </div>
    </div>

    <div class="spotify-playlists">
        <h2>Banana Playlists</h2>
        <div class="list cs-hidden" id="autoWidth1">
            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Peaceful Piano</h4>
                <p>Relax and indulge with beautiful piano pieces</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Deep Focus</h4>
                <p>Keep calm and focus with ambient and pos...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Instrumental Study</h4>
                <p>Focus with soft study music in the...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>chill lofi study beats</h4>
                <p>The perfect study beats, twenty four...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Coding Mode</h4>
                <p>Dedicated to all the programmers out there.</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Focus Flow</h4>
                <p>Uptempo instrumental hip hop beats.</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Calm Before The Storm</h4>
                <p>Calm before the storm music.</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Beats to think to</h4>
                <p>Focus with deep techno and tech house.</p>
            </div>
        </div>
        <div class="button-container">
            <a class="prev" onclick="scrollToPrev2()">&#10094;</a>
            <a class="next" onclick="scrollToNext2()">&#10095;</a>
        </div>
    </div>
        <hr>
    </div>

    <script src="../js/carousel.js"></script>


<?php
$content_home = ob_get_clean();
require_once('template_home.php');


