@extends('layouts.app')
@section('content')
@section('title')
index 
@endsection
<div class="mt-4">
    <div class="text-center">
      <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
    </div>
  </div>
    <table class="table mt-4 ms-5" style="border-top-style: solid;border-top-width: 5px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">post_creator</th>
                <th scope="col">Create At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                {{-- <td>{{ $post->created_by }}</td> --}}
                <td>{{ $post->user?$post->user->name:'not found' }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <div class="button-group">
                        <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-info">view</a>
                        <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-primary">Edit</a>   
                        <form style="display: inline;" method="POST" action="{{route('posts.destroy', $post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form> 

                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection