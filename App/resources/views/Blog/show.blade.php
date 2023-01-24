@extends('layout.layout')
@section('content')
		<main>
		
	

			<article>
				<h2>{{$blog->blog_title}}</h2>
				<h3>{{$blog->blog_description}}</h3>

				<p>{!!$blog->blog_body!!}</p>
			</article>

			<p>Visit the <a href="{{ route('profile.show',$blog->user->id ) }}">Authors</a> profile</p>


			@if($comments)
			<table  cellpadding="15px" border="1px">
				<tr>
					<th>Comments</th>
					<th>likes</th>
                </tr>
				@foreach($comments as $comment)
				<tr>
					<td>
						<u><a href="{{ route('profile.show',$comment->user->id)}}">{{ $comment->user->name }}</a></u><br>
						{{ $comment->comment }}<br><br>
						

						{{--REPLY TO THE PARENT --}}
						<form action="{{ route('commentreply',$comment->id )}}" method="POST">
							@csrf
							<textarea name="reply" placeholder="reply to this comment"></textarea>
							<button type="submit"><b>Reply</b></button>
						</form>
						
						{{-- REPLIES ARE INSERTED HERE ---}}
						@if($comment->reply)
						

							@foreach($comment->reply as $reply)

							    <u>{{$reply->user->name}}</u><br>

								<small><p>{{$reply->comment}}</p></small><br>

									{{--REPLY TO THE CHILDREN COMMENTS--}}
									<form action="{{ route('commentreply',$reply->id )}}" method="POST">
										@csrf
										<textarea name="reply" placeholder="reply to {{$reply->user->name}}'s reply"></textarea>
										<button type="submit">Reply</button>
									</form>

								@foreach($replies as $rp)
									@if($rp->ParentComment == $reply->id)
										<small><u>{{$rp->user->name}}</u><br></small>
										<small>{{ $rp->comment }}</small><br>

									<form action="{{ route('commentreply',$rp->id )}}" method="POST">
												@csrf
										<textarea name="reply" placeholder="reply to {{$rp->user->name}}'s reply"></textarea>
										<button type="submit">Reply</button>
									</form>

									@endif
								@endforeach

									
								


							@endforeach
						@endif
						{{-- ENDS HERE --}}


					</td>
					<td>{{ $comment->likes }}</td>
					<td>
						

					</td>


					@can('delete',$comment)
					    <td>
							<form action="{{route('comments.destroy',$comment->id)}}" method="POST">
								@csrf
							@method('DELETE')

							<input type="submit" value="DELETE" />
							
							</form>
						
						</td>

					@endcan


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
						<input type="radio" value="true" name="like_radio"/>
					</label>
					<label for="like">Dislike
						<input type="radio" value="fe" name="like_radio"/>
					</label>
				<p>
					<button type="Submit">Comment</button>
				</p>
				</form>

			</section>
			@endauth

		</main>
@endsection