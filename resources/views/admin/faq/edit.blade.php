@extends('layouts.app', ['title' => 'Edit FAQ'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-right">Edit</h5>
                        <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label class="text-label" for="kategorifaq">Program Name</label>
                                        <select class="form-control" name="id_kategori">
                                            @foreach ($kategorifaqs as $kategorifaq)
                                                <option class="py-1" value="{{ $kategorifaq->id }}" 
                                                    {{ ($faq->id_kategori ?? old('id_kategori')) == $kategorifaq->id ? 'selected' : '' }}>
                                                    {{ $kategorifaq->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_kategori')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>                                    
                                    <div class="form-group mb-4">
                                        <label class="text-label" for="title">Question</label>
                                        <input class="form-control" type="text" name="title"
                                            value="{{ old('title', $faq->title) }}" placeholder="Question">
                                        @error('title')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="text-label" for="description">Answer</label>
                                        <textarea id="editor1" class="form-control" name="description" rows="3">{{ old('description', $faq->description) }}</textarea>
                                        @error('description')
                                            <div class="w-full bg-red-200 shadow-sm rounded-md overflow-hidden mt-2">
                                                <div class="px-4 py-2">
                                                    <p class="text-gray-600 text-sm">{{ $message }}</p>
                                                </div>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-start mt-4">
                                <button type="submit" class="btn btn-primary">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
