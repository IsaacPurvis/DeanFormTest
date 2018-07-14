<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<style>

#loading-img{
display:none;
}

.response_msg{
margin-top:10px;
font-size:13px;
background:#E5D669;
color:#ffffff;
width:250px;
padding:3px;
display:none;
}

.parent2ClassLabel{
	margin-left:10px;
}

</style>
</head>
<body>

<div class="container">
<div class="row">

<div class="col-md-8">
<h1><img src="Inquiry.png" width="80px">DeanTestForm | Driver Program 0.1</h1>
<form name="contact-form" action="SaveToDB.php" method="post" id="contact-form">

	<div class="form-group">

	<div class="checkbox">
		<label for="parent_3" class="" ><input id = "parent_3" type="checkbox" class="inputCheck parent1Class " name="Parent_3_Array[]" value="Drainage"  checked> Drainage</label>
		</div>
		<div class="checkbox">
		<label for="parent_3" class="parentLabel3 parent2ClassLabel childOfParent3 " ><input id = "parent_3_2" type="checkbox" class="inputCheck parent2Class childOfParent3 " name="Parent_3_Array[]" value="parent_3_2" checked>$5,000 Creating Swale(s) to Drain Water</label>
		</div>
		<div class="checkbox">
		<label for="parent_3" class="parentLabel3 parent2ClassLabel childOfParent3 " ><input id = "parent_3_3" type="checkbox" class="inputCheck parent2Class childOfParent3 " name="Parent_3_Array[]" value="parent_3_3" checked>$10,000 Inlet Pipe(s) Install with Drop in Grate</label>
		</div>
		<div class="checkbox">
		<label for="parent_3" class="parentLabel3 parent2ClassLabel childOfParent3 " ><input id = "parent_3_4" type="checkbox" class="inputCheck parent2Class childOfParent3 " name="Parent_3_Array[]" value="parent_3_4" checked>$5,000Light Duty Underground Drainage System w/Inlet Boxes &amp; Under Ground Pipe - via Gravity</label>
		</div>
		<div class="checkbox">
		<label for="parent_3" class="parentLabel3 parent2ClassLabel childOfParent3 " ><input id = "parent_3_5" type="checkbox" class="inputCheck parent2Class childOfParent3" name="Parent_3_Array[]" value="parent_3_5" checked>$10,000 Severe Duty Underground Drainage System w/Inlet Boxes &amp; Under Ground Pipe - via Gravity</label>
	</div>

	<div class="form-group">
		<label for="comments">Comments</label>
		<textarea name="Parent_3_Array[]" class="form-control" rows="1" cols="28" placeholder="Comments"></textarea> 
	</div>

	<button type="submit" class="btn btn-primary" name="submit" value="Submit" id="submit_form">Submit</button>
	<img src="img/loading.gif" id="loading-img">
</form>

<div class="response_msg"></div>
</div>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>





<script>
$(function() {
  
  // Get the form fields and hidden div
  var checkbox = $(".trigger");
  var hidden = $(".hidden");
  var parent_3 = $("#parent_3");
  var parentChildren_3 = $(".childOfParent3")

  
  // Hide the fields.
  // Use JS to do this in case the user doesn't have JS 
  // enabled.
  hidden.hide();
  
  // Setup an event listener for when the state of the 
  // checkbox changes.
  parent_3.change(function() {
    // Check to see if the checkbox is checked.
    // If it is, show the fields and populate the input.
    // If not, hide the fields.
    if (parent_3.is(':checked')) {
      // Show the hidden fields.
      parentChildren_3.show();
    } else {
      // Make sure that the hidden fields are indeed
      // hidden.
      parentChildren_3.hide();
      
      // You may also want to clear the value of the 
      // hidden fields here. Just in case somebody 
      // shows the fields, enters data to them and then 
      // unticks the checkbox.
      //
      // This would do the job:
      //
      // $("#hidden_field").val("");
    }
  });
});




</script>
	<!--
<script>
$(document).ready(function(){
	$("#contact-form").on("submit",function(e){
		e.preventDefault();
		if($("#contact-form [name='your_name']").val() === ''){
			$("#contact-form [name='your_name']").css("border","1px solid red");
		}
		else if ($("#contact-form [name='your_email']").val() === ''){
			$("#contact-form [name='your_email']").css("border","1px solid red");
		}
		else
		{
			$("#loading-img").css("display","block");
			var sendData = $( this ).serialize();
			$.ajax({
				type: "POST",
				url: "get_response.php",
				data: sendData,
				success: function(data){
					$("#loading-img").css("display","none");
					$(".response_msg").text(data);
					$(".response_msg").slideDown().fadeOut(3000);
					$("#contact-form").find("input[type=text], input[type=email], textarea").val("");
				}	
			});
		}
	});

	$("#contact-form input").blur(function(){
		var checkValue = $(this).val();
		if(checkValue != ''){
		$(this).css("border","1px solid #eeeeee");
		}
	});
});
</script>
-->
</body>
</html>