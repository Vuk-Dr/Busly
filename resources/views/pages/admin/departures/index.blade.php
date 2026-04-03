@extends('adminlte::page')
@section('title', 'Departures')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Departures</h1>
        <a href="{{ route('admin.departures.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> &nbsp Add Departure
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
            <table class="table table-responsive-xl table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Route</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($departures as $d)
                    <tr>
                        <td class="align-middle">{{ $d->id }}</td>
                        <td class="align-middle">{{ $d->route->getName() }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($d->time)->format('H:i') }}</td>
                        <td class="align-middle">{{ $d->date ? $d->date : 'Every day' }}</td>
                        <td class="align-middle text-bold text-{{ $d->active ? 'success' : 'danger' }}">{{ $d->active ? 'Active' : 'Inactive' }}</td>
                        <td class="col-1 align-middle">
                            <div class="row justify-content-around">
                                <a href="{{ route('admin.departures.edit', [$d->id, 'page' => request('page')]) }}"
                                   class="btn btn-sm pt-2 px-2 px-lg-3 btn-warning ">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <x-adminlte-modal id="delete-{{ $d->id }}" theme="danger" title="Are you sure?"
                                                  v-centered="true">
                                    <p class="text-center my-3">Do you really want to delete this departure</p>

                                    <x-slot name="footerSlot">
                                        <form action="{{ route('admin.departures.destroy', $d->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </x-slot>
                                </x-adminlte-modal>

                                <button data-toggle="modal" data-target="#delete-{{ $d->id }}"
                                        class="btn btn-danger px-2 px-lg-3"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center bg-warning">No carriers found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($departures->hasPages())
                <div class="card-footer pt-4">
                    {{ $departures->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
