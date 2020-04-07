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
});