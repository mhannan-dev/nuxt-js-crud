@extends('layout')
@section('layout_content')
<div class="container mt-4">
    <h3>Data View on :: {{ $jsonDataModel->title }}</h3>
    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
        @foreach(json_decode($jsonDataModel->content) as $key => $content)
            <tr>
                <td>{{ $content->headline }}</td>
                <td>{{ $content->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
