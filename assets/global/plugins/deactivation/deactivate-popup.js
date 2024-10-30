jQuery(document).ready(function($) {
	$( '#the-list #clean-up-booster-plugin-disable-link' ).click(function(e) {
		e.preventDefault();

		var reason = $( '#clean-up-booster-feedback-content .clean-up-booster-reason' ),
			deactivateLink = $( this ).attr( 'href' );

	    $( "#clean-up-booster-feedback-content" ).dialog({
	    	title: 'Quick Feedback Form',
	    	dialogClass: 'clean-up-booster-feedback-form',
	      	resizable: false,
	      	minWidth: 430,
	      	minHeight: 300,
	      	modal: true,
	      	buttons: {
	      		'go' : {
		        	text: 'Continue',
        			icons: { primary: "dashicons dashicons-update" },
		        	id: 'clean-up-booster-feedback-dialog-continue',
					class: 'button',
		        	click: function() {
		        		var dialog = $(this),
		        			go = $('#clean-up-booster-feedback-dialog-continue'),
		          			form = dialog.find('form').serializeArray(),
							result = {};
						$.each( form, function() {
							if ( '' !== this.value )
						    	result[ this.name ] = this.value;
						});
							if ( ! jQuery.isEmptyObject( result ) ) {
								result.action = 'post_user_feedback_clean_up_booster';
							    $.ajax({
							        url: post_feedback.admin_ajax,
							        type: 'POST',
							        data: result,
							        error: function(){},
							        success: function(msg){},
							        beforeSend: function() {
							        	go.addClass('clean-up-booster-ajax-progress');
							        },
							        complete: function() {
							        	go.removeClass('clean-up-booster-ajax-progress');
							            dialog.dialog( "close" );
							            location.href = deactivateLink;
							        }
							    });
							}
		        	},
	      		},
	      		'cancel' : {
		        	text: 'Cancel',
		        	id: 'clean-up-booster-feedback-cancel',
		        	class: 'button button-primary',
		        	click: function() {
		          		$( this ).dialog( "close" );
		        	}
	      		},
	      		'skip' : {
		        	text: 'Skip',
		        	id: 'clean-up-booster-feedback-dialog-skip',
		        	click: function() {
		          		$( this ).dialog( "close" );
		          		location.href = deactivateLink;
		        	}
	      		},
	      	}
	    });
	});
});
