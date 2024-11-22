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
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h5>Edit Blog</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('author.update', $product->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('Put')

                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title"
                                        value="{{ old('title', $product->title) }}"
                                        class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description:</label>
                                    <textarea name="description" class="form-control" rows="5"
                                        required>{{ old('description', $product->description) }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                    @if($product->image)
                                        <img id="previewImage"
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="Blog Image" width="100" class="mt-2">
                                    @else
                                        <img id="previewImage" src="#" alt="Selected Image Preview" width="100"
                                            class="mt-2" style="display: none;">
                                    @endif
                                </div>


                                <div class="mb-3">
                                    <label for="tags" class="form-label">Tags:</label>
                                    <input type="text" name="tags"
                                        value="{{ old('tags', $product->tags) }}"
                                        class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('image').addEventListener('change', function (event) {
        const preview = document.getElementById('previewImage');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block'; 
            };

            reader.readAsDataURL(file); 
        } else {
            preview.src = '#';
            preview.style.display = 'none'; 
        }
    });

</script>
@endsection
