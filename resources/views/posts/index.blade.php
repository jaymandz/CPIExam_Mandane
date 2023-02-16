@extends('base')

@section('body')
<div class="mb-3">
    <a href="posts/create" class="btn btn-secondary">
        Create post
    </a>
</div>

@if (count($posts) == 0)
<div class="alert alert-info">
    No posts yet.
</div>
@else
<div class="card">
<div class="card-body">

<table class="table">
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
        <a href="posts/update/{{ $post->id }}" class="btn btn-secondary">
            Update
        </a>
    </td>
</tr>
@endforeach
</tbody>
</table>

</div>
</div>
@endif
@endsection
