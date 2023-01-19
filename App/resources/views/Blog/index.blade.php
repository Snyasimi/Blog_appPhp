@extends('layout.layout')
@section('content')
		<H1>BLOGS</H1>
			<hr>

		<main>

			<table cellpadding="15px" border>
			
				
			@foreach($blogs as $blog)
				<tr>
					<td>
						
						{{ $blog->blog_title }}<br>
						<a href="{{ route('blog.show',$blog->id)}}">{{ $blog-> blog_description }}</a>
					</td>
				</tr>

			@endforeach



			</table>

		</main>
@endsection	

	

