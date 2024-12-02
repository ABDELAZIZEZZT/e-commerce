
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>dash bord</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <link rel="stylesheet" href={{asset('assets/c/dash_bord/index.css')}} />
  </head>
  <body>
    <div class="menu">
      <ul>
        <li class="profile">
          <h2>{{auth()->user()->name}}</h2>
        </li>
        <li>
          <a class="active" href="/admin">
            <i class="fas fa-home"></i>
            <p>Dash Bord</p>
          </a>
        </li>

        <li>
          <a href="/admin/product">
            <i class="fas fa-table"></i>
            <p>Products</p>
          </a>
        </li>
        <li>
            <a href="/admin/categories">
              <i class="fas fa-table"></i>
              <p>categories</p>
            </a>
          </li>


        <li>
          <a href="admin/message">
            <i class="fas fa-message"></i>
            <p>Messages</p>
          </a>
        </li>
        <!-- <li>
          <a href="">
            <i class="fas fa-cog"></i>
            <p>Settings</p>
          </a>
        </li> -->

        <li class="log-out">
          <a href="/">
            <i class="fas fa-sign-out"></i>
            <p>log out</p>
          </a>
        </li>
      </ul>
    </div>


        @yield('content')


</body>
</html>
