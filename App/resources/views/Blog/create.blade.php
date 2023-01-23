@extends('layout.layout')
@section('content')
		<main>

			<h1>Create Blog</h1>
			<hr>
			
		<form method="POST" action={{route('blog.store')}}>
		@csrf

		@if($errors->any())
		@foreach($errors->all() as $error)
			<table>
				<tr>
					<td>{{$error}}</td>
				</tr>
			</table>
			@endforeach
		@endif
 			<p>
				<label for="Title">Title:</label>
				<input type="text" required  name="title" >
			</p>
                        <p><small>Describe your post</small></p>

			<p>
				<label for="Description">Description</label>
				<input type = "text" required  name="description" >
			
			</p>


			<p>
				<label for="blog_body">BLOG</label>
				<textarea id="blog_body" name="blog_body" required rows="20" cols ="50" ></textarea>	
			</p>

			<p> 
				<button type="submit">Post</button>
				<button type="clear">Reste</button>
			</p>
		</form>		

		</main>
	@endsection

