@extends('layout.layout')
@section('content')
		<main>
			<H1>Blogger</H1>
				<hr>
			<div><img src="#" width="150px"></div>
				<hr>



			<section>
				<h2>{{ $user->name }}</h2>
				
				<br>

				<table>
					<tr>
						<th>Blogs</th>
					</tr>
					<tr>
					<td>{{ $blogs }}</td>
					</tr>
			</section>

                	<article>
		        	<h2>ABOUT</h2>
			
			       {{-- <p>{{$about}}</p> --}}
                        </article>
@endsection






				
