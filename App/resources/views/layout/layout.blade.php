<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogger</title>
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
 @yield('content')
</body>
</html>
