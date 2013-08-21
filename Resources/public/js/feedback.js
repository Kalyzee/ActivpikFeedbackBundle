$(document).ready(function(){
    // Event pour la box commentaires
    $('#comments_wrapper_toggle').click(function(){      
        var thisLeft = $(this).parent().css('left');    
        if(thisLeft == '-555px'){
            var animLeft = '+=555';
       
        } else {
            var animLeft = '-=555';

        }       
        $(this).parent().animate({
            left: animLeft
        }, 400, function() {
            // Animation complete.
            });           
        return false;
    });
    
    function focus_champ(id, defaultValue){
        $(id).focus(function(){
            if($(this).val() == defaultValue){
                $(this).val('');
            }  
        }).blur(function(){
            if($(this).val() == ''){
                $(this).val(defaultValue);
            }  
        });    
    }
    
    focus_champ("#activpik_feedbackbundle_feedbacktype_email", "E-mail");
    focus_champ("#activpik_feedbackbundle_feedbacktype_subject", "Sujet");
    focus_champ("#activpik_feedbackbundle_feedbacktype_comment", "Votre commentaire");

    function clear_formulaire_comment(){
    	 $("#activpik_feedbackbundle_feedbacktype_email").val("E-mail");
    	 $("#activpik_feedbackbundle_feedbacktype_subject").val("Sujet");
    	 $("#activpik_feedbackbundle_feedbacktype_comment").val("Votre commentaire");
    }
    
    // Events pour l'envoie du feedback
    $("#comments_wrapper form").on("submit", function(){
        var type  = $(this).find('input[type="radio"]:checked').val();
        
        var sujet = $('#activpik_feedbackbundle_feedbacktype_subject').val();
        

        var email = $('#activpik_feedbackbundle_feedbacktype_email').val();

        var msg   = $('#activpik_feedbackbundle_feedbacktype_comment').val();
                
        	if(type == undefined){
                $('.type_bloc label').css('font-weight','bold').css('color','#E14D2C');
            } 
            else if (email == undefined){
                $('.email label').css('font-weight','bold').css('color','#E14D2C');
            }
            else if(sujet == '' || sujet == 'Sujet'){
                $('input#sujet').css('border','2px solid #E14D2C');
            }
            
            else if(msg == 'Votre commentaire' || msg == ''){
                $('#commentaires').css('border','2px solid #E14D2C');
            }
         else {
            $('#comments_wrapper form').fadeOut('fast');  
            
            $.ajax({  
                type: 'POST',  
                url: APPLICATION_BASE_URL_FEEDBACK,  
                data: $(this).serialize(),  
                success: function(reponse){
                    $('#comments_wrapper').append('<div id="comments_wrapper_loader">Commentaire envoyé !</div>');    
                    $('#comments_wrapper').delay(1000).animate({
                        left: '-=555'
                    }, 1000, function() {
                        $('#comments_wrapper_loader').remove();
                        $('#comments_wrapper form').fadeIn();
                    });
                    clear_formulaire_comment();
                },
                error: function(){
                    $('#comments_wrapper').append('<div id="comments_wrapper_loader">Une erreur est survenue, veuillez recommencer</div>');    
                    $('#comments_wrapper').delay(1000).animate({
                        left: '-=555'
                    }, 1000, function() {
                        $('#comments_wrapper_loader').remove();
                        $('#comments_wrapper form').fadeIn();
                    });        
                }
               
            });       
        }
        return false;
    });    
});