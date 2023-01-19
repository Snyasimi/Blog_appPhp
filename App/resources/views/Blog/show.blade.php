@extends('layout.layout')
@section('content')
		<main>
		
		<h1>BLOGGER</h1>
			<hr>

			<article>
				<h2>{{$blog->blog_title}}</h2>
				<h3>{{$blog->blog_description}}</h3>

				<p>{{$blog->blog_body}}</p>
			</article>

			<p>Visit the <a href="{{ route('profile.show',$blog->user->id ) }}">Authors</a> profile</p>


			@if($comments)
			<table border="2px">
				<tr>
					<th>Comments</th>
					<th>likes</th>
                </tr>
				@foreach($comments as $comment)
				<tr>
					<td>
						<u><a href="{{ route('profile.show',$comment->user->id)}}">{{ $comment->user->name }}</a></u><br>
						{{ $comment->comment }}<br>
					</td>
					<td>{{ $comment->likes }}</td>
				</tr>
				@endforeach
			</table>
			@endif


			<p><small>Login to comment</p>
            <section>
				@auth
				<form method="POST" action="{{ route('comments.update',$blog->id) }}">
					@csrf
					@method("PUT")
					<label for="comment">leave a comment
						<textarea rows="3" cols="15" placeholder="comment" name="comment"></textarea>
					</label>
					<label for="like">Like
						<input type="radio" value="Like" name="like_radio"/>
					</label>
					<label for="like">Dislike
						<input type="radio" value="Dislike" name="like_radio"/>
					</label>
				<p>
					<button type="Submit">Comment</button>
				</p>
				</form>

			</section>
			@endauth

		</main>
@endsection