<base href="/public">

@extends('author.layout')

@section('content')
<div id="wrapper">

    <style>
        .card-body {
            padding: 20px;

        }

        .mb-3 {
            margin-bottom: 1rem;

        }

        .form-label {
            font-weight: bold;

        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

    </style>
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12">


                    @if(session('success'))
                        <div>{{ session('success') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h5>Create Blog</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('author.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" class="form-control" required></textarea>

                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Blog Image:</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tags">Add Tags:</label>
                                    <input type="text" id="tags" name="tags" placeholder="Add tags separated by commas" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
