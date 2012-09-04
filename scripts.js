$(document).ready(function(){
	var errors = 0; //indicate if errors exist
	var max_size = 1048576;

	$('#submit').click(function(){
		$('input[type=file]').each(function(){

			if(typeof this.files[0] === "object"){
				var file = this.files[0];
				name = file.name;
			    size = file.size;
			    type = file.type;
			    if(size > max_size){
			    	errors = 1;
			    }
			}
		    else{
			  	errors = 1;
		    }
		   
		});

		if(errors == 1){
			alert("Cant be upload check the files")
		}
		else{
			$("form").submit();
		}
	});
	
});