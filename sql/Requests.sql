INSERT INTO public.styles_musicaux(style) VALUES('Rap');
INSERT INTO public.styles_musicaux(style) VALUES('Variété');
INSERT INTO public.styles_musicaux(style) VALUES('Drill');
INSERT INTO public.styles_musicaux(style) VALUES('Pop');
INSERT INTO public.styles_musicaux(style) VALUES('Classique');

INSERT INTO public.types_artistes(type_artiste) VALUES('Chanteur');
INSERT INTO public.types_artistes(type_artiste) VALUES('Groupe');
INSERT INTO public.types_artistes(type_artiste) VALUES('Collectif');

INSERT INTO public.artiste(nom_artiste, id_type) VALUES('No Limit', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('SDM', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Naps', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('PLK', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Tiakola', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Ninho', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Miley Cyrus', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Djadja & Dinaz', 2);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Lomepal', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Vacra', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Hamza', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Jul', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Zola', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('SCH', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Favé', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Gazo', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Tayc', 1);
INSERT INTO public.artiste(nom_artiste, id_type) VALUES('Shay', 1);

INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('LA RUE', '2023/05/11', 1, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Liens du 100', '2022/12/02', 2, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('En temps réel', '2023/04/28', 3, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('2069''', '2023/04/13', 4, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Mélo', '2022/05/27', 5, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Freestyle LVL UP 2', '2023/05/11', 6, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Endless Summer Vacation', '2023/03/10', 7, 4);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Freestyle LVL UP 3', '2023/05/22', 6, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('ALPHA (Parties 1 & 2)', '2023/03/17', 8, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Mauvais Ordre', '2022/09/15', 9, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Galatée', '2023/02/23', 10, 4);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Sincèrement', '2023/02/17', 11, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('La Faille', '2023/05/12', 12, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Freestyle LVL UP 1', '2023/05/02', 6, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('DIAMANT DU BLED', '2023/03/17', 13, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Autobahn', '2023/05/24', 14, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Urus', '2022/10/12', 15, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Anarchie', '2016/05/20', 14, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('KMT', '2022/04/1', 16, 3);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Rien 100 Rien', '2019/06/28', 12, 1);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('ROOM 96', '2023/05/11', 17, 4);
INSERT INTO public.album(titre_album, date_parution, id_artiste, id_style) VALUES('Jolie Go', '2023/03/03', 18, 4);

/*INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('LA RUE', 225, 1);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Mr. Ocho', 226, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Bolide Allemand', 176, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Ragnar', 137, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Nwar sur Nwar', 201, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Si tu savais', 188, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Cette année-là', 188, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Fame', 199, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Dans le club', 173, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Jacque*** Bag', 111, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Franklin Saint', 226, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('2sang43', 175, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Redescends', 161, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('File de gauche', 206, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Le temps', 230, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Sang40', 171, 2);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('En temps réel', 165, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('C''est carré le S', 201, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Ma belleuh', 185, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Purple', 152, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Le fruit de mon époque', 173, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Benef max', 192, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('C''est toute ma life', 176, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('La danse du roro', 212, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Le sang de la veine', 169, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Casa De Papel', 162, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Fast life', 143, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Vie sur nous', 139, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Dua Lipa', 174, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('J''kiff ma Life', 159, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('M''en aller', 166, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Mamacita', 156, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Ça soutient fort', 163, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Coachella', 172, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Kassocita', 143, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Sativa', 190, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Brouncha', 182, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Frero', 168, 3);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('POL-AK', 102, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Demain', 183, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('10 minutes', 152, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Nouvelles', 179, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Cash', 160, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('7/7', 157, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Pas de sentiments', 125, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Pelo', 117, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Panama Bende', 177, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Décembre', 139, 4);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('1ntro''p', 211, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('#TT', 159, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Arsenik', 207, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Parapluie', 244, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('La clé', 172, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Mode AV (feat. Niska & Gazo', 192, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Si j''savais', 223, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Meuda', 152, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Gasolina (feat. Rsko)', 183, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Soza', 221, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Riri / No camera', 357, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('M3lo', 138, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Atasanté (feat. Hamza)', 214, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Roro (feat. SDM)', 194, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Coucher de soleil', 265, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('R.I.Peace', 226, 5);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Freestyle LVL UP 2', 149, 6);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Flowers', 200, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Jaded', 185, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Rose Colored lenses', 223, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Thousand Miles (feat. Brandi Carlile)', 231, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('You', 179, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Handstand', 205, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('River', 162, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Violet Chemistry', 246, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Muddy Feet (feat. Sia)', 136, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('Wildcard', 193, 7);
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES('island', );
INSERT INTO public.morceau(titre_morceau, duree, id_album) VALUES();*/


