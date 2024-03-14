@extends('admin/layout')
@section('page')
    Les admins
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('admins.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter un nouveau admin</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les admins</h2>
        </div>
        <div class='card-body'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de création</th>
                        <th scope="col" style="width: 30%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                        <tr>
                            <th scope="row" class="pt-td">{{ $admin->id }}</th>
                            <td>
                                <img src="{{ asset('uploads/profiles/' . $admin->image) }}" alt=""
                                    style="width: 45px;" class="rounded-circle">
                            </td>
                            <td class="pt-td">{{ $admin->name }}</td>
                            <td class="pt-td">{{ $admin->email }}</td>
                            <td class="pt-td">{{ $admin->created_at }}</td>
                            @if (session()->get('admin') != $admin->id)
                                <td class="text-center">
                                    <form action="{{ route('admins.edit', $admin->id) }}" class="d-inline-block">
                                        @csrf
                                        <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="modifier admin">
                                            <i class="fa-solid fa-pen-to-square"></i></button>
                                    </form>
                                    <form id="delete-form-{{ $admin->id }}" class="d-inline-block"
                                        action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="
                                    event.preventDefault();
                                    if(confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?'))
                                    document.getElementById('delete-form-{{ $admin->id }}').submit();
                                    "
                                            data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer admin"><i
                                                class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
