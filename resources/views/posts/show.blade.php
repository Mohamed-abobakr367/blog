@extends('layouts.app')
@section('content')
<div class="mt-4">
  <div class="text-center">
    <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
  </div>
</div>

        <div class="card" style="margin-top: 10px;">
            <h5 class="card-header">{{ $post->title }}</h5>
            <div class="card-body">
                <h5 class="card-title">Created by :{{ $post->user?$post->user->name:'not found' }}</h5>
                  <p class="card-text">Created at :{{$post->created_at}}</p>
                  <p class="card-text">description :{{$post->description}}</p>
                  
                    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

          <div class="card">
              <h5 class="card-header">Info</h5>
                <div class="card-body">
                  <h5 class="card-title">Creator:{{ $post->user?$post->user->name:'not found' }}</h5>
                    <p class="card-text">Created At:{{ $post->user?$post->user->created_at:'not found' }}</p>
                      <p class="card-text">Email:{{ $post->user?$post->user->email:'not found' }}</p>
              
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          @endsection