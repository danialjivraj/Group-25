@extends('partials.nav')

@section('title')
<title>Contact Us</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')
  <body>
    <main>
      <div class="content">
        <h1>Contact Us</h1>
        <p>We would love to respond to your queries. Feel free to get in touch with us.</p>
        <form action="#">
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
        <p>Email: info@jewellerystore.com</p>
        <p>Phone: +1 123 456 7890</p>
      </div>
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


