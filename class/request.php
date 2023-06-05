<?php
require_once ('User.php');
require_once ('Playlist.php');
require_once ('Music.php');
require_once ('Album.php');
require_once ('Artist.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

$id = array_shift($request);
if ($id == '')
    $id = NULL;
$result = null;

switch ($requestRessource) {
    case 'user':
        switch ($requestMethod) {
            case 'PUT':
                parse_str(file_get_contents('php://input'), $_PUT);
                if (isset($_PUT) and $id) {
                    $result = User::update_info($id, $_PUT["prenom"], $_PUT["nom"], $_PUT["email"], $_PUT["date"]);
                    break;
                }
                break;
            case 'GET':
                $result = User::get_info_client($id);
                break;

        }
        break;
    case 'playlist':
        switch ($requestMethod) {
            case 'GET':
                $result = Playlist::get_playlist($id);
                break;
            case 'POST':
                if (isset($_POST)) {
                    $result = Playlist::add_music($_POST['music'], $_POST['playlist']);
                    break;
                }
        }
        break;
    case 'playlist_music':
        switch ($requestMethod){
            case'GET':
                $result=Playlist::get_playlist_music($id);
                break;
            case'DELETE':
                $result=Playlist::delete_music($_GET['music'],$_GET['playlist']);
                break;
            case'POST':
                $result=Playlist::create_playlist($id,$_POST['nom']);
        }
        break;
    case 'music':
        switch ($requestMethod) {
            case 'GET':
                $result = Music::get_music();
                break;

        }
        break;
    case 'album':
        switch ($requestMethod) {
            case 'GET':
                $result = Album::get_album();
                break;
        }
        break;
    case 'showmusic':
        switch ($requestMethod) {
            case 'GET':
                $result = Album::get_music_by_album($id);
                break;
        }
        break;
    case 'showartiste':
        switch ($requestMethod){
            case 'GET':
                $result=Artist::get_album_by_artist($id);
                break;
        }
        break;
    case 'filter_artiste':
        switch ($requestMethod){
            case 'GET':
                $result = Artist::artist_filter($_GET['search']);
                break;

        }
        break;
    case 'filtrer_album':
        switch ($requestMethod) {
            case 'GET':
                $result = Album::album_filter($_GET['search']);
                break;
        }
        break;
    case 'filtrer_music':
        switch ($requestMethod) {
            case 'GET':
                $result = Music::music_filter($_GET['search']);
                break;
        }
    case 'filtrer_style':
        switch ($requestMethod) {
            case 'GET':
                $result = Music::style_filter($_GET['search']);
                break;
        }
        break;
    case 'listenmusic':
        switch ($requestMethod) {
            case 'GET':
                $result=Music::get_music_by_id($id);
                break;
        }
        break;
    case 'history':
        switch ($requestMethod){
            case 'POST':
                $result=Playlist::history($id,$_POST['music']);

        }

}

if (!empty($result)) {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('HTTP/1.1 200 OK');
    echo json_encode($result);
    exit();
}

// Bad request case.
header('HTTP/1.1 400 Bad Request');

