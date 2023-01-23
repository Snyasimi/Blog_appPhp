<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#blog_body'
      });

    </script>
    <title>Blogger</title>

    <style>
    
      ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgba(17, 81, 255, 0.993);
}

li {
  float:right;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: rgb(26, 1, 165);
}

header{
 
  color:lightblue;
}
      </style>

   
  </head>

  <body>
  
  <nav>
			<ul>
				<li><a href="{{ route('blog.index') }}">Home</a></li>
                <li><a href="{{ route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Sign up</a></li>
				@auth
				<li><a href="{{ route('blog.create') }}">New blog</a></li> 
				<li><a href="{{ route('logout') }}">Log out</a></li> 
				<li><a href="{{ route('profile.index') }}">Profile</a></li> 
				@endauth
			</ul>
		</nav>
    <header>
      <H1>Blogger</H1>
    </header>
 @yield('content')
</body>
</html>
