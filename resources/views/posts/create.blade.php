@extends('layouts.app')
@section('content')
    
<div class="mb-10" style="border-top-style: solid;border-top-width: 0px;margin-top: 20px;">
        <h2>Create a Blog Post</h2>
        <form method="POST" action="{{route('posts.store')}}">
            @csrf
            <!-- Title Input -->
            <div class="mb-10">
                <label for="blogTitle" class="form-label">Title</label>
                <input name= "title"type="text" class="form-control" id="blogTitle" placeholder="Enter blog title">
            </div>

            <!-- Description Input (using textarea for more space) -->
            <div class="mb-3">
                <label for="blogDescription" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="blogDescription" rows="4" placeholder="Enter blog description"></textarea>
            </div>

            <!-- Creator Name Input -->
            <div class="mb-3">
                <label for="creatorName" class="form-label">Creator Name</label>
                <select name="postcreator" class="form-control" id="creatorName">
                    <option value="" disabled selected>Select a creator</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        @endsection