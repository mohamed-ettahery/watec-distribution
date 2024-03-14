@extends('admin/layout')
@section('page')
    les catégories
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter une nouvelle catégorie</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les Catégories</h2>
        </div>
        <div class='card-body'>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        {{-- <th scope="col">Parent</th> --}}
                        <th scope="col">Imbrication</th>
                        <th scope="col" style="width: 30%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            {{-- <td>{{ $category->parent->name != null ? $category->parent->name : 'Catégorie Principale' }} --}}
                            {{-- <td>{{ $category->parent->name ?? 'Catégorie Principale' }} --}}
                            <td>{{ \App\Http\Controllers\admin\CategoryController::getParentsTree($category, $category->name) }}
                            </td>
                            <td class="text-center">
                                <form action="{{ route('categories.edit', $category->slug) }}" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="modifier catégorie">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form id="delete-form-{{ $category->slug }}" class="d-inline-block"
                                    action="{{ route('categories.destroy', $category->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="
                                    event.preventDefault();
                                    if(confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?'))
                                    document.getElementById('delete-form-{{ $category->slug }}').submit();
                                    "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer catégorie"><i
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
