@extends('admin/layout')
@section('page')
    Ajouter catégorie
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les Catégories</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Catégories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Ajouter une nouvelle catégorie</p>
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="parentCategory">Catégorie principale</label>
                    <select class="form-select" name="parent_id" id="parentCategory" required>
                        <option value="0" selected disabled>Sélectionnez la catégorie parent</option>
                        <option value="0">principale</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">
                                {{-- {{ !$categorie->parent_id ? '💎 ' . $categorie->name : $categorie->parent->name . ' ➤ ' . $categorie->name }} --}}
                                {{ !$categorie->parent_id ? '💎 ' . $categorie->name : \App\Http\Controllers\admin\CategoryController::getParentsTree($categorie, $categorie->name, '➤') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="categoryName">Nom de catégorie</label>
                    <input type="text" class="form-control" name="name" id="categoryName" required
                        placeholder="Entrer le nom de catégorie">
                </div>
                <div class="form-group mb-2">
                    <label for="categoryEnName">Nom de catégorie (en anglais)</label>
                    <input type="text" class="form-control" name="en_name" id="categoryEnName" required
                        placeholder="Entrer le nom de catégorie en anglais">
                </div>
                <div class="form-group mb-2">
                    <label>Choisir l'image</label>
                    <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                        class="form-control">
                    <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src='{{ asset('/assets/admin/img/upload.png') }}' />
                    @if ($errors->has('image'))
                        <p class="invalid-item">
                            Choisir une image de format (png/jpg/jpeg/webp)(moins de 2 mp)
                        </p>
                    @endif
                </div>
                <div class="text-center"><button type="submit" class="btn btn-primary">Ajouter <i
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
