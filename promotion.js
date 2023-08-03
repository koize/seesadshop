$(document).ready(function() {

  // Create a Carousel object
  var carousel = new Carousel({
      data: promotions
  });

  // Mount the carousel on the page
  carousel.mount('#carousel');

  // Add a new promotion
  $("#add-promotion").on("submit", function(e) {
      e.preventDefault();

      // Get the form data
      var name = $("#name").val();
      var image = $("#image").val();
      var start_date = $("#start_date").val();
      var end_date = $("#end_date").val();

      // Add the promotion to the database
      $.ajax({
          url: "/add-promotion.php",
          type: "POST",
          data: {
              name: name,
              image: image,
              start_date: start_date,
              end_date: end_date
          },
          success: function() {
              // Reload the carousel
              carousel.reload();
          }
      });
  });

});