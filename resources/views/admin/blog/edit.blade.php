<base href="/public">

@extends('admin.layout')

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
                    <div class="container">
                        <h2>Edit Blog Post</h2>


                        <form action="{{ route('admin.blog.update', $blog->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="title">Blog Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="{{ old('title', $blog->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Blog Description</label>
                                <textarea class="form-control" name="description" id="description" rows="4"
                                    required>{{ old('description', $blog->description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">

                                @if($blog->image)
                                    <img id="previewImage"
                                        src="{{ asset('storage/' . $blog->image) }}"
                                        alt="Blog Image" width="100" class="mt-2">
                                @else
                                    <img id="previewImage" src="#" alt="Selected Image Preview" width="100" class="mt-2"
                                        style="display: none;">
                                @endif
                            </div>
                            <script>
                                document.getElementById('image').addEventListener('change', function (event) {
                                    var reader = new FileReader();
                                    reader.onload = function () {
                                        var preview = document.getElementById('previewImage');
                                        preview.src = reader.result;
                                        preview.style.display = 'block';
                                    };
                                    reader.readAsDataURL(this.files[0]);
                                });

                            </script>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags:</label>
                                <input type="text" name="tags"
                                    value="{{ old('tags', $blog->tags) }}"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
