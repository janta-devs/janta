$(document).ready(function(){
//handles user registration choice
	$("#choice_employer").click(function(){
		alert("Chosen to register as an employer");
		$("#employerstep_2").show();
		$("#user_choice1").hide();
		//window.location.replace("http://stackoverflow.com");

	});

	//function to control which form the user fills depending 
	//on type selected from a drop-down list

	$("#employer_type").change(function(){
		$(this).find("option:selected").each(function(){
			
			if($(this).attr("value")=="individual"){
				$("#employer_corporate").hide();
				$("#employerstep_2").hide();
				/*console.log();
				alert("You are continuing as an Individual Employer");*/
				$("#employer_individual").show();
			}
			else if ($(this).attr("value")=="corporate"){
				alert("You are continuing as a Corporate Employer");
				$("#employer_form_individual").hide();
				$("#employerstep_2").hide();
				$("#employer_corporate").show();

			}
			else {
				$("#employer_form_individual").hide();
				$("#employer_corporate").hide();
			}
		});

	}).change();
	//handles select function of the dropdown box.
	$('#employer_type').selectpicker({
		style: 'btn-info',
		size: 5
	})
	//handles validation and submit of the employer_registration form
	$('#employer_form_corporate')
	.bootstrapValidator({
		message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			company_name: {
				message: 'The company name is not valid',
				validators: {
					notEmpty: {
						message: 'Company name is required and can\'t be empty'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'Company name must be more than 4 and less than 30 characters'
					},
					/*remote: {
						url: 'remote.php',
						message: 'The company name is not available'
					},*/
					regexp: {
						regexp: /^[a-zA-Z0-9_\.]+$/,
						message: 'The company name can only consist of alphabets, number, dot, and underscore'
					}
				}
			},
			phone_number: {
				validators: {
					notEmpty: {
						message: 'Phone number is required and can\'t be empty'
					},
					regexp: {
						regexp: /[0-9-()+]{3,20}/,
						message: 'Phone number can only consist of numbers, a + and a dash'
					},
					stringLength: {
						min: 12,
						max: 15,
						message: 'Phone number must be more than 9 and less than 15 characters'
					}
				}
			},
			country: {
				validators: {
					notEmpty: {
						message: 'Country is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The country name can only consist of alphabets'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'Country name must be more than 4 and less than 30 characters'
					}
				}
			},
			city: {
				validators: {
					notEmpty: {
						message: 'City/town is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The city/town name can only consist of alphabets'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'City/town name must be more than 4 and less than 50 characters'
					}
				}
			},
			suburb: {
				validators: {
					notEmpty: {
						message: 'Suburb/Locality is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.]+$/,
						message: 'Suburb/Locality can only consist of alphabets, number, dot, and underscore'
					},
					stringLength: {
						min: 3,
						max: 30,
						message: 'Suburb/Locality must be more than 3 and less than 30 characters'
					}
				}
			},
			address_1: {
				validators: {
					notEmpty: {
						message: 'Address 1 is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.%+-\,]+$/,
						message: 'Address 1 can only consist of alphabets, number, dot, and underscore'
					},
					stringLength: {
						min: 9,
						max: 40,
						message: 'Address 1 must be more than 9 and less than 40 characters'
					}
				}
			},
		}	
			
	});
	$('#employer_form_individual')
	.bootstrapValidator({
		message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			first_name: {
				message: 'The first name is not valid',
				validators: {
					notEmpty: {
						message: 'first name is required and can\'t be empty'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'first name must be more than 4 and less than 30 characters'
					},
					/*remote: {
						url: 'remote.php',
						message: 'The company name is not available'
					},*/
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The first name can only consist of alphabets and underscore'
					}
				}
			},
			last_name: {
				message: 'The last name is not valid',
				validators: {
					notEmpty: {
						message: 'last name is required and can\'t be empty'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'The last name must be more than 4 and less than 30 characters'
					},
					/*remote: {
						url: 'remote.php',
						message: 'The company name is not available'
					},*/
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The last name can only consist of alphabets and underscore'
					}
				}
			},
			surname: {
				message: 'The surname name is not valid',
				validators: {
					stringLength: {
						min: 1,
						max: 50,
						message: 'The surname must be more than 4 and less than 30 characters'
					},
					/*remote: {
						url: 'remote.php',
						message: 'The company name is not available'
					},*/
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The surname can only consist of alphabets and underscore'
					}
				}
			},
			phone_number: {
				validators: {
					notEmpty: {
						message: 'Phone number is required and can\'t be empty'
					},
					regexp: {
						regexp: /[0-9-()+]{3,20}/,
						message: 'Phone number can only consist of numbers, a + and a dash'
					},
					stringLength: {
						min: 12,
						max: 15,
						message: 'Phone number must be more than 9 and less than 15 characters'
					}
				}
			},
			country: {
				validators: {
					notEmpty: {
						message: 'Country is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The country name can only consist of alphabets'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'Country name must be more than 4 and less than 30 characters'
					}
				}
			},
			city: {
				validators: {
					notEmpty: {
						message: 'City/town is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z_\.]+$/,
						message: 'The city/town name can only consist of alphabets'
					},
					stringLength: {
						min: 4,
						max: 50,
						message: 'City/town name must be more than 4 and less than 50 characters'
					}
				}
			},
			suburb: {
				validators: {
					notEmpty: {
						message: 'Suburb/Locality is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.]+$/,
						message: 'Suburb/Locality can only consist of alphabets, number, dot, and underscore'
					},
					stringLength: {
						min: 3,
						max: 30,
						message: 'Suburb/Locality must be more than 3 and less than 30 characters'
					}
				}
			},
			address_1: {
				validators: {
					notEmpty: {
						message: 'Address 1 is required and can\'t be empty'
					},
					regexp: {
						regexp: /^[a-zA-Z0-9_\.%+-\,]+$/,
						message: 'Address 1 can only consist of alphabets, number, dot, and underscore'
					},
					stringLength: {
						min: 9,
						max: 40,
						message: 'Address 1 must be more than 9 and less than 40 characters'
					}
				}
			},
		}	
			
	});
});


	
//for handling the various steps in the registratioin process
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


//according menu

$(document).ready(function()
{
    //Add Inactive Class To All Accordion Headers
    $('.accordion-header').toggleClass('inactive-header');
	
	//Set The Accordion Content Width
	var contentwidth = $('.accordion-header').width();
	$('.accordion-content').css({});
	
	//Open The First Accordion Section When Page Loads
	$('.accordion-header').first().toggleClass('active-header').toggleClass('inactive-header');
	$('.accordion-content').first().slideDown().toggleClass('open-content');
	
	// The Accordion Effect
	$('.accordion-header').click(function () {
		if($(this).is('.inactive-header')) {
			$('.active-header').toggleClass('active-header').toggleClass('inactive-header').next().slideToggle().toggleClass('open-content');
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
		
		else {
			$(this).toggleClass('active-header').toggleClass('inactive-header');
			$(this).next().slideToggle().toggleClass('open-content');
		}
	});
	
	return false;
});
