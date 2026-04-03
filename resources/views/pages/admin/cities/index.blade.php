@extends('adminlte::page')
@section('title', 'Cities')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Cities</h1>
        <a href="{{ route('admin.cities.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> &nbsp Add City
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
    <div class="card mb-0">
        <div class="card-body p-0 p-sm-4">
            <table class="table table-responsive-sm table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($cities as $c)
                    <tr>
                        <td class="align-middle">{{ $c->id }}</td>
                        <td class="align-middle">{{ $c->name }}</td>
                        <td class="text-center"> @if($c->image) <img src="{{ asset('storage/uploads/cities/' . $c->image) }}" alt="city-{{ $c->id }}" width="100" />
                                                @else/@endif</td>
                        <td class="col-2 align-middle">
                            <div class="row justify-content-around">
                                <a href="{{ route('admin.cities.edit', [$c->id, 'page' => request('page')]) }}" class="btn btn-sm pt-2 px-2 px-lg-3 btn-warning ">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <x-adminlte-modal id="delete-{{ $c->id }}" theme="danger" title="Are you sure?" v-centered="true">
                                    <p class="text-center my-3">Do you really want to delete city - {{ $c->name }}</p>
                                    <x-slot name="footerSlot">
                                        <form action="{{ route('admin.cities.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </x-slot>
                                </x-adminlte-modal>

                                <button data-toggle="modal" data-target="#delete-{{ $c->id }}" class="btn btn-danger px-2 px-lg-3"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center bg-warning">No cities found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($cities->hasPages())
                <div class="card-footer pt-4">
                    {{ $cities->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
