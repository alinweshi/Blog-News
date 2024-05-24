$(document).ready(function() {
  // Listen for tab clicks
  $(".nav-tabs a").click(function() {
    // Get the tab id
    var tabId = $(this).attr("data-tab");

    // Show the tab content
    $("#" + tabId).addClass("show active");
    $("#" + tabId).siblings().removeClass("show active");
  });
});