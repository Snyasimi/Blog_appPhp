@extends('layout.layout')

@section('content')
	<main>

		<H1><header>Blogger</header></H1>

		<hr>

		<form action="{{ route('login')}}" method="POST" cellpadding="50px">
   			@csrf
			<table>
                <tr>
                    <th>Login</th>
                </tr>


				<tr>
					<td><label for="Email">Email Address</label></td>
					<td><input type="text" name="email" required /></td>
				</tr>
				<tr>
					<td><label for="password">Password</label></td>
					<td><input type="password" required name="password"></td>
				</tr>
				
				<tr>
					<td><button type="submit">Login</button></td>
					<td><button type="clear" value="clear">Clear</button></td>
				</tr>
				
			</table>

	</main>
@endsection
