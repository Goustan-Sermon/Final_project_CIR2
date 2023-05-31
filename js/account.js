let id_user=document.getElementById('id_user').value
console.log(id_user);
ajaxRequest("GET", "../class/request.php/user/"+id_user, update_form);




function update_form(info){


    console.log(info)

        console.log(info['nom'])
        $('#form_update').html("")
        $('#form_update').append('<form action="#" method="get" style="color:white">\n' +
            '            <label for="nom">Nom :</label>\n' +
            '            <input type="text" id="nom" name="nom" value="'+info['nom']+'"<br>\n' +
            '\n' +
            '            <label for="prenom">Prénom :</label>\n' +
            '            <input type="text" id="prenom" name="prenom" value="'+info['prenom']+'"><br>\n' +
            '\n' +
            '            <label for="age">Âge :</label>\n' +
            '            <input type="number" id="age" name="age" value="'+info['age']+'"><br>\n' +
            '\n' +
            '            <label for="email">Email :</label>\n' +
            '            <input type="email" id="email" name="email" value="'+info['email']+'"><br>\n' +
            '\n' +
            '            <label for="password">Mot de passe :</label>\n' +
            '            <input type="password" id="password" name="password" value="aaaaaaaaa"><br>\n' +
            '\n' +
            '            <button type="submit" name= "save" id="id_user" value="'+info['id_user']+'">Save</button>\n' +
            '\n' +
            '\n' +
            '        </form>')



}