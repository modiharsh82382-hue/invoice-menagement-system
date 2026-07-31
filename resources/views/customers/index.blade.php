@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <h2>Customer List</h2>

    <a href="/customers/create" class="btn btn-primary">
        + Add Customer
    </a>

</div>

<form action="/customers" method="GET" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            class="form-control"
            name="search"
            placeholder="Search Customer..."
            value="{{ request('search') }}">

        <button class="btn btn-success">
            Search
        </button>

    </div>

</form>

@if($customers->count())

<table class="table table-bordered table-hover table-striped">

    <thead class="table-dark">

        <tr>

            <th>#</th>

            <th>Name</th>

            <th>Email</th>

            <th>Phone</th>

            <th>GST</th>

            <th width="220">Action</th>

        </tr>

    </thead>

    <tbody>

    @foreach($customers as $customer)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $customer->customer_name }}</td>

            <td>{{ $customer->email }}</td>

            <td>{{ $customer->phone }}</td>

            <td>{{ $customer->gst_number }}</td>

            <td>

                <a href="/customers/{{ $customer->id }}/edit"
                   class="btn btn-warning btn-sm">

                    Edit

                </a>

                <form
                    action="/customers/{{ $customer->id }}"
                    method="POST"
                    style="display:inline;">

                    @csrf

                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Are you sure you want to delete this customer?')">

                        Delete

                    </button>

                </form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>

@else

<div class="alert alert-info">

    No Customer Found.

</div>

@endif

@endsection