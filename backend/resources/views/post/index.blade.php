@extends('layout')
@section('layout_content')
<div class="card mt-2">
    <div class="card-header">Filter</div>
    <div class="row">
        <form action="{{ url('post/report') }}" method="get">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option value="" selected>Select category</option>
                            @foreach($categories as $key => $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <select class="form-select" aria-label="Default select example" name="status">
                            <option value="" selected>Select Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inacive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Generate Excel</button>
            </div>
        </form>
    </div>
</div>
@endsection
