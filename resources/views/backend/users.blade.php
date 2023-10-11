@extends('backend.layouts.main')

@section('title', 'Users')

@push('extra_css')
    <!--datatable css-->
    <link rel="stylesheet" href="{{ url('admin/assets/css/dataTables.bootstrap5.min.css') }}" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ url('admin/assets/css/responsive.bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('admin/assets/css/buttons.dataTables.min.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div class="col-xl-2">
                            <h5 class="card-title mb-0">Users</h5>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            @can('add user')
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Add User</a>
                            @endcan
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="buttons-datatables" class="display table table-hover table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Joining Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $key=>$user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->fname.' '.$user->lname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-primary-subtle text-primary text-uppercase">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                            <td>
                                @if ($user->status == true)
                                    <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger text-uppercase">Block</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @can('edit user')
                                        <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                    @endcan
                                    @can('delete user')
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#deleteUser{{ $user->id }}">Delete</button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        {{-- Modal  --}}
                        <div class="modal fade zoomIn" id="deleteUser{{ $user->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mt-2 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                <h4>Are you sure ?</h4>
                                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                                            </div>
                                        </div>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="noresult">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ customer We did not find any customer for you search.</p>
                            </div>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- end row --}}
@endsection
@push('extra_js')
    <script src="{{ url('admin/assets/js/jquery-3.6.0.min.js') }}"></script>
    {{-- datatable js --}}
    <script src="{{ url('admin/assets/js/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/datatables/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/ajax/vfs_fonts.js') }}"></script>
    <script src="{{ url('admin/assets/js/ajax/pdfmake.min.js') }}"></script>
    <script src="{{ url('admin/assets/js/ajax/jszip.min.js') }}"></script>

    <script src="{{ url('admin/assets/js/pages/datatables.init.js') }}"></script>
@endpush  