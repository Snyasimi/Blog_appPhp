@extends('layout.layout')
@section("content")

    <Form action="{{ route('blog.update',$blog->id) }}" method="POST">
        @csrf
        @method('PUT')
     <p>
        <label>
            BLOG TITLE
            <p><input type="text" name="blog_title" value="{{$blog->blog_title}}" required ></p>
        </label>
    </p>
    <p>
        <label>
            BLOG DESCRIPTION
            <p><input type="text" required value="{{$blog->blog_description}}" name="blog_description"></p>
        </label>
    </p>
    <p>
        <label>
            BLOG BODY
            <p><textarea name="blog_body"  id="blog_body" required >{{$blog->blog_body}}</textarea></p>
        </label>
    </p>
    <p>
        <button type="submit">Done</button>
        <button type="reset"  >Clear</button>
    </p>
</form>

@endsection
