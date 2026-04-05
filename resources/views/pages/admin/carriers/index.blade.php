@extends('adminlte::page')
@section('title', 'Carriers')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>Carriers</h1>
        <a href="{{ route('admin.carriers.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> &nbsp Add Carrier
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($carriers as $c)
                    <tr>
                        <td class="align-middle">{{ $c->id }}</td>
                        <td class="align-middle">{{ $c->name }}</td>
                        <td class="align-middle">{{ $c->email }}</td>
                        <td class="align-middle">{{ $c->phone }}</td>
                        <td class="align-middle text-center"> @if($c->image)
                                <img src="{{ asset('storage/uploads/carriers/' . $c->image) }}"
                                     alt="carrier-{{ $c->id }}" width="100"/>
                            @else
                                /
                            @endif</td>
                        <td class="align-middle">{{ $c->city->name }}</td>
                        <td class="col-1 align-middle">
                            <div class="row justify-content-around">
                                <a href="{{ route('admin.carriers.edit', [$c->id, 'page' => request('page')]) }}"
                                   class="btn btn-sm pt-2 px-2 px-lg-3 btn-warning ">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <x-adminlte-modal id="delete-{{ $c->id }}" theme="danger" title="Are you sure?"
                                                  v-centered="true">
                                    <p class="text-center my-3">Do you really want to delete carrier
                                        - {{ $c->name }}</p>

                                    @if($c->routes()->count() > 0)
                                        <ul class="alert alert-danger"><b>Warning: </b> Deleting carrier will also
                                            delete it's routes:
                                            @foreach($c->routes as $r)
                                                <li class="ml-4">{{ $r->getName() }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <x-slot name="footerSlot">
                                        <form action="{{ route('admin.carriers.destroy', $c->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </form>
                                    </x-slot>
                                </x-adminlte-modal>

                                <button data-toggle="modal" data-target="#delete-{{ $c->id }}"
                                        class="btn btn-danger px-2 px-lg-3"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center bg-warning">No carriers found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            @if($carriers->hasPages())
                <div class="card-footer pt-4">
                    {{ $carriers->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection
