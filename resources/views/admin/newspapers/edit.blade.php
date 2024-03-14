@extends('admin/layout')
@section('page')
    Modifier journal
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les journaux</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('newspapers.index') }}">journaux</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $newspaper->title }}</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Modifier un journal</p>
            <form action="{{ route('newspapers.update', $newspaper->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-2">
                    <label for="newspaperName">Titre de journal</label>
                    <input type="text" class="form-control" name="title" id="newspaperName"
                        value="{{ old('title', $newspaper->title) }}" placeholder="Entrer le titre de journal">
                    @if ($errors->has('title'))
                        <p class="invalid-item">
                            Entrer le titre de journal
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="newspaperName">Titre de journal (en anglais)</label>
                    <input type="text" class="form-control" name="en_title" id="newspaperName"
                        value="{{ old('en_title', $newspaper->en_title) }}"
                        placeholder="Entrer le titre de journal en anglais">
                    @if ($errors->has('en_title'))
                        <p class="invalid-item">
                            Entrer le titre de journal en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="newspaperDate">Date de journal</label>
                    <input type="date" class="form-control" name="newspaper_date" id="newspaperDate"
                        value="{{ old('newspaper_date', $newspaper->newspaper_date) }}"
                        placeholder="Entrer la date de journal">
                    @if ($errors->has('name'))
                        <p class="invalid-item">
                            Entrer la date de journal
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>La Description</label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    @if ($errors->has('description'))
                        <p class="invalid-item">
                            Entrer la description de journal
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>La Description (en anglais)</label>
                    <textarea name="en_description" id="en_description" cols="30" rows="10"></textarea>
                    @if ($errors->has('en_description'))
                        <p class="invalid-item">
                            Entrer la description de journal en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir Document(PDF*)</label>
                    <input type="hidden" name="old_doc" value="{{ $newspaper->document }}">
                    <input type="file" accept="application/pdf" class="form-control" name="documents">
                    @if ($errors->has('documents'))
                        <p class="invalid-item">
                            Attacher le document
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label>Choisir l'image</label>
                    <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                        class="form-control">
                    <input type="hidden" name="old_img" value="{{ $newspaper->image }}">
                    {{-- <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src="{{ asset('uploads/newspapers/' . $newspaper->image) }}" /> --}}
                    <img style="width: 200px;cursor: pointer;" class="new-img-insert"
                        src="{{ asset('uploads/newspapers/images/' . array_values(explode(',', $newspaper->image))[0]) }}" />
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
            selector: "#description,#en_description",
            setup: function(editor) {
                editor.on('init', function() {
                    tinymce.get("description").setContent(`{!! $newspaper->description !!}`);
                    tinymce.get("en_description").setContent(`{!! $newspaper->en_description !!}`);
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
