@extends('admin/layout')
@section('page')
    Mot de passe
@endsection
@section('css')
    <style>
        .box-form {
            width: 400px;
            margin: 20px auto;
        }
    </style>
@endsection
@section('content')
    @if (session()->has('errorOldPsw'))
        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
            <div>
                <i class="fa-solid fa-triangle-exclamation"></i> {{ session()->get('errorOldPsw') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('errorMatching'))
        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
            <div>
                <i class="fa-solid fa-triangle-exclamation"></i> {{ session()->get('errorMatching') }}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class='card'>
        <div class='card-header'>
            <h5 class="text-start">Changer votre mot de passe</h5>
        </div>
        <div class='card-body'>
            <div class="box-form">
                <form action="{{ route('setting.updatePassword') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label>Ancien mot de passe</label>
                        <input type="password" class="form-control" name="old_psw" value="{{ old('old_psw') }}"
                            placeholder="Entrer l'ancien mot de passe">
                        @if ($errors->has('old_psw'))
                            <p class="invalid-item">
                                Entrer ancien mot de passe
                            </p>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label>Nouveau mot de passe</label>
                        <input type="password" class="form-control" name="new_psw" value="{{ old('new_psw') }}"
                            placeholder="Entrer le nouveau mot de passe">
                        @if ($errors->has('new_psw'))
                            <p class="invalid-item">
                                Entrer nouveau mot de passe
                            </p>
                        @endif
                    </div>
                    <div class="form-group mb-2">
                        <label>Ancien mot de passe</label>
                        <input type="password" class="form-control" name="c_new_psw" value="{{ old('c_new_psw') }}"
                            placeholder="Entrer la confirmation de mot de passe">
                        @if ($errors->has('c_new_psw'))
                            <p class="invalid-item">
                                Entrer la confimation de nouveau mot de passe
                            </p>
                        @endif
                    </div>
                    <div class="box-btn">
                        <button type="submit" class="btn btn-primary">Changer mot de passe <i
                                class="fa-solid fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
