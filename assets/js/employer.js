$(document).ready(function(){
	//function to control which form the user fills depending 
	//on type selected from a drop-down list

	$("#employer_type").change(function(){
		$(this).find("option:selected").each(function(){
			
			if($(this).attr("value")=="individual"){
				$(".corporate").hide();
				$(".individual").show();
			}
			else if ($(this).attr("value")=="corporate"){
				$(".individual").hide();
				$(".corporate").show();

			}
			else {
				$(".individual").hide();
				$(".corporate").hide();
			}
		});

	}).change();
	//handles validation and submit of the employer_registration form
	$('#employer_form').validate({
		submitHandler:function(form)
		{
			$(form).ajaxSubmit({
				success:function(response)
				{
					tb_remove();
					post_employer_form_submit(response);
				},
				dataType:'json'
			});
		},
		errorLabelContainer: "#error_message_box",
		wrapper: "li",
		rules:
		{
			employer_type: "required",
			first_name: "required",
			last_name: "required",
			company_name: "required",
			phone_number: "required",
			suburb: "required",
			city: "required"


		},
		messages:
		{
			company_name: "<?php echo $this->lang->line('employer_company_name_required');?>",
			last_name: "<?php echo $this->lang->line('employer_last_name-required');?>",
			first_name: "<?php echo $this->lang->line('employer_first_name-required');?>",
			phone_number: "<?php echo $this->lang->line('common_phone_number1');?>",
			city_town: "<?php echo $this->lang->line('common_city');?>",
			estate_locality: "<?php echo $this->lang->line('common_estate_suburb');?>"
		}
	});
		
});