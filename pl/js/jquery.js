// initialisation de la page
$(document).ready(function(){
    
    $.get('pl/html/footer.html', function(html) {
        $('body').append(html);
    });

    $.post('bll/controlerjquery.php', { content: 'connected' }).done(function(result){
        if(result == "true"){
            $.get('pl/html/navbars/navbar-connected.html', function(html) {
                $('footer').before(html);
                changeContent('');
            });
            $.post('bll/controlerjquery.php', { content: 'admin' }).done(function(result){
                if(result == "true"){
                    $.get('pl/html/navbars/nav-admin.html', function(html) {
                        $('#nav-signout').parent().before(html);
                    });
                }
            })
        }else{
            $.get('pl/html/navbars/navbar.html', function(html) {
                $('footer').before(html);
                changeContent('');
            });
        }
    });
    
});

// ferme la navbar lors d'un click
$('body').on('click', '.navbar-collapse', function(e) {
    if($(e.target).is('.nav-close')){
        $(this).collapse('hide');
    }
});

// Lien du titre
$('body').on('click', '#titre-principal', function(){
    changeContent('');
});

// ouvre la connexion
$('body').on('click', '#nav-signin', function(){
    changeContent('signin');
});

// permet de se deconnecter
$('body').on('click', '#nav-signout', function(){
    $.post('bll/signout.php').done(function(){
        $('body').append('<meta http-equiv = "refresh" content = "0; url = ./" />');
    });
});

// fonction qui change le contenu de la page
function changeContent(content){
    $('main').remove();
    
    $.post('bll/controlerjquery.php', { content: content }).done(function(result){
        if(result != "signin"){
            $.get('pl/html/loader.html', function(html) {
                $('body').append(html);
            });
        }
        $.get('pl/html/'+result+'.html', function(html) {
            $('footer').before(html);
        });
        
        $(".nav-link").removeClass('active');
        $(".dropdown-item").removeClass('active');
        $('#nav-'+result).addClass('active');

        if(result == "signin"){
            $('footer').addClass('fixed-bottom');
        }else{
            $('footer').removeClass('fixed-bottom');
        }

        if(result == "account"){
            account();
        }
        
    });
}

function removeLoader(){
    $('#loader').remove();
}

// envoie avec la method post au fichier php pour la connexion
$('body').on('click', '#signin', function(){

    var login = $('#inputLogin').val();
    var password = $('#inputPassword').val();

    $.post('bll/signin.php', { login: login, password: password }).done(function(result){
        console.log(result)
        $('#alert').remove();
        $.get('pl/html/alerts/signin-alert'+result+'.html', function(html) {
            if(result == 1){
                $('#signin').prop('disabled', true)
            }

            $('div.container').append(html);
        });
        
    });
    
});