@extends('admin/layout')
@section('page')
    Ajouter un journal
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les journaux</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('newspapers.index') }}">journaux</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Ajouter un nouveau journal</p>
            <form action="{{ route('newspapers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="newspaperTitle">Titre de journal</label>
                    <input type="text" class="form-control" name="title" id="newspaperTitle"
                        value="{{ old('title') }}" placeholder="Entrer le titre de journal">
                    @if ($errors->has('title'))
                        <p class="invalid-item">
                            Entrer le titre de journal
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="newspaperTitle">Titre de journal (en anglais)</label>
                    <input type="text" class="form-control" name="en_title" id="newspaperEnTitle"
                        value="{{ old('en_title') }}" placeholder="Entrer le titre de journal en anglais">
                    @if ($errors->has('en_title'))
                        <p class="invalid-item">
                            Entrer le titre de journal en anglais
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="newspaperDate">Date de journal</label>
                    <input type="date" class="form-control" name="newspaper_date" id="newspaperDate"
                        value="{{ old('newspaper_date') }}" placeholder="Entrer la date de journal">
                    @if ($errors->has('newspaper_date'))
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
                    <input type="file" accept="application/pdf" class="form-control" name="document">
                    @if ($errors->has('document'))
                        <p class="invalid-item">
                            Attacher le document
                        </p>
                    @endif
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
