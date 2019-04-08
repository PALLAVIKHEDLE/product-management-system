$(document).ready(function(){
	//btn click
	$("#listproduct").click(function(e){
		e.preventDefault();
		var category = $("#category option:selected").val();
		var subcategory = $("#subcategory option:selected").val();
		
  		
		var status=true;

		//category
		 if(category=="") {
			$("#category").css('border-color', 'red');
			$("#categoryErr").text("Please Select One").css('color','red');
			status=false;
		}else {
			$("#category").css('border-color', '');
			$("#categoryErr").text("").css('color', '');
		}

		//subcategory
		 if(subcategory=="") {
			$("#subcategory").css('border-color', 'red');
			$("#subcatErr").text("Please Select One").css('color','red');
			status=false;
		}else {
			$("#subcategory").css('border-color', '');
			$("#subcatErr").text("").css('color', '');
		}

	
		
		if(status==true) {
		$("#showpro").submit();
        }
//success
	});
	//ready function
});
