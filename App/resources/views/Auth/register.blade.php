@extends('layout.layout')
@section('content')
	<main>

		<H1><header>Blogger</header></H1>

		<hr>

		<form action="{{route('register')}}" method="POST" cellpadding="50px">
   			@csrf
			<table>
                <tr>
                    <th> Sign up</th>
                  
                </tr>
				<tr>
					<td><label for="name">Name</label></td>
					<td><input type="text" required name ="name" /></td>
				</tr>

				<tr>
					<td><label for="Email">Email Address</label></td>
					<td><input type="text" name="email" required /></td>
				</tr>
				<tr>
					<td><label for="password1">Password</label></td>
					<td><input type="password" required name="password"></td>
				</tr>
				<tr>
					<td><label for="password2">Confirm Password</label></td>
					<td><input type="password" name="password_confirmation" required ></td>
				</tr>
				<tr>
					<td><button type="submit">Sign Up</button></td>
					<td><button type="clear" value="clear">Clear</button></td>
				</tr>
				
			</table>

	</main>
@endsection