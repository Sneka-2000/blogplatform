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
                        <div class="card-header">User Details
                            <div class="card-action">
                                <div class="dropdown">


                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">
                                <thead>
                                    <tr>
                                        <th>Name</th>

                                        <th>Email</th>
                                        <th>Comments</th>
                                        <th>Action</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach($comments as $comment)

                                            <td>{{ $comment->name }}</td>
                                            <td>{{ $comment->email }}</td>
                                            <td>{{ \Illuminate\Support\Str::limit($comment->comment, 25) }}
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.action', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" name="action"
                                                        value="approved">Approve</button>
                                                    <button type="submit" name="action" value="rejected">Reject</button>
                                                </form>
                                            </td>
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
