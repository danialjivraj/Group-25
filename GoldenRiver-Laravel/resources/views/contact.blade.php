@extends('partials.nav')

@section('title')
<title>Contact Us</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/contact.css')}}">
@endsection


@section('body')
  <body>
    <main>
      <div class="content">
        <h1>Contact Us</h1>
        <p>We would love to respond to your queries. Feel free to get in touch with us.</p>
        <form action="https://formsubmit.co/9d133ab3b5c828270395c3afda9ab271" method="POST">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>

          <label for="message">Message</label>
          <textarea id="message" name="message" required></textarea>

          <input type="submit" id= "submit-btn" value="Send">
        </form>
      </div>
      <div class="reach-us">
        <p><strong>Reach Us</strong></p>
        <p>Email: info@goldenriver.com</p>
        <p>Phone: +44 123 456 7890</p>
        <p>For general queries, visit our <a href="faq"><u>FAQ</u></a> page.</p>

    </main>
  </body>

  @endsection
</html>


<!-- USE THE FOLLOWING ALERT IF U LIKE - Made by Faraz -->
<!--<script>

var alertButton = document.getElementById("submit-btn");
alertButton.addEventListener("click", function() {
  confirm("Click yes to submit your query");
});

</script> -->


