let id=document.getElementById('id_user_home').value
ajaxRequest('GET','../class/request.php/playlist/'+id,displayPlaylist)
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

        $('#autoWidth').append(
            '            <a href="#">\n' +
            '                <div class="item">\n' +
            '                    <img src="'+album[i]['image_album']+'" />\n' +
            '                    <div class="play">\n' +
            '                        <span class="fa fa-play"><ion-icon style="padding-left: 2px;padding-top: 2px; font-size: 15px" name="play-outline"></ion-icon></span>\n' +
            '                    </div>\n' +
            '                    <h4>'+album[i]['titre_album']+'</h4>\n' +
            '                    <p>'+album[i]['nom_artiste']+'</p>\n' +
            '                    <p>'+date+'</p>\n' +
            '                </div>\n' +
            '            </a>\n')}


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


