@extends('base')

@section('body')
<div class="mb-3">
    <a href="/posts/index" class="btn btn-secondary">
        <span class="bi bi-arrow-90deg-left"></span>
        View all posts
    </a>
    <a href="/comments/add_for/{{ $post->id }}" class="btn btn-secondary">
        <span class="bi bi-plus"></span>
        Add a comment
    </a>
    <a href="/posts/update/{{ $post->id }}" class="btn btn-primary">
        <span class="bi bi-pencil-square"></span>
        Update post
    </a>
</div>

<div class="card mb-3">
<div class="card-body">
    <h4 class="card-title">{{ $post->title }}</h4>
    {{ $post->details }}
</div>
</div>

@if (count($comments) == 0)
<div class="alert alert-info">No comments yet.</div>
@else
<div class="card">
<div class="card-body">
<form action="/comments/delete_multiple_from/{{ $post->id }}" id="multipleDeleteForm" method="post">
    @csrf
    <button class="btn btn-danger mb-3" type="submit">
        <span class="bi bi-trash3"></span>
        Delete all checked
    </button>
</form>
</div>

<table class="table table-hover">
<tbody>
@foreach ($comments as $comment)
<tr>
    <td>
        <div class="form-check form-check-inline">
            <input class="form-check-input" form="multipleDeleteForm" id="comment{{ $comment->id }}" type="checkbox" name="ids[]" value="{{ $comment->id }}">
            <label class="form-check-label" for="comment{{ $comment->id }}">{{ $comment->details }}</label>
        </div>
    </td>
    <td>
        <a href="/comments/update/{{ $comment->id }}" class="btn btn-secondary">
            <span class="bi bi-pencil-square"></span>
            Update
        </a>
        <button class="btn btn-warning" type="button" onclick="confirmDelete({{ $comment->id }})">
            <span class="bi bi-trash3"></span>
            Confirm delete
        </button>
    </td>
</tr>
@endforeach
</tbody>
</table>

</div>

<div class="modal" id="confirmDeleteModal" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
    <h4 class="modal-title" id="confirmDeleteModalLabel">Confirm delete</h4>
</div>

<div class="modal-body">
    <form action="/comments/delete" id="deleteForm" method="post">
        @csrf
        <input id="commentIdToDelete" name="id" type="hidden">
    </form>
    <p>Are you sure you want to delete this comment?</p>
</div>

<div class="modal-footer">
    <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">No</button>
    <button class="btn btn-primary" form="deleteForm" type="submit">Yes</button>
</div>

</div>
</div>
</div>
@endif
@endsection

@section('scripts')
<script type="text/javascript">
function confirmDelete(commentId)
{
    document.getElementById('commentIdToDelete').value = commentId
    var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'))
    modal.show()
}
</script>
@endsection
