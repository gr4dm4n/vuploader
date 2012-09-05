$(document).ready(function(){
	var errors = 0; //indicate if errors exist
	var max_size = 1048576;
	var default_types = Array('image/jpg','image/jpeg','image/png','image/gif');
	var error_log1 = "";
	var error_log2 = "";
	var error_log3 = "";

	$('#submit').live("click", function(){
		$('input[type=file]').each(function(){
			var attr_val = $(this).attr('id');
			if(typeof this.files[0] === "object"){
				var file = this.files[0];
				name = file.name;
			    size = file.size;
			    type = file.type;
			    if(size > max_size){
			    	errors = 1;
			    	error_log1 = error_log1+"file over max size "+name+" ";
					 $(this).val('');
			    }
			    if($.inArray(type,default_types) == -1){
			    	errors = 1;
			    	error_log1 = error_log1+"only images allowed "+name+" ";
					$(this).val('');
			    }
			}
		    else{
			  	errors = 1;
			  	error_log2 = "Files input empty ";  	
		    }
		   
		});

		if(errors == 1){
			alert("Cant be upload check the files>> "+error_log1+error_log2+error_log3);
			errors = 0;
		}
		else{
			errors = 0;
			$("form").submit();
			
		}
	});
	
});