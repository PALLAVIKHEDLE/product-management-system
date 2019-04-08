$(document).ready(function(){
	//btn click
	$("#addproduct").click(function(e){
		e.preventDefault();
		var category = $("#category option:selected").val();
		var subcategory = $("#subcategory option:selected").val();
		var product_name = $("#name").val();
		var product_price = $("#price").val();
		var product_brand = $("#brand").val();
		var product_details = $("#detail").val();
		var product_image = $("#image").val();
		
  		
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

		//product name
		if(product_name=="") {
			$("#name").css('border-color', 'red');
			$("#nameErr").text("Enter Name").css('color','red');
			status=false;
		}else {
			$("#name").css('border-color', '');
			$("#nameErr").text("").css('color', '');
		}
		//product price
		if(product_price=="") {
			$("#price").css('border-color', 'red');
			$("#priceErr").text("Enter Price").css('color','red');
			status=false;
		}else {
			$("#price").css('border-color', '');
			$("#priceErr").text("").css('color', '');
		}

		//product brand
		if(product_brand=="") {
			$("#brand").css('border-color', 'red');
			$("#brandErr").text("Enter Brand").css('color','red');
			status=false;
		}else {
			$("#brand").css('border-color', '');
			$("#brandErr").text("").css('color', '');
		}

		//product details
		if(product_details=="") {
			$("#detail").css('border-color', 'red');
			$("#detailErr").text("Enter Details").css('color','red');
			status=false;
		}else {
			$("#detail").css('border-color', '');
			$("#detailErr").text("").css('color', '');
		}

		//product image
		if(product_image=="") {
			$("#image").css('border-color', 'red');
			$("#imageErr").text("Please Insert Image").css('color','red');
			status=false;
		}else {
			$("#image").css('border-color', '');
			$("#imageErr").text("").css('color', '');
		}
		
		
		if(status==true) {
		$("#insertform").submit();
        }
//success
	});
	//ready function
});
