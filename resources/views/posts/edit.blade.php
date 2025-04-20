@extends('layouts.app')
@section('content')
    
<div class="mb-10" style="border-top-style: solid;border-top-width: 0px;margin-top: 20px;">
        <h2>Create a Blog Post</h2>
        <form  method="POST" action="{{ route('posts.update',$post->id)}}">
            @csrf
            @method('PUT')
            <!-- Title Input -->
            <div class="mb-10">
                <label for="blogTitle" class="form-label">Title</label>
                <input name= "title"type="text" value="{{$post->title}}" class="form-control" id="blogTitle" placeholder="Enter blog title">
            </div>

            <!-- Description Input (using textarea for more space) -->
            <div class="mb-3">
                <label for="blogDescription" class="form-label">Description</label>
                <textarea name="description" class="form-control"  rows="4" >{{$post->description}}</textarea>
            </div>

            <!-- Creator Name Input -->
            <div class="mb-3">
                <label for="creatorName" class="form-label">Creator Name</label>
                <select name="postcreator" class="form-control" id="creatorName">  
                    <option value="" disabled>Select a creator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" 
                            {{ $user->id == $post->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <button type="edit" class="btn btn-primary">Update</button>
        </form>
    </div>
        @endsection