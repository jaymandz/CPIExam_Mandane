@extends('base')

@section('body')
<div class="mb-3">
    <a href="posts/index" class="btn btn-secondary">
        View all posts
    </a>
    <button class="btn btn-primary" form="postForm" type="submit">
        Save
    </button>
</div>

<div class="card">
<div class="card-body">

<form id="postForm" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Title</label>
        <input required class="form-control" name="title" placeholder="Title" type="text">
    </div>
    <div class="mb-3">
        <label class="form-label">Details</label>
        <textarea required class="form-control" name="details" placeholder="Details" rows="5"></textarea>
    </div>
</form>

</div>
</div>
@endsection
