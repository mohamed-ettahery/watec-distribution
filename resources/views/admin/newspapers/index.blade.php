@extends('admin/layout')
@section('page')
    les journaux
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('newspapers.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter un nouveau journal</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les journaux</h2>
        </div>
        <div class='card-body'>
            <table class="table table-responsive" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Date journal</th>
                        <th scope="col">Date Création</th>
                        <th scope="col" style="width: 22%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newspapers as $newspaper)
                        <tr>
                            <th scope="row">{{ $newspaper->id }}</th>
                            <td>
                                <img src="{{ asset('uploads/newspapers/images/' . array_values(explode(',', $newspaper->image))[0]) }}"
                                    alt="" style="width: 50px;">
                            </td>
                            <td class="pt-td limit-string"><span data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="{{ $newspaper->title }}">{{ $newspaper->title }}</span></td>
                            <td class="pt-td">{{ $newspaper->newspaper_date }}</td>
                            <td class="pt-td">{{ $newspaper->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ asset('uploads/newspapers/documents/' . $newspaper->document) }}"
                                    class="btn btn-primary" target="blank"><i class="fa-solid fa-eye"></i></a>
                                <form action="{{ route('newspapers.edit', $newspaper->id) }}" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="modifier journal">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form id="delete-form-{{ $newspaper->id }}" class="d-inline-block"
                                    action="{{ route('newspapers.destroy', $newspaper->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="
                                    event.preventDefault();
                                    if(confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?'))
                                    document.getElementById('delete-form-{{ $newspaper->id }}').submit();
                                    "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer journal"><i
                                            class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                }

            });
        });
    </script>
@endsection
