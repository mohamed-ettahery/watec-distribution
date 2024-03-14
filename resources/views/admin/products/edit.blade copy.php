@extends('admin/layout')
@section('page')
    Modifier produit
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les Produits</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Modifier un produit</p>
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="productName">Nom de produit</label>
                    <input type="text" class="form-control" name="name" id="productName"
                        value="{{ old('name', $product->name) }}" placeholder="Entrer le nom de produit">
                    @if ($errors->has('name'))
                        <p class="invalid-item">
                            Entrer le nom de produit
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="productEnName">Nom de produit (en anglais)</label>
                    <input type="text" class="form-control" name="en_name" id="productEnName"
                        value="{{ old('en_name', $product->en_name) }}" placeholder="Entrer le nom de produit en anglais">
                    @if ($errors->has('en_name'))
                        <p class="invalid-item">
                            Entrer le nom de produit en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir catégorie</label>
                    <select class="form-select" name="category_id" required>
                        <option value="" disabled>Sélectionnez la catégorie</option>
                        @foreach (\App\Http\Controllers\admin\CategoryController::getAllcategories() as $category)
                            <option value="{{ $category->id }}" @if ($product->category_id == $category->id) selected @endif>
                                {{ !$category->parent_id ? '💎 ' . $category->name : \App\Http\Controllers\admin\CategoryController::getParentsTree($category, $category->name, '➤') }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <p class="invalid-item">
                            choisir catégorie
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir la marque</label>
                    <select class="form-select" name="mark_id" required>
                        <option value="0">Sélectionnez la marque</option>
                        @foreach (\App\Http\Controllers\admin\MarkController::getAllMarks() as $mark)
                            <option value="{{ $mark->id }}" @if ($product->mark_id == $mark->id) selected @endif>
                                {{ $mark->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('mark_id'))
                        <p class="invalid-item">
                            choisir la marque
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="promotion" role="switch" id="switchPromotion"
                            {{ $product->promotion ? 'checked' : '' }}>
                        <label class="form-check-label" for="switchPromotion">populaire</label>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label>La Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    @if ($errors->has('description'))
                        <p class="invalid-item">
                            Entrer la description de produit
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>La Description (en anglais)</label>
                    <textarea name="en_description" id="en_description" cols="30" rows="10"></textarea>
                    @if ($errors->has('en_description'))
                        <p class="invalid-item">
                            Entrer la description de produit en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Détails</label>
                    <textarea name="details" id="details" cols="30" rows="10"></textarea>
                    @if ($errors->has('details'))
                        <p class="invalid-item">
                            Entrer les détailes de produit
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Détails (en anglais)</label>
                    <textarea name="en_details" id="en_details" cols="30" rows="10"></textarea>
                    @if ($errors->has('en_details'))
                        <p class="invalid-item">
                            Entrer les détailes de produit en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir Document(PDF*)</label>
                    <input type="hidden" name="old_doc" value="{{ $product->document }}">
                    <input type="file" accept="application/pdf" class="form-control" name="documents[]" multiple>
                    @if ($errors->has('documents'))
                        <p class="invalid-item">
                            Attacher le(s) document(s)
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir l'image</label>
                    <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                        class="form-control">
                    <input type="hidden" name="old_img" value="{{ $product->image }}">
                    {{-- <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src="{{ asset('uploads/products/' . $product->image) }}" /> --}}
                    <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src="{{ asset('uploads/products/' . array_values(explode(',', $product->image))[0]) }}" />
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
    <div id="testElement"></div>
@endsection
@section('js')
    <script src="https://cdn.tiny.cloud/1/6rr9j3xitk4b3dsfw7e57kzmpitplgzi2b3wa4mkkaigrlp9/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
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


        tinymce.init({
            selector: "#description,#details",
            setup: function(editor) {
                editor.on('init', function() {
                    // editor.setContent(document.getElementById('details').value);
                    tinymce.get("description").setContent(`{!! $product->description !!}`);
                    tinymce.get("details").setContent(`{!! $product->details !!}`);
                    $('.tox-notifications-container').hide();
                });
            },
            plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss",
            toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat",
            tinycomments_mode: "embedded",
            tinycomments_author: "Author name",
            mergetags_list: [{
                    value: "First.Name",
                    title: "First Name"
                },
                {
                    value: "Email",
                    title: "Email"
                },
            ],
        });
    </script>
@endsection
