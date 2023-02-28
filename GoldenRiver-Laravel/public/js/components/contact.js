$(document).ready(function() {
    $('#contact-form').submit(function(event) {
      event.preventDefault();
  
      var name = $('#name').val();
      var email = $('#email').val();
      var message = $('#message').val();
  
      if (!name || !email || !message) {
        $('#form-message').html('<p>Please fill out all fields.</p>');
      } else {
        $('#form-message').html('<p>Thank you for your message! We will get back to you soon.</p>');
      }
    });
  });
  