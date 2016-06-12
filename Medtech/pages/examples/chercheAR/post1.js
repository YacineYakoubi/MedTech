$(document).ready( function() {
  // détection de la saisie dans le champ de recherche
  $('#q1').keyup( function(){
    $field = $(this);
    $('#results1').html(''); // on vide les resultats
    $('#ajax-loader').remove(); // on retire le loader
 
    // on commence à traiter à partir du 2ème caractère saisie
    if( $field.val().length > 1 )
    {
      // on envoie la valeur recherché en GET au fichier de traitement
      $.ajax({
  	type : 'GET', // envoi des données en GET ou POST
	url : 'chercheAR/ajax-search1.php' , // url du fichier de traitement
	data : 'q1='+$(this).val() , // données à envoyer en  GET ou POST
	beforeSend : function() { // traitements JS à faire AVANT l'envoi
		$field.after('<img src="ajax-loader.gif" alt="loader" id="ajax-loader" />'); // ajout d'un loader pour signifier l'action
	},
	success : function(data){ // traitements JS à faire APRES le retour d'ajax-search.php
		$('#ajax-loader').remove(); // on enleve le loader
		$('#results1').html(data); // affichage des résultats dans le bloc
	}
      });
    }		
  });
});
