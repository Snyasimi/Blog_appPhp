@extends('layout.layout')
@section('content')
		<main>

			<h1>Create Blog</h1>
			<hr>
			
		<form method="POST" action={{route('blog.store')}}>
		@csrf
		
 			<p>
				<label for="Title">Title:</label>
				<input type="text" required  name="title" >
			</p>
                        <p><small>Describe your post</small></p>

			<p>
				<label for="Description">Description</label>
				<input type = "text"  name="description" >
			
			</p>


			<p>
				<label for="blog_body">BLOG</label>
				<textarea name="blog_body" rows="20" cols ="50" ></textarea>	
			</p>

			<p> 
				<Button type="submit">Post</button>
				<button type="clear">Reste</button>
			</p>
		</form>		

		</main>
	@endsection

