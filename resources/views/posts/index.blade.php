@extends('base')

@section('body')
<div class="mb-3">
    <a href="/posts/create" class="btn btn-primary">
        <span class="bi bi-plus"></span>
        Create post
    </a>
</div>

@if (count($posts) == 0)
<div class="alert alert-info">
    No posts yet.
</div>
@else
<div class="card">
<table class="table table-hover">
<thead>
<tr>
    <th>Title</th>
    <th>&nbsp;</th>
</tr>
</thead>

<tbody>
@foreach ($posts as $post)
<tr>
    <td>{{ $post->title }}</td>
    <td>
        <a href="/posts/view/{{ $post->id }}" class="btn btn-info">
            <span class="bi bi-info-circle"></span>
            View
        </a>
        <button class="btn btn-danger" type="button" onclick="confirmDelete({{ $post->id }})">
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
    <form action="/posts/delete" id="deleteForm" method="post">
        @csrf
        <input id="postIdToDelete" name="id" type="hidden">
    </form>
    <p>Are you sure you want to delete this post?</p>
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
function confirmDelete(postId)
{
    document.getElementById('postIdToDelete').value = postId
    var modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'))
    modal.show()
}
</script>
@endsection
