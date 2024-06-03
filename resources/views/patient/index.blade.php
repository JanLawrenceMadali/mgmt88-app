@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center p-3">
                    <h5 class="fw-bold mb-0">{{ __('Patients') }}</h5>
                    <a href="{{ url('patients/create') }}" class="btn btn-primary">Add Patient</a>
                </div>
                @if (session('status'))
                <div class="alert alert-danger m-3" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->id }}</td>
                                <td>{{ $patient->firstname }}</td>
                                <td>{{ $patient->lastname }}</td>
                                <td>{{ $patient->email }}</td>
                                <td>{{ $patient->address }}</td>
                                <td>
                                    <a href="{{ url('patients/'.$patient->id.'/edit') }}" class="btn btn-success">Edit</a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Are you sure?</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    You are going to delete this patient.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="{{ url('patients/'.$patient->id.'/delete') }}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @empty
                                <td colspan="6" class="text-center">No data found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @endsection