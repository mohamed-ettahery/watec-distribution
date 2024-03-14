@extends('admin/layout')
@section('page')
    Ajouter marque
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h3 class="text-start">Les Marques</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('marks.index') }}">Marques</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ajouter</li>
                </ol>
            </nav>
        </div>
        <div class='card-body'>
            <p>Ajouter une nouvelle marque</p>
            <form action="{{ route('marks.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <label for="markName">Nom de marque</label>
                    <input type="text" class="form-control" name="name" id="markName" value="{{ old('name') }}"
                        placeholder="Entrer le nom de marque">
                    @if ($errors->has('name'))
                        <p class="invalid-item">
                            Entrer le nom de marque
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="markName">lien de site</label>
                    <input type="url" class="form-control" name="url" id="markUrl" value="{{ old('url') }}"
                        placeholder="exemple : http:\\www.watec.com">
                    @if ($errors->has('url'))
                        <p class="invalid-item">
                            Entrer url de site de marque
                        </p>
                    @endif
                </div>
                <div class="form-group mb-2">
                    <label for="markName">Choisir l'image</label>
                    <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                        class="form-control" name="img" placeholder="test">
                    <img style="width: 200px;cursor: pointer;" class="new-img-insert" src='{{asset("/assets/admin/img/upload.png")}}' />
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
