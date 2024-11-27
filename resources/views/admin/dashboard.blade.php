<base href="/public">

@extends('admin.layout')
@section('content')

<div id="wrapper">
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-primary fade show" role="alert"
                    style="background-color: #d1ecf1; color: #0c5460; border-color: #bee5eb;">
                    {{ session('success') }}
                </div>
            @endif
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
                                        <th>Status</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($users as $user)
                                        <tr id="user-row-{{ $user->id }}">
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('users.role', $user->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <select name="role" class="form-select"
                                                        onchange="this.form.submit()">
                                                        <option value="author" style="background-color:white"
                                                            {{ $user->role === 'author' ? 'selected' : '' }}>
                                                            Author</option>
                                                        <option value="visitor"  style="background-color:white"
                                                            {{ $user->role === 'visitor' ? 'selected' : '' }}>
                                                            Visitor</option>
                                                    </select>
                                                </form>

                                            </td>


                                            <td>
                                                <a href="{{ route('users.update', $user->id) }}"
                                                    class="btn btn-sm btn-{{ $user->status ? 'success' : 'danger' }}">
                                                    {{ $user->status ? 'Enable' : 'Disable' }}
                                                </a>
                                            </td>
                                            <td>{{ $user->created_at->format('Y-m-d') }}</td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>


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
