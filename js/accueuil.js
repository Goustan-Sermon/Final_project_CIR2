let id=document.getElementById('id_user_home').value
//ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist)
ajaxRequest('GET','../class/request.php/music/',displayMusic)
ajaxRequest('GET','../class/request.php/album/'+id,displayAlbum)


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
            '                    <img src="'+album[i]['image_album']+'" />\n' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+album[i]['titre_album']+'</h4>\n' +
            '                    <p>'+album[i]['nom_artiste']+'</p>\n' +
            '                    <p>'+date+'</p>\n' +
            '                   <button class="buttons" id="'+album[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')}

        $('.buttons').click(function (event){
            $('#body').html("")
            let id_album=$(event.target).closest('.buttons').attr('id');
            console.log(id_album)
            if(id!==undefined){
                ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }


})
}

function showMusic(music) {
    console.log(music);

    var tableRows = '';

    for (var i = 0; i < music.length; i++) {
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
            '            <div class="song-name">' + music[i].titre_morceau + '</div>\n' +
            '            <div class="song-artist">' + music[i].nom_artiste + '</div>\n' +
            '        </div>\n' +
            '    </td>\n' +
            '    <td class="song-album">' + music[i].titre_album + '</td>\n' +
            '    <td class="song-date-added">' + music[i].date_parution + '</td>\n' +
            '    <td class="song-duration">' + date + '</td>\n' +
            '</tr>\n';
    }

    var content = '<div class="container">\n' +
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
        '            <div class="playlist-buttons">\n' +
        '                <div class="playlist-buttons-left">\n' +
        '                    <div class="playlist-buttons-like">\n' +
        '                        <img src="assets/FiiledLike.svg" alt="" class="spotify-color">\n' +
        '                    </div>\n' +
        '                    <div class="playlist-buttons-download">\n' +
        '                        <img src="assets/Download.svg" alt="">\n' +
        '                    </div>\n' +
        '                    <div class="playlist-buttons-three-dot">\n' +
        '                        <img src="assets/ThreeDots.svg" alt="">\n' +
        '                    </div>\n' +
        '                </div>\n' +
        '            </div>\n' +
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
        '                    </tr>\n' +
        tableRows +
        '                </table>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>';

    document.getElementById("body").innerHTML = content;
}

function displayMusic(music){
    $('#autoWidth1').html("")
    for(let i=0;i<music.length;i++){
        let minutes=Math.floor(music[i]['duree']/60)
        let seconde=Math.floor(music[i]['duree']%60)
        // Formatage des minutes et des secondes avec deux chiffres
        minutes = ("0" + minutes).slice(-2);
        seconde = ("0" + seconde).slice(-2);
        let date=minutes+':'+seconde

    $('#autoWidth1').append(
        '            <a href="#">\n' +
        '                <div class="item">\n' +
        '                    <img src="'+music[i]['image_album']+'" />\n' +
        '                    <div class="play">\n' +
        '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
        '                    </div>\n' +
        '                    <h4>'+music[i]['titre_morceau']+'</h4>\n' +
        '                    <p>'+music[i]['nom_artiste']+'</p>\n' +
        '                    <p>'+date+'</p>\n' +
        '                </div>\n' +
        '            </a>\n')}

}



function displayPlaylist(playlist){
    $('#autoWidth2').html("")
    for(let i=0;i<playlist.length;i++){
        let minutes=Math.floor(playlist[i]['duree_totale']/60)
        let seconde=Math.floor(playlist[i]['duree_totale']%60)
        // Formatage des minutes et des secondes avec deux chiffres
        minutes = ("0" + minutes).slice(-2);
        seconde = ("0" + seconde).slice(-2);
        let date=minutes+':'+seconde

        $('#autoWidth2').append(
            '            <a href="#">\n' +
            '                <div class="item">\n' +
            '                    <img src="'+playlist[i]['image_playlist']+'" />\n' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+playlist[i]['nom_playlist']+'</h4>\n' +
            '                    <p>'+playlist[i]['artistes']+'</p>\n' +
            '                    <p>'+date+'</p>\n' +
            '                </div>\n' +
            '            </a>\n')}
}




