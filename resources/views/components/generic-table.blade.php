<div class="card-body p-0 p-sm-4">
    <table class="table table-responsive-sm table-bordered table-striped">
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
        @forelse($items as $i)
            <tr>
                <td class="align-middle">{{ $i->id }}</td>
                <td class="align-middle">{{ $i->name }}</td>
                <td class="align-middle">{{ $i->email }}</td>
                <td class="align-middle">{{ $i->phone }}</td>
                <td class="text-center"> @if($i->image) <img src="{{ asset('storage/uploads/carriers/' . $i->image) }}" alt="carrier-{{ $i->id }}" width="100" />
                    @else <p>/</p>@endif</td>
                <td class="align-middle">{{ $i->city->name }}</td>
                <td class="col-2 align-middle">
                    <div class="row justify-content-around">
                        <a href="{{ route('admin.'.$tableName.'.edit', $i->id) }}" class="btn btn-sm pt-2 px-2 px-lg-3 btn-warning ">
                            <i class="fas fa-edit"></i>
                        </a>
                        <x-adminlte-modal id="delete-{{ $i->id }}" theme="danger" title="Are you sure?" v-centered="true">
                            <p class="text-center my-3">Do you really want to delete city - {{ $i->name }}</p>
                            <x-slot name="footerSlot">
                                <form action="{{ route('admin.'.$tableName.'.destroy', $i->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                    <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                </form>
                            </x-slot>
                        </x-adminlte-modal>

                        <button data-toggle="modal" data-target="#delete-{{ $i->id }}" class="btn btn-danger px-2 px-lg-3"><i class="fas fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center bg-warning">No products found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    @if($items->hasPages())
        <div class="card-footer pt-4">
            {{ $items->links() }}
        </div>
    @endif
</div>
