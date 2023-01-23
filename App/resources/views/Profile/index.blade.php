@extends('layout.layout')
@section('content')
		<main>
			
			<div><img src="#" width="150px"></div>
				<hr>



			<section>
				<h2>{{ $user->name }}</h2>
				
				<br>

				<table cellpadding="15px">
					<tr>
						<th>Blogs</th>
                        
					</tr>
                    @foreach( $user->blogs as $blog)
					<tr>
                    <td>{{ $loop->iteration }}</td>
					<td>{{ $blog->blog_title }}</td>
                    <td>{{ $blog->likes }}</td>


                    @can('delete',$blog)
                    <td>
						<form action ="{{ route('blog.destroy',$blog->id) }}" method="POST">
							@csrf
							@method('DELETE')
							<input type="submit" value="DELETE"/>
						</form>
					</td>
				    <td>
						<form action ="{{ route('blog.edit',$blog->id) }}" method="GET">
							
							<input type="submit" value="EDIT"/>
						</form>
					
					</td>

                    @endcan
					</tr>
                    @endforeach
			</section>

                	<article>
		        	<h2>ABOUT</h2>
			
			       {{-- <p>{{$about}}</p> --}}
                        </article>
@endsection






				
