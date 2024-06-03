@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h5 class="fw-bold mb-0">{{ __('Edit Patients') }}</h5>
                    <a href="{{ url('patients') }}" class="btn btn-primary">Back</a>
                </div>

                <div class="card-body">
                    <form action="{{ url('patients/'.$patient->id.'/edit') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="">First Name</label>
                            <input type="text" name="firstname" class="form-control" value="{{ $patient->firstname }}">
                            @error('firstname')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $patient->lastname }}">
                            @error('lastname')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $patient->email }}">
                            @error('email')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $patient->address }}">
                            @error('address')
                            <span class="text-danger" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                </div>
            </div>
            @endsection