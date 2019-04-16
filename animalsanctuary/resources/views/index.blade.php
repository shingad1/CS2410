<!DOCTYPE html>
<!-- The index page of the website - this is the page that informs the user about the animal sanctuary service -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Aston Animal Sanctuary | Welcome </title>
    <link rel="stylesheet" href="./css/layout.css">
  </head>

  <body>
<!-- Include the layouts css file -->
    @include ('layouts.app')


    <!-- The image showcase area -->
    <section id= "showcase">
      <div class="container">
          <h1> Adopt an animal today </h1>
          <p>  With our expertise, you'll find the perfect pet. </p>
      </div>
    </section>
<!-- Display the benefits of the service -->
    <section id="benefits">
      <div class="container">
        <div class="box">
          <img src="{{ asset('images/lion.png') }}">
          <h3> We have all sorts of animals </h3>
          <p> Lions, monkeys, ants - you name it, we have it. </p>
          </div>
          <div class="box">
            <img src="{{ asset('images/cat.png') }}">
          <h3> All of our animals are vaccinated </h3>
          <p> So that you don't catch anything nasty from your animal. </p>
          </div>
          <div class="box">
            <img src="{{ asset('images/turtle.png') }}">
          <h3> View our animals  </h3>
          <p> Updated everyday, you'll surely find your favourite animal with us. </p>
          </div>
      </div>
    </section>

    <!-- The footer -->
    <footer>
      <h3> Aston Animal Sanctuary. © Devin Shingadia 2019 </h3>


  </body>
</html>
