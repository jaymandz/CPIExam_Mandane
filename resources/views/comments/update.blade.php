@extends('base')

@section('body')
<div class="mb-3">
    <a href="/posts/view/{{ $comment->post_id }}" class="btn btn-secondary">
        <span class="bi bi-arrow-90deg-left"></span>
        View post
    </a>
    <button class="btn btn-primary" form="commentForm" type="submit">
        <span class="bi bi-save"></span>
        Save
    </button>
</div>

<div class="card">
<div class="card-body">

<form id="commentForm" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Details</label>
        <textarea required class="form-control" name="details" placeholder="Details" rows="5">{{ $comment->details }}</textarea>
    </div>
</form>

</div>
</div>
@endsection
