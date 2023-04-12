// ouvre le compte
$('body').on('click', '#nav-account', function(){
    changeContent('account');
    setTimeout(account, 100);
});

// ouvre la liste des instructeurs
$('body').on('click', '#nav-instructeurs', function(){
    changeContent('instructeurs');
    setTimeout(instructeurs, 100);
});

// ouvre la liste des avions
$('body').on('click', '#nav-avions', function(){
    changeContent('avions');
    setTimeout(avions, 100);
});

/*###########################################################################
#############################################################################
###################################ACCOUNT###################################
#############################################################################
###########################################################################*/

function account(){
    // Affichage des informations de l'utilisateur
    $.post('bll/getMembreByLogin.php').done(function(result){
        var results = JSON.parse(result);
        var title = results["nom"].toUpperCase()+" "+results["prenom"].charAt(0).toUpperCase()+results["prenom"].slice(1);
        $("h2#title").empty();
        $("h2#title").append(title);
        Object.keys(results).forEach(key => {
            $("p#"+key).empty();
            $("p#"+key).append(results[key]);
        });
        setTimeout(removeLoader, 1000);
    });
}

/*###########################################################################
#############################################################################
################################INSTRUCTEURS#################################
#############################################################################
###########################################################################*/

function instructeurs(){
    $.get('bll/getAllInstructeurs.php').done(function(result){
        $('#table-instructeurs tbody tr').remove();
        var results = JSON.parse(result);
        results.forEach(key => {
            var html = '<tr id="'+key['num_instructeur']+'"><th scope="row">'+key['num_instructeur']+'</th><td>'+key['nom']+'</td><td>'+key['prenom']+'</td></tr>';
            $('#table-instructeurs tbody').append(html);
        });
    }).done(function(){
        setTimeout(removeLoader, 1000);
    });
}

/*###########################################################################
#############################################################################
################################AVIONS#######################################
#############################################################################
###########################################################################*/

function avions(){
    $.get('bll/getAllAvions.php').done(function(result){
       var results = JSON.parse(result);
       console.log(results);
       results.forEach(key => {
            var html = '<div class="col"><div class="card shadow-sm"><img src="pl/images/avions/'+key['image_avion']+'"><div class="card-body"><p class="card-text">Nom de l\'avion : '+key['type_avion']+'</p><hr><p class="card-text">'+key['description']+'</p></div></div></div>';
            $('#avions-cols').append(html);
        });
    }).done(function(){
        setTimeout(removeLoader, 1000);
    });
}