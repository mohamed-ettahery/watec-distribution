@extends('admin/layout')
@section('page')
    les produits
@endsection
@section('content')
    <div class="text-end mb-3">
        <a href="{{ route('products.create') }}" class="btn text-primary"><i class="fa-solid fa-plus"></i>
            Ajouter un nouveau produit</a>
    </div>
    <div class='card'>
        <div class='card-header'>
            <h2 class="blue-text-gradient">Les Produits</h2>
        </div>
        <div class='card-body'>
            <table class="table table-responsive" id="myTable">
                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Image</th>
                        <th scope="col" style="width: 22%;">Nom</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Marque</th>
                        {{-- <th scope="col" style="width: 22%;">Date de création</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 22%;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            {{-- <th scope="row">{{ $product->id }}</th> --}}
                            <td>
                                <img src="{{ asset('uploads/products/' . array_values(explode(',', $product->image))[0]) }}"
                                    alt="" style="width: 50px;">
                                {{-- <img src="{{ asset('uploads/products/' . $product->image) }}" alt=""
                                    style="width: 50px;"> --}}
                            </td>
                            <td class="pt-td limit-string"><span data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="{{ $product->name }}">{{ $product->name }}</span></td>
                            <td class="pt-td">{{ $product->category->name }}</td>
                            <td class="pt-td">
                                @if ($product->mark_id)
                                    {{ $product->mark->name }}
                                @else
                                    Non
                                @endif
                            </td>
                            {{-- <td class="pt-td">{{ $product->created_at }}</td> --}}
                            <td class="pt-td">
                                @if ($product->status)
                                    <span class="badge rounded-pill text-bg-success">Active</span>
                                @else
                                    <span class="badge rounded-pill text-bg-danger">Masqueé</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <form action="{{ route('products.edit', $product->id) }}" class="d-inline-block">
                                    @csrf
                                    <button type="submit" class="btn btn-success" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="modifier produit">
                                        <i class="fa-solid fa-pen-to-square"></i></button>
                                </form>
                                <form action="{{ route('products.status', $product->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @if (!$product->status)
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="activer le produit">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="masquer le produit">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </button>
                                    @endif
                                </form>
                                <form id="delete-form-{{ $product->id }}" class="d-inline-block"
                                    action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="
                                    event.preventDefault();
                                    if(confirm('êtes-vous sûr, vous voulez le supprimer définitivement ?'))
                                    document.getElementById('delete-form-{{ $product->id }}').submit();
                                    "
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="supprimer produit"><i
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
