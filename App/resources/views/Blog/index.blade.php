@extends('layout.layout')
@section('content')


		<main>

			<table cellpadding="15px" border="1px solid black"  >
			
				
			@foreach($blogs as $blog)
				<tr>
					<td>
						<small>{{$blog->user->name}}</small><br><hr>
						{{ $blog->blog_title }}<br>
						<a href="{{ route('blog.show',$blog->id)}}">{{ $blog-> blog_description }}</a>
						
					</td>
					<td>{{ $blog->likes }}</td>
				</tr>

			@endforeach



			</table>

		</main>
@endsection	

	

