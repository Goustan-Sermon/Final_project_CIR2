//recuperation des id
let id_user=document.getElementById('id_user').value
let form=document.getElementById('profil-form')
ajaxRequest('GET','../class/request.php/user/'+id_user,display_user) // requete ajax pour pour afficher les info du user


// SI on clique sur send on affiche le form de modification d'info
function afficher_form(){

    form.style.display='inline-block'
}

// SI cancel on affiche plus le form
function cacher_form(){

    form.style.display='none';
}

// function pour afficher les informations du user
function display_user(info){

    console.log(info)
    $('#profil-card').html('')
    $('#profil-card').append(' <div class="card-header">\n' +
        '                <div class="pic">\n' +
        '                    <img src="'+info['photo_profile']+'" alt="">\n' +
        '                </div>\n' +
        '                <div class="name">'+info['nom']+' '+info['prenom']+'</div>\n' +
        '                <div class="desc">Age: '+info['age']+'</div>\n' +
        '                <div class="desc">Email: '+info['email']+'</div>\n' +
        '                <div class="desc">Birth date: '+info['date_naissance']+'</div>\n' +
        '\n' +
        '            </div>\n' +
        '            <div class="card-footer">\n' +
        '                <button type="button" value="'+info['id_user']+'" id="modifier" class="contact-btn" onclick="afficher_form()">Modify</button>\n' +
        '            </div>\n' +
        '        </div>')
// Quand on clique sur modifer on lance la requete ajax de modifcation puis de reaffichage des infos
    $("#new_data").click(function (event){
        let id=$(event.target).attr('value')
        console.log(id)
        let nom=document.getElementById('nomup').value
        let prenom=document.getElementById('prenomup').value
        let email=document.getElementById('emailup').value
        let birth=document.getElementById('birthup').value
        event.preventDefault();
        console.log(id,nom)
        if (id!==undefined){
            if (nom!== undefined && prenom !==undefined && email!==undefined){
                ajaxRequest("PUT", "../class/request.php/user/" + id, () => {
                    ajaxRequest("GET", "../class/request.php/user/" + id, display_user)
                }, 'nom=' + nom + '&prenom=' + prenom+'&email='+email+'&id_user='+id+'&date='+birth)
            }
        }



    })

}
