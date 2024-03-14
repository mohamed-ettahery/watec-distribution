@extends('admin/layout')
@section('page')
    Marks
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('marks.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter une nouvelle marque</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les Marques</h2>
        </div>
        <div class='card-body'>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Date de création</th>
                        <th scope="col" style="width: 30%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($marks as $mark)
                        <tr>
                            <th scope="row">{{ $mark->id }}</th>
                            <td>
                                <img src="{{ asset('uploads/marks/' . $mark->image) }}" alt=""
                                    style="width: 100px;">
                            </td>
                            <td>{{ $mark->name }}</td>
                            <td>{{ $mark->created_at }}</td>
                            <td class="text-center">
                                <form action="{{ route('marks.edit', $mark->id) }}" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="modifier marque">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form id="delete-form-{{ $mark->id }}" class="d-inline-block"
                                    action="{{ route('marks.destroy', $mark->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="
                                    event.preventDefault();
                                    if(confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?'))
                                    document.getElementById('delete-form-{{ $mark->id }}').submit();
                                    "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer marque"><i
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
