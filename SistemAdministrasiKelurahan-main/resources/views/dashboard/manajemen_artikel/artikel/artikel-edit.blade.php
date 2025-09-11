@extends('dashboard.layouts.master', ['title' => "Edit Artikel"])

@section('content')

<?php
    $data=[
        'icon' => "pe-7s-note",
        'judul' => "Edit Artikel",
        'link' => route('manajemen-artikel.artikel') ,
        'page1' => "Artikel",
        'page2' => "/ Edit",
        'page3' => "/ ".$article->title
    ]
?>
@include('dashboard.layouts.page-title',$data)

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" role="tabpanel">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title font-weight-bold mb-4 mt-2" style="font-size: large;">Edit Artikel</h5>
                <div tabindex="-1" class="dropdown-divider"></div>

                <form action="{{ route('manajemen-artikel.artikel.update', $article->id) }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    {{-- Artikel --}}
                    <div class="row">
                        <div class=" col-lg-3 mb-2 mt-1">
                            <h4 class="card-title font-weight-bold">Artikel</h4>
                            <hr>
                        </div>
                        <div class=" col-lg-9 ">
                            <div class="form-row">
                                {{-- Judul --}}
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="title">Judul Artikel</label>
                                        <input name="title" id="title" type="text"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $article->title) }}">
                                        @error('title')
                                            <span class="invalid-feedback mt-2" role="alert">
                                                <i>{{ $message }}</i>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Kategori --}}
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" id="category_id"
                                                class="mb-2 form-control @error('category_id') is-invalid @enderror">
                                            <option value="" disabled>Pilih salah satu</option>
                                            @forelse ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category }}
                                                </option>
                                            @empty
                                                <option>Data kategori belum ada</option>
                                            @endforelse
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback mt-2" role="alert">
                                                <i>{{ $message }}</i>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Isi Artikel --}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="editor">Isi</label>
                                        <textarea class="form-control @error('body') is-invalid @enderror"
                                                  name="body" id="editor" rows="5">{{ old('body', $article->body) }}</textarea>
                                        @error('body')
                                            <span class="invalid-feedback mt-2" role="alert">
                                                <i>{{ $message }}</i>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div tabindex="-1" class="dropdown-divider mt-4"></div>

                    {{-- Tag --}}
                    <div class="row">
                        <div class=" col-lg-3">
                            <h4 class="card-title">Tag</h4>
                            <hr>
                        </div>
                        <div class=" col-lg-9">
                            <div class="position-relative form-group">
                                <label for="tags">Tag</label>
                                <select name="tags[]" id="tags"
                                        class="mb-2 form-control select2 @error('tags') is-invalid @enderror" multiple>
                                    @forelse ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, old('tags', $tagCheck)) ? 'selected' : '' }}>
                                            {{ $tag->name_tag }}
                                        </option>
                                    @empty
                                        <option>Data tag belum ada</option>
                                    @endforelse
                                </select>
                                @error('tags')
                                    <span class="invalid-feedback mt-2" role="alert">
                                        <i>{{ $message }}</i>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div tabindex="-1" class="dropdown-divider"></div>

                    {{-- Gambar --}}
                    <div class="row">
                        <div class=" col-lg-3">
                            <h4 class="card-title">Gambar</h4>
                            <hr>
                        </div>
                        <div class=" col-lg-9">
                            <div class="form-row ml-1 mb-2 mt-3">
                                <div class="position-relative form-group">
                                    <label for="thumbnail">Upload Gambar</label>
                                    <input name="thumbnail" id="thumbnail" type="file"
                                           class="form-control-file @error('thumbnail') is-invalid @enderror"
                                           accept="image/*">
                                    @if($article->thumbnail)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/'.$article->thumbnail) }}" alt="Thumbnail lama"
                                                 style="max-height: 120px; border-radius: 6px;">
                                        </div>
                                    @endif
                                    <small class="form-text text-muted">Ukuran Maksimal : 3MB</small>
                                    <small class="form-text text-muted">Rekomendasi : 1200x800 px (Landscape)</small>
                                    @error('thumbnail')
                                        <span class="invalid-feedback mt-2" role="alert">
                                            <i>{{ $message }}</i>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div tabindex="-1" class="dropdown-divider"></div>

                    {{-- Lampiran --}}
                    <div class="row">
                        <div class=" col-lg-3">
                            <h4 class="card-title">Lampiran</h4>
                            <hr>
                        </div>
                        <div class=" col-lg-9">
                            <div class="form-row ml-1 mb-2 mt-3">
                                <div class="position-relative form-group">
                                    <label for="document">Upload Lampiran</label>
                                    <input name="document" id="document" type="file"
                                           class="form-control-file @error('document') is-invalid @enderror"
                                           accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.zip,.rar,.txt">
                                    @if($article->document)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/'.$article->link_document) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                                Lihat Lampiran Lama
                                            </a>
                                        </div>
                                    @endif
                                    <small class="form-text text-muted">Ukuran Maksimal : 5MB</small>
                                    @error('document')
                                        <span class="invalid-feedback mt-2" role="alert">
                                            <i>{{ $message }}</i>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">Simpan Artikel</button>
                            <a href="{{ route('manajemen-artikel.artikel') }}" class="mt-2 btn btn-outline-danger">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create (document.querySelector('#editor'))
        .catch ( error => {
            console.error( error );
        });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Pilih tag yang sesuai",
            width: '100%'
        });
    });
</script>

@endsection