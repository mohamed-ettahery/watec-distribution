@extends('admin/layout')
@section('page')
    Profile
@endsection
@section('content')
    <div class='card'>
        <div class='card-header'>
            <h5 class="text-start">Modifier votre profile</h5>
        </div>
        <div class='card-body'>
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ asset('uploads/profiles/' . $admin->image) }}" width="200px" alt="Profile Image"
                            class="img-fluid rounded-circle mx-auto d-block" />
                        <h4 class="text-center my-3">{{ $admin->name }}</h4>
                        <p class="text-center">{{ $admin->email }}</p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary mx-auto d-block" onclick="toggleForm()">
                            <i class="fa-solid fa-user-pen"></i> Modifier
                        </button>
                    </div>
                </div>
            </div>

            <!-- Form for modifying profile information -->
            <div class="container mt-5 d-none" id="form-container">
                <form id="edit-form" action="{{ route('setting.updateProfile') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="adminName">changer profile</label><br />
                        <input style="display:none;" accept="image/*" type="file" id="img-file" name="image"
                            class="form-control">
                        <img style="width: 200px;cursor: pointer;" class="new-img-insert mb-2 mt-2"
                            src='{{ asset('/assets/admin/img/upload.png') }}' />
                        @if ($errors->has('image'))
                            <p class="invalid-item">
                                Choisir une image de format (png/jpg/jpeg/webp)(moins de 2 mp)
                            </p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Nom d'utilisateur</label>
                        <input type="text" class="form-control check input-name" name="name" id="name"
                            value="{{ $admin->name }}" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control check input-email" name="email" id="email"
                            value="{{ $admin->email }}" required />
                    </div>
                    <div class="btns-box text-center mt-3">
                        <button type="submit" disabled class="btn btn-primary btn-save d-inline-block">
                            <i class="fa-solid fa-circle-check"></i> Sauvegarder
                        </button>
                        <button type="button" class="btn btn-secondary d-inline-block" onclick="toggleForm()">
                            <i class="fa-solid fa-xmark"></i> Annuler
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('js')
    <script>
        function toggleForm() {
            document.getElementById("form-container").classList.toggle("d-none");
            document.querySelector(".card-header").classList.toggle("d-none");
            document.querySelector(".card-footer").classList.toggle("d-none");
        }

        const input = document.getElementById('img-file');
        const newImgField = document.querySelector('.new-img-insert');

        newImgField.addEventListener("click", function() {
            input.click();
        });

        input.addEventListener('change', function(e) {
            toggleBtnSave();
            const reader = new FileReader()
            reader.onload = function() {
                var src = reader.result
                $('.new-img-insert').attr("src", src);
            }
            reader.readAsDataURL(input.files[0])
        }, false);

        // const inputs = document.querySelectorAll('#edit-form .check');

        $('#edit-form .check').on('input', toggleBtnSave);

        function toggleBtnSave() {
            "use strict";
            if ($("#edit-form .input-name").val().length == 0 || $("#edit-form .input-email").val().length == 0) {
                $('.btn-save').attr('disabled', 'disabled');
            } else {
                $('.btn-save').removeAttr('disabled');
            }
        }
    </script>
@endsection
