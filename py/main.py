import spotipy
from spotipy.oauth2 import SpotifyClientCredentials

tableau = []

# Press the green button in the gutter to run the script.
if __name__ == '__main__':

    CLIENT_ID = 'e1a970b4eb69499cb0dff383f57387b1'     # les clés qui permettent de se connecter à l'API Spotify
    CLIENT_SECRET = 'f75076fa1924440faebd80c193bfeadf'

    artist_list = [ # liste d'artiste dont on va récupérer les morceaux et albums
        "OrelSan",
        "Travis Scott",
        "kalash Criminel",
        "Kaarism",
        "ZZCCMXTP",
        "Jack Uzi",
        "Menace Santana",
        "Ziak",
        "Freeze Corleone",
        "Gringe",
        "Green Montana",
        "Gambi",
        "Tiakola",
        "Hamza",
        "Josman",
        "Luv Resval",
        "Lorenzo",
        "Damso",
        "PNL",
        "Laylow",
        "Stupeflip",
        "Imagine Dragons",
        "Lyonzon",
        "ASHE 22",
        "Alpha Wann",
        "Kaaris",
        "SCH",
        "Zola",
        "Osirus Jack",
        "Norsacce Berlusconi",
        "Koba LaD",
        "Livaï",
        "Luidji",
        "Niska",
        "Casseurs Flowters",
        "PLK",
        "Djadja & Dinaz",
        "Ninho",
        "Vald",
        "Nekfeu",
        "Hugo TSR",
        "Dr. Peacock",
        "Lil Peep",
        "Kendrick Lamar",
        "XXXTENTACION",
        "Travis Scott",
        "Central Cee",
        "50 Cent",
        "Eminem",
        "Lil Skies",
        "$uicideboy$",
        "Juice WRLD",
        "Ghostemane",
        "Stromae",
        "SK-47"
    ]
    with open('output.txt', 'w', encoding='utf-8') as file:
        first, last = 1, 1 # Servent à avoir l'id du morceau : last prends +1 à chaque fois qu'un morceau d'un album est ajouté et first devient last quand on change d'album
        id_album = 1 # sert à avoir l'id de l'album
        id_artiste = 1 # sert à avoir l'id de l'artiste

        client_credentials_manager = SpotifyClientCredentials(client_id=CLIENT_ID, client_secret=CLIENT_SECRET)
        sp = spotipy.Spotify(client_credentials_manager=client_credentials_manager)

        for artist in artist_list:
            results = sp.search(q=artist, type='artist', limit=1)

            if results['artists']['items']:
                artist = results['artists']['items'][0]
                artist_id = artist['id']
                albums = sp.artist_albums(artist_id, album_type='album')
                id_style = 4
                for genre in artist['genres']:
                    if "drill" in genre or "Drill" in genre:
                        id_style = 1
                    elif "rap" in genre or "Rap" in genre:  # les tests ici permettent de déterminer quel style musical sera ajouté à l'album
                        id_style = 2
                    elif "pop" in genre or "Pop" in genre:
                        id_style = 3

                full = True
                for album in albums['items']:
                    tracks = sp.album_tracks(album['id'])  # ces tests servent à déterminer si le lien de la preview du morceau existe dans l'API Spotify
                    for track in tracks['items']:          # si oui, on passe à la suite, sinon on passe l'artiste
                        if str(track['preview_url']) == 'None':
                            full = False
                        else:
                            full = True
                if full:
                    file.write("INSERT INTO artiste(nom_artiste, id_type,image_artiste) VALUES ")
                    file.write(f"('{artist['name']}', 1, '{artist['images'][0]['url']}');")

                    for album in albums['items']:
                        tracks = sp.album_tracks(album['id'])   # Même chose que le teste précédent mais là on passe l'album
                        full = True
                        for track in tracks['items']:
                            if str(track['preview_url']) == 'None':
                                full = False
                            else:
                                full = True
                        if full:
                            ### Ajout des albums
                            file.write("INSERT INTO Album(titre_album, date_parution, image_album, id_artiste, id_style) VALUES ")
                            song = album['name'].replace("'", "''")
                            if len(album['release_date']) == 4:
                                album['release_date'] = album['release_date']+'-01-01' # Certaines dates ne sont qu'en année sur l'API donc on doit les comvertir en AAAA-MM-JJ
                            file.write(f"('{song}', '{album['release_date']}', '{album['images'][0]['url']}', {id_artiste}, {id_style});")
                            ### Ajout des morceaux
                            file.write("INSERT INTO morceau(titre_morceau, duree, id_album,extrait) VALUES ")
                            output = ""
                            for track in tracks['items']:
                                name = track['name'].replace("'", "''")
                                output += f"('{name}', {track['duration_ms'] // 1000}, {id_album}, '{track['preview_url']}'),"
                                last += 1
                            file.write(output[:-1] + ";") # la technique avec output permet de supprimer la virgule finale avant de print
                            id_album += 1
                            ### Ajout des correspondances entre les morceaux et les artistes (pour savoir quel artiste a fait quel morceau
                            file.write("INSERT INTO morceau_artiste(id_artiste, id_morceau) VALUES ")
                            output = ""
                            for i in range(first, last):
                                output += f"({id_artiste}, {i}),"
                            file.write(output[:-1] + ";")
                            first = last
                    id_artiste += 1
    file.close()
