<base href="/public">

@extends('admin.layout')
@section('content')

<div id="wrapper">
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">User Details</div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Roles</th>

                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                        <tr id="user-row-{{ $user->id }}">
                                            <td>{{ $user->name }}</td>
                                            <td id="role-{{ $user->id }}">{{ ucfirst($user->role) }}</td>

                                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editModal{{ $user->id }}">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            @foreach($users as $user)
                                <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="background-color: #f8f9fa;">
                                            <div class="modal-header" style="background-color: #343a40; color: white;">
                                                <h5 class="modal-title" id="editModalLabel">Edit User Role and Status
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close" style="color: white;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="overlay toggle-menu"></div>
        </div>
    </div>

    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>

</div>

@endsection

@section('scripts')
<script>
    $('form').on('submit', function (event) {
        event.preventDefault();

        var userId = $(this).data('user-id');
        var role = $('#role' + userId).val();
        var is_active = $('#is_active' + userId).val();

        $.ajax({
            url: '/admin/users/' + userId,
            method: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                role: role,
                is_active: is_active
            },
            success: function (response) {
                if (response.success) {
                    alert(response.message);
                    // Update the UI
                    $('#role-' + userId).text(role.charAt(0).toUpperCase() + role.slice(1));
                    $('#status-' + userId).text(is_active == 1 ? 'Active' : 'Inactive');
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                alert('There was an error updating the user: ' + error);
            }
        });
    });

</script>
@endsection
