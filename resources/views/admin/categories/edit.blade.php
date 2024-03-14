@extends('admin/layout')
@section('page')
    Modifier catégorie
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les Catégories</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Modifier votre catégorie</p>
            <form action="{{ route('categories.update', $category->slug) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="parentCategory">Catégorie principale</label>
                    <select class="form-select" name="parent_id" id="parentCategory" required>
                        <option value="0" selected disabled>Sélectionnez la catégorie parent</option>
                        <option value="0" {{ $category->parent_id == null ? 'selected' : '' }}>principale</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}" {{ $category->id == $categorie->id ? 'disabled' : '' }}
                                {{ $category->parent_id == $categorie->id ? 'selected' : '' }}>
                                {{-- {{ !$categorie->parent_id ? '💎 ' . $categorie->name : $categorie->parent->name . '➤' . $categorie->name }} --}}
                                {{ !$categorie->parent_id ? '💎 ' . $categorie->name : \App\Http\Controllers\admin\CategoryController::getParentsTree($categorie, $categorie->name, '➤') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="categoryName">Nom de catégorie</label>
                    <input type="text" class="form-control" name="name" id="categoryName"
                        value="{{ $category->name }}" required placeholder="Entrer le nom de catégorie">
                </div>
                <div class="form-group mb-2">
                    <label for="categoryEnName">Nom de catégorie (en anglais)</label>
                    <input type="text" class="form-control" name="en_name" id="categoryEnName"
                        value="{{ $category->en_name }}" required placeholder="Entrer le nom de catégorie en anglais">
                </div>
                <div class="form-group mb-2">
                    <label>Choisir l'image</label>
                    <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                        class="form-control">
                    <input type="hidden" name="old_img" value="{{ $category->image }}">
                    <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src="{{ asset('uploads/categories/' . $category->image) }}" />
                    @if ($errors->has('image'))
                        <p class="invalid-item">
                            Choisir une image de format (png/jpg/jpeg/webp)(moins de 2 mp)
                        </p>
                    @endif
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Confirmer les modifications <i
                            class="fa-solid fa-check"></i></button></div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const input = document.getElementById('img-file');
        const newImgField = document.querySelector('.new-img-insert');

        newImgField.addEventListener("click", function() {
            input.click();
        });

        input.addEventListener('change', function(e) {
            const reader = new FileReader()
            reader.onload = function() {
                var src = reader.result
                $('.new-img-insert').attr("src", src);
            }
            reader.readAsDataURL(input.files[0])
        }, false);
    </script>
@endsection
