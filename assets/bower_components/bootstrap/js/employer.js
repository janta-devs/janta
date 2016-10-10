$(document).ready(function(){
	$("select").change(function(){
		$(this).finnd("option:selected").each(function(){
			if($(this).attr("value")=="individual"){
				$(".row").not("#individual").hide();
				$("#individual").show;
			}
			else if($(this).attr("value")=="corporate"){
				$(".row").not("#corporate").hide();
				$("#corporate").show;

			}
			else {
				$(".row").hide();
			}
		});

	}).change();
		
})