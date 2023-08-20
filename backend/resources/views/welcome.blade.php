@extends('layout')
@section('layout_content')


<div class="row justify-content-center">
            <div class="col-md-8" id="colDiv">
                <form id="multiStepForm" action="{{ url('users') }}" method="post"> @csrf
                    <input type="hidden" name="user_id" value="{{ @$sessionUser ? $sessionUser->id : '' }}" readonly>
                    <div class="step" id="step1">
                        <h3>Step 1: Username and Password</h3>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{ @$sessionUser ? $sessionUser->name : '' }}">

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required value="{{ @$sessionUser ? $sessionUser->email : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="button" class="btn btn-primary next-step" data-step="2">Next</button>
                    </div>
                    <div class="step" id="step2" style="display: none;">
                        <h3>Step 2: Address and Mobile Number</h3>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ @$sessionUserAddress ? $sessionUserAddress->address : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required value="{{ @$sessionUserAddress ? $sessionUserAddress->mobile : '' }}">
                        </div>
                        <button type="button" class="btn btn-secondary prev-step" data-step="1">Previous</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="row mt-2 sortable-container" id="sortable">
            @foreach ($databaseUser as $key => $item)
            <span class="serial-number"></span>
            <div class="card text-center mt-2 sortable-item" id="item_{{ ++$key }}">
                <div class="card-header">
                    Featured {{ ++$key }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                </div>
            </div>
            @endforeach
        </div>

@endsection
