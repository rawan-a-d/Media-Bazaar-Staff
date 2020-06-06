/* Add classes to indicate status of shift */
$(function(){
	var element = $( ".box:contains('Assigned')" );
	if(element){
		element.addClass("assigned");
	}

	var propsedElement = $( ".box:contains('Proposed')" );
	if(propsedElement){
		propsedElement.addClass("proposed");
	}

	var cancelledElement = $( ".box:contains('Cancelled')" );
	if(cancelledElement){
		cancelledElement.addClass("cancelled");
	}

	var cancelledElement = $( ".box:contains('Accepted')" );
	if(cancelledElement){
		cancelledElement.addClass("accepted");
	}

	var cancelledElement = $( ".box:contains('Rejected')" );
	if(cancelledElement){
		cancelledElement.addClass("rejected");
	}
});


$(function(){
	/* Show/Hide Accept Reject button */
	var showButtons = $("#showButtons");
	var acceptButton = $(".accept");
	var rejectButton = $(".reject");

	showButtons.click(function(){
		acceptButton.css("display", "inline-block");
		acceptButton.css("visibility", "visible");

		rejectButton.css("visibility", "visible");
		rejectButton.css("display", "inline-block");
	});
});
