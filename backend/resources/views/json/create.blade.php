@extends('layout')
@section('layout_content')
<div class="container mt-4">
    <h3>Fill up form</h3>
    <form id="json-input-form" action="/data/store" method="POST">
        @csrf
        <div class="input-set">
            <label for="headline">Headline:</label><br>
            <input class="form-control" type="text" name="headline[]"><br>

            <label for="description">Description:</label><br>
            <textarea class="form-control" name="description[]"></textarea><br>
        </div>
        <button type="button" id="add-input-set" class="btn btn-success">Add Another Set</button>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
</div>
@endsection
