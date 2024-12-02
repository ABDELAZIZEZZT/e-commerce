<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{asset("assets/c/style.css")}} />
    <link rel="stylesheet" href={{asset("assets/c/mobile.css")}} media="(max-width: 1100px)" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      />
</head>
<body>
    <header class="header">
        <div class="logo">
          <a href="/"><h2>ZTECH</h2></a>
        </div>
        <form action={{route('products.search')}} method="post">
            @csrf
            <input id="search" name="search" type="text" placeholder="Search...." />
            <input  type="submit" value="search" />
        </form>

        <ul>
          <li class="main-list">
            <a class="main-links" href="/">home</a></li>
          <li class="main-list">
            <a class="main-links" href="/product">products</a>

          <li class="main-list"><a class="main-links" href="/orders">orders</a></li>
          <li class="main-list"><a class="main-links" href="/about">about</a></li>
          <li class="main-list"><a class="main-links" href="/contact">contact</a></li>
          @if (auth()->user()!=null)
            @if (auth()->user()->role=='admin')
            <li class="main-list"><a class="main-links" href="/admin">admin</a></li>

            @endif

          @endif

          <li class="user-icon">
              <a href="/profile">
                <i class="fas fa-user-group"> </i>
              </a>
              @if (auth()->user()==null)

                 <div class="container-tap1">

                     <p>Login Or Register First!</p>
                     <form action={{route("login.view")}} method="GET">
                         <button class="login-btn">login</button>
                      </form>
                      <form action={{route("register.view")}} method="GET">
                         <button class="register-btn">register</button>
                      </form>
                  </div>

              @endif

          </li>
          <li class="user-icon-shop">
            <a href="/cart">
              <i class="fa fa-shopping-cart"></i>
            </a>
          </li>
        </ul>
      </header>



    <main>
        @yield('content')
    </main>


        <footer class="footer">

            <section class="grid">

              <div class="box">
                <h3>Extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i> Login</a>
                <a href="#"> <i class="fas fa-angle-right"></i> Register</a>
                <a href="#"> <i class="fas fa-angle-right"></i> Cart</a>
                <a href="#"> <i class="fas fa-angle-right"></i> Orders</a>
              </div>

              <div class="box">
                <h3>Contact Us.</h3>
                <a href="#"><i class="fas fa-phone"></i> +20 10586347</a>
                <a href="#"><i class="fas fa-phone"></i> +20 10586347</a>
                <a href="#"><i class="fas fa-envelope"></i> ztechphone@main.com</a>
                <a href="#"><i class="fas fa-map-marker-alt"></i> Menofia-Shebin-elkome </a>
              </div>

              <div class="box">
                <h3>Follow Us</h3>
                <a href="https://www.facebook.com/harshchaudharynp" target="_blank"><i
                    class="fab fa-facebook-f"></i>facebook</a>
                <a href="#" target="_blank"><i class="fab fa-twitter"></i>Twitter</a>
                <a href="#" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="#" target="_blank"><i class="fab fa-linkedin"></i>Linkedin</a>
              </div>

            </section>


            <script src="{{asset("assets/c/main.js")}}"></script>
            <script src="{{asset("assets/js/jquery-3.7.1.js")}}"></script>

    </footer>
</body>
</html>


