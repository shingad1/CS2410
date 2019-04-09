<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Aston Animal Sanctuary | Welcome </title>
    <link rel="stylesheet" href="./css/layout.css">
  </head>

  <body>
    @include ('layouts.app')

    <!-- The image showcase area -->
    <section id= "showcase">
      <div class="container">
          <h1> Adopt an animal today </h1>
          <p>  Returned pets will be put down! </p>
      </div>
    </section>

    <section id="benefits">
      <div class="container">
        <div class="box">
          <img src="{{ asset('images/logo_css.png') }}">
          <h3> We have all sorts of animals </h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
          </div>
          <div class="box">
            <img src="{{ asset('images/logo_html.png') }}">
          <h3> All of our animals are vaccinated </h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
          </div>
          <div class="box">
            <img src="{{ asset('images/logo_css.png') }}">
          <h3> View our online listings.  </h3>
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
          </div>
      </div>
    </section>


    <!-- The footer -->
    <footer>
      <h3> Aston Animal Sanctuary. © Devin Shingadia 2019 </h3>


  </body>
</html>
