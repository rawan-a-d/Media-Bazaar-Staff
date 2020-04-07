/* If shift is succefully proposed */
if($('#message').val() == "Success"){
	$(".notify").css("background-color", "#5dd1aa");
	$(".notify").toggleClass("active");
	$("#notifyType").toggleClass("success");
	  
	setTimeout(function(){
		$(".notify").removeClass("active");
		$("#notifyType").removeClass("success");
	},2000);
}

/* If user has a shift on that day */
else if($('#message').val() == "Failure") {
	$(".notify").css("background-color", "#da7654");
	$(".notify").addClass("active");
	$("#notifyType").addClass("failure");
  
  	setTimeout(function(){
		$(".notify").removeClass("active");
		$("#notifyType").removeClass("failure");
	},2000);
}

/* If selected shift is full */
else if($('#message').val() == "Full") {
	$(".notify").css("background-color", "#da7654");
	$(".notify").addClass("active");
	$("#notifyType").addClass("full");

	setTimeout(function(){
		$(".notify").removeClass("active");
		$("#notifyType").removeClass("full");
	},2000);
}