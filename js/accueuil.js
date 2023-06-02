let id=document.getElementById('id_user_home').value
//ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist)
ajaxRequest('GET','../class/request.php/music/',displayMusic)
ajaxRequest('GET','../class/request.php/album/'+id,displayAlbum)



$('#loop').click(function (event){

    event.preventDefault()
    let select=''
    let search=''
     select=$('#Select').val()
     search=$('#search').val()


    if (select==='Artiste'){
        ajaxRequest('GET','../class/request.php/filter_artiste?search='+search,recherche_artiste);
    }
    if (select==='Album'){
        ajaxRequest('GET','../class/request.php/filtrer_album?search='+search,recherche_album)
    }
    if(select=='Music'){
        ajaxRequest('GET','../class/request.php/filtrer_music?search='+search,recherche_music)
    }

})

function recherche_music(music){

    let select=''
    let search=''
    select=$('#Select').val()
    search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music=="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no '+select+' for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            ' +
            '                <div class="item">\n' +
            '                    <img src="'+music[i]['image_album']+'" />\n' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+music[i]['titre_morceau']+'</h4>\n' +
            '                    <p>'+music[i]['nom_artiste']+'</p>\n' +
            '                   <button class="buttons" id="'+music[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon></button>'+
            '                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')

}
function recherche_album(music){
    let select=''
    let search=''
    select=$('#Select').val()
    search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music=="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no '+select+' for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            </div><div class="item">\n' +
            '                   <img src="'+music[i]['image_album']+'" />' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+music[i]['titre_album']+'</h4>\n' +
            '                   <button class="buttons" id="'+music[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')
    $('.buttons').click(function (event){
        $('#body').html("")
        let id_album=$(event.target).closest('.buttons').attr('id');
        console.log(id_album)
        if(id_album!==undefined){
            ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }


    })
}
function recherche_artiste(music){
    let select=''
    let search=''
    select=$('#Select').val()
    search=$('#search').val()
    $('#autoWidth3').html("")
    $('#search_result').html("")
    $('#search_result').append('<h2>Search for "'+search+'" in '+select+'</h2>')

    if (music=="false"){
        $('#search_result').html("")
        $('#search_result').append('<h2>There is no artiste for "'+search+'"</h2>')
        return
    }
    for (let i=0;i<music.length;i++){
        $('#autoWidth3').append(
            '            </div><div class="item">\n' +
            '                   <img src="'+music[i]['image_artiste']+'" />' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+music[i]['nom_artiste']+'</h4>\n' +
            '                   <button class="buttons_artiste" id="'+music[i]['id_artiste']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')
    }
    $('#autoWidth3').append('<div class="button-container">\n' +
        '            <a class="prev" onclick="scrollToPrev()">&#10094;</a>\n' +
        '            <a class="next" onclick="scrollToNext()">&#10095;</a>\n' +
        '        </div>')
    $('.buttons_artiste').click(function (event){
        $('#body').html("")
        let id_artiste=$(event.target).closest('.buttons_artiste').attr('id');
        console.log(id_artiste)
        if(id_artiste!==undefined){

            ajaxRequest('GET','../class/request.php/showartiste/'+id_artiste,show_artiste)
        }


    })
}

function show_artiste(album){

    var content = '<div class="container">\n' +
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
        '<div class="main-container" id="body"> <div class="spotify-playlists">\n' +

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
            '                    <img src="'+album[i]['image_album']+'" />\n' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+album[i]['titre_album']+'</h4>\n' +
            '                    <p>'+album[i]['nom_artiste']+'</p>\n' +
            '                   <button class="buttons" id="'+album[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="eye-outline"></ion-icon></button>'+
            '                </div>')}

    $('.buttons').click(function (event){
        $('#body').html("")
        let id_album=$(event.target).closest('.buttons').attr('id');
        console.log(id_album)
        if(id_album!==undefined){
            ajaxRequest('GET','../class/request.php/showmusic/'+id_album,showMusic)


        }


    })




}

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
            if(id_album!==undefined){
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
        '                    <h4>'+music[i]['titre_morceau']+'</h4>\n' +
        '                    <p>'+music[i]['nom_artiste']+'</p>\n' +
        '                    <p>'+date+'</p>\n' +
        '                   <button class="buttons" id="'+music[i]['id_album']+'" style="margin-left: -5px" type="button" value=""><ion-icon name="play-outline"></ion-icon>' +
        '</button>'+

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




