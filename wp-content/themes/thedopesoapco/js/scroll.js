var easing, e, pos;
jQuery(function($){
	// Get the click event
  $("#go-top").on("click", function(){
	 
    // Get the scroll pos
    pos= $(window).scrollTop();
    
    // Set the body top margin
    $("body").css({
      "margin-top": -pos+"px",
      "overflow-y": "auto", // This property is posed for fix the blink of the window width change 
    });
    // Make the scroll handle on the position 0
    $(window).scrollTop(0);
    // Add the transition property to the body element
    $("body").css("transition", "all 1s cubic-bezier(1.000, -0.560, 0.000, 1.455)");
    // Apply the scroll effects
    $("body").css("margin-top", "0");
    // Wait until the transition end
    $("body").on("webkitTransitionEnd transitionend msTransitionEnd oTransitionEnd", function(){
      // Remove the transition property
      $("body").css("transition", "none");
    });
  });
});