/* On Recupere l'id de la session connecter*/

let id=document.getElementById('id_user_home').value

/* Requete ajax pour tout l'affichage de la page d'accueil */
ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist) // les playlist
ajaxRequest('GET','../class/request.php/playlist/'+id,displayLiked) // Titre liker (LIEN NAVBAR)
ajaxRequest('GET','../class/request.php/music/',displayMusic) // Affiche toutes les musics
ajaxRequest('GET','../class/request.php/album/'+id,displayAlbum) // Affiche tout les album

// Si le lien Create playlist est cliquer


$('#create_playlist').click(function(){

    // On vide la page
    $('#body').html("")
    // et on affiche le form pour creer une playlist
    $('#body').append('<div id="b_playlist" class="banana-playlist">' +
        '                <div class="list cs-hidden" id="Create">' +
        '                   <div class="item">\n' +
        '                    <img src="../image/banane.png" alt="banane"/>\n' +
        '                    <label for="nom_playlist"><h3 style="color: white">New playlist</h3></label><br>\n' +
        '                    <input type="text" id="nom_playlist" name="nom" required ><br><br>\n' +
        '                    <div style="display: inline-flex;justify-content: space-between;" >   '+
        '                   <button style="margin: 10px;width: 40px;" class="button_music" id="create" style="margin-left: -5px" type="button" value="">New</button>'+
        '                  </div> </div></div></div>')

    // Si on appuie sur le bouton new on envoie le form
    $('#create').click(function (event){
        //POur pas recharger la page
        event.preventDefault()
        let nom= $('#nom_playlist').val()
        window.location.href='../User/user_home.php' // on redirect qur la page d'accueil recharger la permet de remettre sur la page d'acceuil

        // requete pour creer une playlist et l'afficher
        ajaxRequest('POST','../class/request.php/playlist_music/'+id,()=>{
            ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist)
        },'nom='+nom)
    })
})

//Si on clique sur 'Your library' on affiche toute les playlists
$('#your_library').click(function (event){
    event.preventDefault()

    $('#body').html("")
    $('#body').append('<div class="main-container" id="body">' +
        '               <div id="b_playlist" class="banana-playlist">\n' +
        '        <h2>My Library</h2>\n' +
        '        <div class="list cs-hidden" id="autoWidth2"></div>\n' +
        '        <div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev3()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext3()">&#10095;</a>\n' +
        '        </div>\n' +
        '           </div>'+
        '    </div>')
    ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist) // on reutilise la requete avec display playlist

})


// Si on clique sur la loop pour rechercher
$('#loop').click(function (event){

    event.preventDefault()

     let select=$('#Select').val()
     let search=$('#search').val()

//On fait une recherche en fonction du select
    if (select==='Artist'){
        ajaxRequest('GET','../class/request.php/filter_artiste?search='+search,recherche_artiste);
    }
    if (select==='Album'){
        ajaxRequest('GET','../class/request.php/filtrer_album?search='+search,recherche_album)
    }
    if(select==='Music'){
        ajaxRequest('GET','../class/request.php/filtrer_music?search='+search,recherche_music)
    }

})

//function pour afficher les music en fonction de la recherche
function recherche_music(music){


    let select=$('#Select').val()
    let search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music==="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no '+select+' for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            ' +
            '                <div class="item">\n' +
            '                    <img src="'+music[i]['image_album']+'" alt="album"/>\n' +
            '                    <h4>'+music[i]['titre_morceau']+'</h4>\n' +
            '                    <p>'+music[i]['nom_artiste']+'</p>\n' +
            '                    <div style="display: inline-flex;justify-content: space-between;" >   '+
            '                   <button style="margin: 10px;width: 40px;" class="button_music" id="'+music[i]['id_morceau']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon>' + '</button>'+
            '                   <button  style="margin: 10px;width: 40px;" class="button_add" style="margin-left: -5px" type="button" value=""><ion-icon name="add-circle-outline"></ion-icon>' + '</button>'+
            '                  </div>'+'                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')

    // Si on clique sur le bouton play on peux jouer la musique
    $('.button_music').click(function (event){
        console.log('aa')
        $('#footer').html("")
        let id_music=$(event.target).closest('.button_music').attr('id');
        if(id_music!==undefined){
            ajaxRequest('GET','../class/request.php/listenmusic/'+id_music,music_player);
        }


    })




}

//function pour afficher tous les albums en fonction de la recherche
function recherche_album(music){

    let select=$('#Select').val()
    let search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music==="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no '+select+' for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            </div><div class="item">\n' +
            '                   <img src="'+music[i]['image_album']+'" alt="""album"/>' +
            '                    <h4>'+music[i]['titre_album']+'</h4>\n' +
            '                   <button class="buttons" id="'+music[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')

    // SI on appuie sur le bouton view (l'oeil) on montre le detail de l'album (artiste song duree etc..)
    $('.buttons').click(function (event){
        $('#body').html("")
        let id_album=$(event.target).closest('.buttons').attr('id');
        console.log(id_album)
        if(id_album!==undefined){
            ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }


    })
}

// function pour afficher les artiste en fonction de la recherche
function recherche_artiste(music){
    let select=''
    let search=''
    select=$('#Select').val()
    search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music==="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no artiste for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            </div><div class="item">\n' +
            '                   <img src="'+music[i]['image_artiste']+'" alt="artiste"/>' +
            '                    <h4>'+music[i]['nom_artiste']+'</h4>\n' +
            '                   <button class="buttons_artiste" id="'+music[i]['id_artiste']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')

    // SI on clique sur l'oeil on azffiche les info de l'artiste et tout ses album
    $('.buttons_artiste').click(function (event){
        $('#body').html("")
        let id_artiste=$(event.target).closest('.buttons_artiste').attr('id');
        console.log(id_artiste)
        if(id_artiste!==undefined){

            ajaxRequest('GET','../class/request.php/showartiste/'+id_artiste,show_artiste)
        }


    })
}


// function pour afficher les info de l'artiste
function show_artiste(album){

    let content = '<div class="container">\n' +
        '    <div class="right">\n' +
        '        <div class="playlist-header">\n' +
        '            <div class="playlist-top">\n' +
        '            </div>\n' +
        '            <div class="playlist-content">\n' +
        '                <div class="playlist-cover">\n' +
        '                    <img src="' + album[0].image_artiste + '" alt="">\n' +
        '                </div>\n' +
        '                <div class="playlist-info">\n' +
        '                    <div class="playlist-public"> ARTISTE</div>\n' +
        '                    <div class="playlist-title">' + album[0].nom_artiste + '</div>\n' +
        '                    <div class="playlist-description">' + album[0].type_artiste + '</div>\n' +
        '                    <div style="height: 10px;"></div>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>' +
        '<div class="main-container" id="body"> <div class="banana-playlist">\n' +

        '        <div class="list cs-hidden" >\n' +
        '            <div id="scrollable-content">\n' +
        '                <form action="user_home.php" method="get" id="autoWidth"></form>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>\n' +
        '    </div>' +
        '</div>'
    document.getElementById("body").innerHTML = content;

    $('#autoWidth').html("")
    for(let i=0;i<album.length;i++){
        $('#autoWidth').append('' +
            '                <div class="item">\n' +
            '                    <img src="'+album[i]['image_album']+'" alt="album"/>\n' +
            '                    <h4>'+album[i]['titre_album']+'</h4>\n' +
            '                    <p>'+album[i]['nom_artiste']+'</p>\n' +
            '                   <button class="buttons" id="'+album[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')}

    // Meme principe avec les albums on affiche leur contenue
    $('.buttons').click(function (event){
        $('#body').html("")
        let id_album=$(event.target).closest('.buttons').attr('id');
        console.log(id_album)
        if(id_album!==undefined){
            ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }


    })




}


//function pour affiche tout les album
function displayAlbum(album){


    console.log(album)
    $('#autoWidth').html("")
    for(let i=0;i<album.length;i++){
        let minutes=Math.floor(album[i]['duree_totale']/60)
        let seconde=Math.floor(album[i]['duree_totale']%60)
        // Formatage des minutes et des secondes avec deux chiffres
        minutes = ("0" + minutes).slice(-2);
        seconde = ("0" + seconde).slice(-2);
        let date=minutes+':'+seconde

        $('#autoWidth').append('' +
            '                <div class="item">\n' +
            '                    <img src="'+album[i]['image_album']+'" alt="album"/>\n' +
            '                    <h4>'+album[i]['titre_album']+'</h4>\n' +
            '                    <p class="artiste buttons_artiste" id="'+album[i]['id_artiste']+'">'+album[i]['nom_artiste']+'</p>\n' +
            '                    <p>'+date+'</p>\n' +
            '                   <button class="buttons" id="'+album[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')}
            // quand on a^puie sur l'oeil ça affiche le contenu d'un album (ses musique artiste,durée style)
        $('.buttons').click(function (event){
            $('#body').html("")
            let id_album=$(event.target).closest('.buttons').attr('id');
            console.log(id_album)
            if(id_album!==undefined){
                ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }
        })
    $('.buttons_artiste').click(function (event){
        $('#body').html("")
        let id_artiste=$(event.target).closest('.buttons_artiste').attr('id');
        console.log(id_artiste)
        if(id_artiste!==undefined){

            ajaxRequest('GET','../class/request.php/showartiste/'+id_artiste,show_artiste)
        }
    })
}

// function pour affiche toute les musique d'une album / playlist sous forme de tableau
function showMusic(music) {
    console.log(music);

    let tableRows = '';

    for (let i = 0; i < music.length; i++) {
        let minutes=Math.floor(music[i]['duree']/60)
        let seconde=Math.floor(music[i]['duree']%60)
        // Formatage des minutes et des secondes avec deux chiffres
        minutes = ("0" + minutes).slice(-2);
        seconde = ("0" + seconde).slice(-2);
        let date=minutes+':'+seconde
        tableRows += '<tr>\n' +
            '    <td>' + (i + 1) + '</td>\n' +
            '    <td class="song-title">\n' +
            '        <div class="song-image">\n' +
            '            <img src="' + music[i].image_album + '" alt="">\n' +
            '        </div>\n' +
            '        <div class="song-name-album">\n' +
            '            <div class="song-Ffaname">' + music[i].titre_morceau + '</div>\n' +
            '            <div class="song-artist">' + music[i].nom_artiste + '</div>\n' +
            '        </div>\n' +
            '    </td>\n' +
            '    <td class="song-album">' + music[i].titre_album + '</td>\n' +
            '    <td class="song-date-added">' + music[i].date_parution + '</td>\n' +
            '    <td class="song-duration">' + date + '</td>\n' +
            '    <td class="play_music"><button class="button_music" id="'+music[i]['id_morceau']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon></td>' +
            '    <td class="play_music"><button class="button_add" id="'+music[i]['id_morceau']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="add-outline"></ion-icon></td>' +
            '</tr>\n';




    }

    let content = '<div class="container">\n' +
        '    <div class="right">\n' +
        '        <div class="playlist-header">\n' +
        '            <div class="playlist-top">\n' +
        '            </div>\n' +
        '            <div class="playlist-content">\n' +
        '                <div class="playlist-cover">\n' +
        '                    <img src="' + music[0].image_album + '" alt="">\n' +
        '                </div>\n' +
        '                <div class="playlist-info">\n' +
        '                    <div class="playlist-public"> ALBUM</div>\n' +
        '                    <div class="playlist-title">' + music[0].titre_album + '</div>\n' +
        '                    <div class="playlist-description">' + music[0].style + '</div>\n' +
        '                    <div style="height: 10px;"></div>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="playlist-songs-container">\n' +
        '            <div class="playlist-songs" id="playlist-songs">\n' +
        '                <table>\n' +
        '                    <tr>\n' +
        '                        <th>#</th>\n' +
        '                        <th>Title</th>\n' +
        '                        <th>Album</th>\n' +
        '                        <th>Date Added</th>\n' +
        '                        <th>\n' +
        '                            <div style="width: 150%;"><ion-icon name="time-outline"></ion-icon></div>\n' +
        '                        </th>\n' +
        '                        <th>\n' +
        '                            <div style="width: 150%;"><ion-icon name="musical-notes-outline"></ion-icon></div>\n' +
        '                        </th>\n' +
        '                        <th>\n' +
        '                            <div style="width: 150%;"><ion-icon name="musical-notes-outline"></ion-icon></div>\n' +
        '                        </th>\n' +
        '                    </tr>\n' +
        tableRows +
        '                </table>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>' +
        '<footer id="footer" class="preview">';

    document.getElementById("body").innerHTML = content;

    // si on clique sur le  bouton play on joue la musique
    $('.button_music').click(function (event){
        $('#footer').html("")
        let id_music=$(event.target).closest('.button_music').attr('id');
        console.log(id_music)
        if(id_music!==undefined){
            ajaxRequest('GET','../class/request.php/listenmusic/'+id_music,music_player);
        }
    })
    $('.button_add').click(function (event){
        let id_music=$(event.target).closest('.button_add').attr('id');
        $('#body').html("")
        $('#body').append('<input id="id_music" type="text" style="display: none;" value="'+id_music+'">')
        ajaxRequest('GET','../class/request.php/playlist/'+id,displayAddPlaylist);
    })


}



//fonction pour afficher toute les musiques
function displayMusic(music){

    console.log(music)
    $('#autoWidth1').html("")
    for(let i=0;i<music.length;i++){
        let minutes=Math.floor(music[i]['duree']/60)
        let seconde=Math.floor(music[i]['duree']%60)
        // Formatage des minutes et des secondes avec deux chiffres
        minutes = ("0" + minutes).slice(-2);
        seconde = ("0" + seconde).slice(-2);
        let date=minutes+':'+seconde

    $('#autoWidth1').append(
        '                <div class="item">\n' +
        '                    <img src="'+music[i]['image_album']+'" alt="album"/>\n' +
        '                    <h4>'+music[i]['titre_morceau']+'</h4>\n' +
        '                    <p class="artiste buttons_artiste" id="'+music[i]['id_artiste']+'">'+music[i]['nom_artiste']+'</p>\n' +
        '                    <p>'+date+'</p>\n' +
        '                    <form action="" method="post" style="display: inline-flex;justify-content: space-between;" >   '+
        '                   <button style="margin: 10px;width: 40px;" class="button_music" id="'+music[i]['id_morceau']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon>' + '</button>'+
        '                   <button  style="margin: 10px;width: 40px;" class="button_add" id="'+music[i]['id_morceau']+'"  style="margin-left: -5px" type="button" value=""><ion-icon name="add-circle-outline"></ion-icon>' + '</button>'+
        '                  </form>'+
        '                </div>')}

        // bouton play = joue la musique
    $('.button_music').click(function (event) {
        $('#footer').html("")
        let id_music = $(event.target).closest('.button_music').attr('id');
        console.log(id_music)
        if (id_music !== undefined) {
            ajaxRequest('GET', '../class/request.php/listenmusic/' + id_music, music_player);
        }
    })

    $('.button_add').click(function (event){
        let id_music=$(event.target).closest('.button_add').attr('id');
        $('#body').html("")
        $('#body').append('<input id="id_music" type="text" style="display: none;" value="'+id_music+'">')
        ajaxRequest('GET','../class/request.php/playlist/'+id,displayAddPlaylist);
    })
    $('.buttons_artiste').click(function (event){
        $('#body').html("")
        let id_artiste=$(event.target).closest('.buttons_artiste').attr('id');
        console.log(id_artiste)
        if(id_artiste!==undefined){

            ajaxRequest('GET','../class/request.php/showartiste/'+id_artiste,show_artiste)
        }
    })


}

// fuinction pour afficher un footer pour jouer la musique
function music_player(music){

    $('#footer').append('<div class="music-player">\n' +
        '            <div class="song-bar">\n' +
        '                <div class="song-infos">\n' +
        '                    <div class="image-container">\n' +
        '                        <img src="'+music['album_photo']+'" alt="" />\n' +
        '                    </div>\n' +
        '                    <div class="song-description">\n' +
        '                        <p class="title">'+music['music_title']+'</p>\n' +
        '                        <p class="artist">'+music['artist_name']+'</p>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '                <div class="icons">\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="progress-controller">\n' +
        '                <div class="control-buttons">\n' +
        '                    <i class="fas fa-random"></i>\n' +
        '                    <i class="fas fa-step-backward"></i>\n' +
        '                    <i style="font-size: 1em;" class="play-pause fas fa-pause"></i>\n' +
        '                    <i class="fas fa-step-forward"></i>\n' +
        '                    <i class="fas fa-undo-alt"></i>\n' +
        '                </div>\n' +
        '                <div class="progress-container">\n' +
        '                    <span id="current-time">00:00</span>\n' +
        '\n' +
        '                    <div class="progress-bar">\n' +
        '                        <div class="progress"></div>\n' +
        '                    </div>\n' +
        '                    <span id="total-time">00:00</span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="other-features">\n' +
        '                <div class="volume-bar">\n' +
        '                    <i class="fas fa-volume-down"></i>\n' +
        '                    <div class="progress-bar">\n' +
        '                        <div class="progress"></div>\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <audio id="music-player" src="'+music['extrait']+'"></audio>\n' +
        '        </div>')

    play_music()
}

function play_music(){
    const playPauseButton = document.querySelector('.play-pause');
    const progressBar = document.querySelector('.progress');
    const progressContainer = document.querySelector('.progress-container');
    const volumeBar = document.querySelector('.volume-bar');
    const volumeProgress = document.querySelector('.volume-bar .progress');
    const audioPlayer = document.querySelector('#music-player');
    const currentTimeElement = document.querySelector('#current-time');
    const totalTimeElement = document.querySelector('#total-time');

    totalTimeElement.innerHTML=(formatTime(audioPlayer.duration))


// Ajoutez des gestionnaires d'événements pour les interactions de l'utilisateur
    playPauseButton.addEventListener('click', togglePlayPause);
    progressContainer.addEventListener('click', seek);
    volumeBar.addEventListener('click', adjustVolume);
    audioPlayer.addEventListener('timeupdate', updateProgressBar);
    audioPlayer.addEventListener('volumechange', updateVolumeProgress);

// Variable pour stocker l'intervalle de mise à jour de la barre de progression
    let progressBarUpdateInterval;
    function demarrerLectureAvecDelai() {
        setTimeout(function() {
            audioPlayer.play();
        }, 1000); // Délai en millisecondes (1000 ms = 1 seconde)
    }demarrerLectureAvecDelai()

// Fonction pour basculer entre lecture et pause
    function togglePlayPause() {
        if (playPauseButton.classList.contains('fa-pause')) {
            playPauseButton.classList.remove('fa-pause');
            playPauseButton.classList.add('fa-play');
            audioPlayer.pause(); // Lecture de l'audio
            // Démarre l'intervalle de mise à jour de la barre de progression
            progressBarUpdateInterval = setInterval(updateProgressBar, 100);
        } else {
            playPauseButton.classList.remove('fa-play');
            playPauseButton.classList.add('fa-pause');
            audioPlayer.play(); // Pause de l'audio
            // Arrête l'intervalle de mise à jour de la barre de progression
            clearInterval(progressBarUpdateInterval);
        }
    }

// Fonction pour déplacer la barre de progression lors du clic de l'utilisateur
    function seek(event) {
        const clickPosition = event.clientX - progressContainer.getBoundingClientRect().left;
        const progressBarWidth = progressContainer.clientWidth;
        const progressPercentage = clickPosition / progressBarWidth;
        const progressWidth = progressPercentage * 100;
        progressBar.style.width = `${progressWidth}%`;
        const audioDuration = audioPlayer.duration;
        const seekTime = progressPercentage * audioDuration;
        audioPlayer.currentTime = seekTime; // Déplace la position de lecture de l'audio
    }

// Fonction pour ajuster le volume de l'audio en fonction de la position de la barre de volume
    function adjustVolume(event) {
        const clickPosition = event.clientX - volumeBar.getBoundingClientRect().left;
        const volumeBarWidth = volumeBar.clientWidth;
        const volumePercentage = clickPosition / volumeBarWidth;
        const volume = volumePercentage.toFixed(1);
        audioPlayer.volume = volume; // Ajuste le volume de l'audio
        volumeProgress.style.width = `${volumePercentage * 100}%`; // Met à jour la barre de progression du volume
    }

// Fonction pour mettre à jour la barre de progression en fonction du temps de lecture de l'audio
    function updateProgressBar() {
        const audioDuration = audioPlayer.duration;
        const currentTime = audioPlayer.currentTime;
        const progressPercentage = (currentTime / audioDuration) * 100;
        progressBar.style.width = `${progressPercentage}%`;
    }

// Fonction pour mettre à jour la barre de progression du volume en fonction du volume actuel de l'audio
    function updateVolumeProgress() {
        const volume = audioPlayer.volume;
        volumeProgress.style.width = `${volume * 100}%`;
    }

    function formatTime(time) {
        const minutes = Math.floor(time / 60);
        const seconds = Math.floor(time % 60);
        return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
    }

// Mettez à jour la durée actuelle de l'extrait
    function updateCurrentTime() {
        const currentTime = audioPlayer.currentTime;
        currentTimeElement.textContent = formatTime(currentTime);
    }
    function updateTotalTime() {
        const totalTime = audioPlayer.duration;
        totalTimeElement.textContent = formatTime(totalTime);
    }

// Attendez que l'audio puisse être lu jusqu'à la fin
    audioPlayer.addEventListener('canplaythrough', updateTotalTime);

// Ajoutez un événement de mise à jour de la durée actuelle de l'extrait
    audioPlayer.addEventListener('timeupdate', updateCurrentTime);
}



//fonction pur afficher toute les playlists
function displayPlaylist(playlist){
    $('#autoWidth2').html("")
    for(let i=0;i<playlist.length;i++){
        $('#autoWidth2').append(
            '                <div class="item">\n' +
            '                    <img src="'+playlist[i]['image_playlist']+'" alt="album"/>\n' +
            '                    <h4>'+playlist[i]['nom_playlist']+'</h4>\n' +
            '                    <button class="buttonss" id="'+playlist[i]['id_playlist']+'" style="margin-left: -5px" type="button"><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')}

    $('.buttonss').click(function (event) {
        $('#body').html("")
        let id_playlist = $(event.target).closest('.buttonss').attr('id');
        console.log(id_playlist)
        if (id_playlist !== undefined) {
            ajaxRequest('GET', '../class/request.php/playlist_music/' + id_playlist, showMusic_playlist)
        }
    })
}


// fonction qui affoche tout kes song liker
function displayLiked(playlist){
    $('#liked_song').html("")
    for(let i=0;i<playlist.length;i++){
        if(playlist[i]['nom_playlist']==='Liked Titles')
        $('#liked_song').append('<a class="show_song_liked" id="'+playlist[i]['id_playlist']+'" href="">\n' +
            '                    <span class="fa fas fa-heart"></span>\n' +
            '                    <span>Liked Songs</span>\n' +
            '                </a>')}

            // si on clique sur le lien on affiche tout les song liker
    $('.show_song_liked').click(function (event) {
        event.preventDefault()
        console.log('aaaaa')
        $('#body').html("")
        let id_playlist = $('.show_song_liked').attr('id');
        console.log(id_playlist)
        if (id_playlist !== undefined) {
            ajaxRequest('GET', '../class/request.php/playlist_music/' + id_playlist, showMusic_playlist)
        }
    })
}


// fonction pour afficher le form pour creer une playlist
function displayAddPlaylist(playlist){
    let playlists=''
    for(let i=0;i<playlist.length;i++) {
        if (playlist[i]['nom_playlist'] !== 'The last 10 listens') {

            playlists += '       <div class="item">\n' +
                '           <img src="' + playlist[i]['image_playlist'] + '" alt="playlist">\n' +
                '           <h4>' + playlist[i]['nom_playlist'] + '</h4>\n' +
                '       <button class="button_add_music" id="' + playlist[i]['id_playlist'] + '" style="margin-left: -5px" type="button"><ion-icon name="add-circle-outline"></ion-icon></button>\n' +
                '       </div>'
        }
    }

    let content='<div id="b_playlist" class="banana-playlist">' +

        '           <h2>Playlists</h2>' +
        '               <div class="list cs-hidden" id="autoWidth2">'
                       +playlists+'</div>\n' +
        '           <div class="button-container">\n' +
        '               <a class="prev" onclick="scrollToPrev3()">&#10094;</a>\n' +
        '               <a class="next" onclick="scrollToNext3()">&#10095;</a>\n' +
        '           </div>\n' +
        '       </div>'

    $('#body').append(content)

    $('.button_add_music').click(function (event) {
        let id_playlist = $(event.target).closest('.button_add_music').attr('id');
        let id_music=$('#id_music').val()


        console.log(id_playlist,id_music)
        if (id_playlist !== undefined && id_music!==undefined) {
            ajaxRequest('POST','../class/request.php/playlist/',()=>{
                ajaxRequest('GET','../class/request.php/playlist_music/'+id_playlist,showMusic_playlist)
            },'music='+id_music+'&playlist='+id_playlist)

        }
        window.location.href = "../User/user_home.php";
    })
}

//montrer les musique dans une playlist
function showMusic_playlist(playlist){

    let content
    $('#body').html("")
    if (playlist ==="false"){

        $('#body').html("")
        content='<h2>There is no music in that playlist</h2>'
    }else {
        console.log(playlist)
        let tableRows = '';

        for (let i = 0; i < playlist.length; i++) {
            let minutes = Math.floor(playlist[i]['duree'] / 60)
            let seconde = Math.floor(playlist[i]['duree'] % 60)
            // Formatage des minutes et des secondes avec deux chiffres
            minutes = ("0" + minutes).slice(-2);
            seconde = ("0" + seconde).slice(-2);
            let date = minutes + ':' + seconde
            tableRows += '<tr>\n' +
                '    <td>' + (i + 1) + '</td>\n' +
                '    <td class="song-title">\n' +
                '        <div class="song-image">\n' +
                '            <img src="' + playlist[i].image_album + '" alt="">\n' +
                '        </div>\n' +
                '        <div class="song-name-album">\n' +
                '            <div class="song-name">' + playlist[i].titre_morceau + '</div>\n' +
                '            <div class="song-artist">' + playlist[i].nom_artiste + '</div>\n' +
                '        </div>\n' +
                '    </td>\n' +
                '    <td class="song-album">' + playlist[i].titre_album + '</td>\n' +
                '    <td class="song-date-added">' + playlist[i].date_parution + '</td>\n' +
                '    <td class="song-duration">' + date + '</td>\n' +
                '    <td class="play_music"><button class="button_music" id="' + playlist[i]['id_morceau'] + '" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon></td>'
                        if(playlist[i].nom_playlist!=='The last 10 listens') {
                            tableRows+='<td class="play_music"><button class="button_trash" id="' + playlist[i]['id_morceau'] + '" style="margin-left: -5px" type="button" value=""><ion-icon name="heart-dislike-outline"></ion-icon></td>' +

                '</tr>\n';}
        }


         content = '<div class="container">\n' +
            '    <div class="right">\n' +
            '        <div class="playlist-header">\n' +
            '            <div class="playlist-top">\n' +
            '            </div>\n' +
            '            <div class="playlist-content">\n' +
            '                <div class="playlist-cover">\n' +
            '                    <img src="' + playlist[0].image_playlist + '" alt="">\n' +
            '                </div>\n' +
            '                <div class="playlist-info">\n' +
            '                    <div class="playlist-public"> PLAYLIST</div>\n' +
            '                    <div class="playlist-title" id="'+playlist[0].id_playlist+'">' + playlist[0].nom_playlist + '</div>\n' +
            '                    <div style="height: 10px;"></div>\n' +
            '                </div>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '        <div class="playlist-songs-container">\n' +
            '            <div class="playlist-songs" id="playlist-songs">\n' +
            '                <table>\n' +
            '                    <tr>\n' +
            '                        <th>#</th>\n' +
            '                        <th>Title</th>\n' +
            '                        <th>Album</th>\n' +
            '                        <th>Date Added</th>\n' +
            '                        <th>\n' +
            '                            <div style="width: 150%;"><ion-icon name="time-outline"></ion-icon></div>\n' +
            '                        </th>\n' +
            '                        <th>\n' +
            '                            <div style="width: 150%;"><ion-icon name="musical-notes-outline"></ion-icon></div>\n' +
            '                        </th>\n' +
            '                        <th>\n' +
            '                            <div style="width: 150%;"><ion-icon name="trash-outline"></ion-icon></div>\n' +
            '                        </th>\n' +
            '                    </tr>\n' +
            tableRows +
            '                </table>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>' +
            '<footer id="footer" class="preview">';
    }

    document.getElementById("body").innerHTML = content;

    $('.button_music').click(function (event){
        $('#footer').html("")
        let id_music=$(event.target).closest('.button_music').attr('id');
        console.log(id_music)
        if(id_music!==undefined){
            ajaxRequest('GET','../class/request.php/listenmusic/'+id_music,music_player);


        }
    })

    // pour delete un song
    $('.button_trash').click(function (event){
        let id_trash=$(event.target).closest('.button_trash').attr('id');
        let id_playlist=$('.playlist-title').attr('id')
        console.log(id_trash,id_playlist)
        if(id_trash!==undefined && id_playlist!== undefined){
            ajaxRequest('DELETE','../class/request.php/playlist_music?music='+id_trash+'&playlist='+id_playlist,()=>{
                ajaxRequest('GET','../class/request.php/playlist_music/'+id_playlist,showMusic_playlist)
            })

        }
    })


}






