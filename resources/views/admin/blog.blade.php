<base href="/public">
@extends('admin.layout')

@section('content')
<div id="wrapper">

    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">


                    @if(session('success'))
                        <div class="alert alert-primary fade show" role="alert"
                            style="background-color: #d1ecf1; color: #0c5460; border-color: #bee5eb;">
                            {{ session('success') }}
                        </div>
                    @endif



                    <div class="card">
                        <div class="card-header">User Details
                            <div class="card-action">
                                <div class="dropdown">
                                    <a href="{{ route('admin.create') }}" class="btn btn-light"
                                        style="background-color: #add8e6; color: #000;">
                                        Create New Product
                                    </a>
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush table-borderless">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Tags</th>
                                        <th>Roles</th>

                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($blogs->isEmpty())
                                        <tr>
                                            <td colspan="4" class="text-center">No products available.</td>
                                        </tr>
                                    @else
                                        @foreach($blogs as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit($product->description, 25) }}
                                                </td>

                                                <td>
                                                    @if($product->image)
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="{{ $product->title }}" width="100">
                                                    @else
                                                        <p>No image available</p>
                                                    @endif
                                                </td>
                                                <td>{{ $product->tags }}</td>
                                                <td>
                                                    <p>By:
                                                        {{ $product->user_type == 'admin' ? 'Admin' : 'Author' }}
                                                    </p>
                                                    <p>Posted on: {{ $product->created_at }}</p>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.blog.edit', $product->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <form
                                                        action="{{ route('admin.blog.delete', $product->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                                                    </form>


                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
