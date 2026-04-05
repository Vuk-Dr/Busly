@extends('adminlte::page')
@section('title', 'Routes')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Routes</h1>
        <a href="{{ route('admin.routes.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> &nbsp Add Route
        </a>
    </div>
@endsection
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <div class="card">
        <div class="card-body p-0 p-sm-4">
            <table class="table table-responsive-lg table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Carrier</th>
                    <th>Seats</th>
                    <th>Stops</th>
                    <th>Total price</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($routes as $r)
                    <tr>
                        <td class="align-middle">{{ $r->id }}</td>
                        <td class="align-middle">{{ $r->getName() }}</td>
                        <td class="align-middle">{{ $r->carrier->name }}</td>
                        <td class="align-middle">{{ $r->seats }}</td>
                        <td class="align-middle">{{ $r->routeStops->count() }}</td>
                        <td class="align-middle">{{ $r->totalPrice() }}</td>
                        <td class="align-middle">{{ $r->getDurationFormatted() }}</td>
                        <td class="col-2 align-middle">
                            <div class="row justify-content-around">
                                <a href="{{ route('admin.routes.edit', [$r->id, 'page' => request('page')]) }}"
                                   class="btn btn-sm pt-2 px-2 px-lg-3 btn-warning ">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <x-adminlte-modal id="delete-{{ $r->id }}" theme="danger" title="Are you sure?"
                                                  v-centered="true">
                                    <p class="text-center my-3">Do you really want to delete route
                                        - {{ $r->getName() }}</p>
                                    <x-slot name="footerSlot">
                                        <form action="{{ route('admin.routes.destroy', $r->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </x-slot>
                                </x-adminlte-modal>

                                <button data-toggle="modal" data-target="#delete-{{ $r->id }}"
                                        class="btn btn-danger px-2 px-lg-3"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center bg-warning">No carriers found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($routes->hasPages())
                <div class="card-footer pt-4">
                    {{ $routes->links() }}
                </div>
            @endif
        </div>
    </div>

@endsection
