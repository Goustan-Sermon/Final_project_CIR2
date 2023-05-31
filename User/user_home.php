<?php
ob_start();
require_once ("../class/User.php");
$user_id=User::Login();
?>

<body>

<div class="sidebar">
    <div class="logo">
        <a href="#">
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

            <button type="button"><a style="text-decoration: none;color=inherit;" href="user_logout.php">Log out</a></button>
        </div>
    </div>

    <div class="spotify-playlists">
        <h2>Spotify Playlists</h2>

        <div class="list">
            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>
                </div>
                <h4>Today's Top Hits</h4>
                <p>Rema & Selena Gomez are on top of the...</p>
            </div>

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
    </div>

    <div class="spotify-playlists">
        <h2>Focus</h2>
        <div class="list">
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
    </div>

    <div class="spotify-playlists">
        <h2>Mood</h2>
        <div class="list">
            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Mood Booster</h4>
                <p>Get happy with today's dose of feel-good...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Feelin' Good</h4>
                <p>Feel good with this positively timeless...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Dark & Stormy</h4>
                <p>Beautifully dark, dramatic tracks.</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Feel Good Piano</h4>
                <p>Happy vibes for an upbeat morning.</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Feelin' Myself</h4>
                <p>The hip-hop playlist that's a whole mood...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Chill Tracks</h4>
                <p>Softer kinda dance</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>Feel-Good Indie Rock</h4>
                <p>The best indie rock vibes - classic and...</p>
            </div>

            <div class="item">
                <img src="https://i.scdn.co/image/ab67616d0000b2733b5e11ca1b063583df9492db" />
                <div class="play">
                    <span class="fa fa-play"></span>
                </div>
                <h4>idk.</h4>
                <p>idk.</p>
            </div>
        </div>

        <hr>
    </div>



<?php
$content_home = ob_get_clean();
require_once('template_home.php');


