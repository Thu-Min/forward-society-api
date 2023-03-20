@extends('templates.master')

@section('title')
    Photo
@endsection

@section("content")
<div class="text-sm breadcrumbs ml-5 pt-5  text-primary">
    <ul>
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li>Photo</li>
    </ul>
</div>

<x-card>
    <x-card-header title="Photo">
        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="name" class="file-input file-input-bordered file-input-primary w-full max-w-xs" />
            <button type="submit" class="btn btn-primary btn-md flex-none">Submit</button>
        </form>
    </x-card-header>
</x-card>


<div class="grid grid-cols-4 place-items-center">
    @forelse($photos as $photo)
    <div class="flex-auto">
        <div class="position-relative overflow-hidden img-preview-box">
            <img src="{{ $photo->thumbnail }}" class="w-100 rounded" alt="">
            <div class="flex mx-auto gap-5 ml-20 mb-8 mt-3">
                <form action="{{ route('photo.destroy',$photo->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="btn-group btn-group-sm position-absolute img-preview-info">
                        <button type="submit"
                                class="btn btn-primary"
                                onclick="return confirm('Are you sure to Delete?')">
                                <i class="fa-solid fa-trash text-white"></i>
                        </button>
                    </div>
                </form>
                <label for="my-modal-3" class="btn btn-primary">
                    <i class="fa-solid fa-circle-info text-white"></i>
                </label>
            </div>

            <input type="checkbox" id="my-modal-3" class="modal-toggle" />
            <div class="modal">
                <div class="modal-box relative">
                    <div class="flex flex-row-reverse items-center justify-between">
                        <label for="my-modal-3" class="btn btn-sm btn-circle btn-primary text-white">✕</label>
                        <h3 class="font-bold text-lg">Photo Detail</h3>
                    </div>
                    <div class="mb-3 w-12/12 form-control">
                        <label class="label">
                            <span class="label-text">
                                Thumbnail Image
                            </span>
                        </label>
                        <div class="input-group">
                            <input type="text" class="w-full" id="previewUrlThumbnail" value="{{ $photo->thumbnail }}" readonly>
                            <button class="btn btn-secondary" onclick="cp('previewUrlThumbnail')">
                                <i class="fa-solid fa-clipboard"></i>
                            </button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Medium Image</label>
                            <div class="input-group">
                                <input type="text" class="w-full" id="previewUrlMd" value="{{ $photo->md }}" readonly>
                                <button class="btn btn-secondary" onclick="cp('previewUrlMd')">
                                    <i class="fa-solid fa-clipboard"></i>
                                </button>
                            </div>
                        </div>
                        <div class="">
                            <label class="form-label">Large Image</label>
                            <div class="input-group">
                                <input type="text" class="w-full" value="{{ $photo->lg }}" readonly>
                                <button class="btn btn-secondary" onclick="cp('previewUrlLg')">
                                    <i class="fa-solid fa-clipboard"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
</div>

<div class="flex place-content-end mr-5">
    <div class="">{{ $photos->links('pagination::tailwind') }}</div>
</div>
@endsection
