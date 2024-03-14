@extends('layouts.master')
@section('content')
    {{-- Start search content --}}
    <div class="search-content p-5">
        <div class="container">
            {{-- Start Header --}}
            <div class="info-result m-4 p-2">
                <h2 class="result-term best-black">résultat de la recherche pour : <span
                        class="term text-primary">{{ $term }}</span>
                </h2>
                <h6 class="result-count best-black">Résultats : <span class="count text-primary">{{ $productCount }}</span>
                </h6>
            </div>
            {{-- End Header --}}
            {{-- Start Display Result --}}
            <div class="poducts-results">
                <div class="row">
                    <div class="col-md-9">
                        @forelse ($products as $product)
                            <div class="result-item mb-2">
                                <a href="{{ route('product.details', $product->slug) }}" class="btn">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="img-box">
                                                <img src='{{ asset("/uploads/products/{$product->image}") }}'
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="description-box pt-3">
                                                <p class="category-name">{{ $product->category->name }}</p>
                                                <h4 class="product-name best-black">
                                                    {{ $product->name }}
                                                </h4>
                                                @if ($product->mark)
                                                    <img src="{{ asset('uploads/marks/' . $product->mark->image) }}"
                                                        @if($product->mark->name != 'GEMAS') style="width: 80px;" @endif
                                                        alt="{{ $product->mark->name }}" >
                                                @endif
                                                {{-- <p class="product-description best-black">
                                                    {{ $product }}
                                                </p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p>Aucun résultat trouvé.</p>
                        @endforelse
                    </div>
                    <div class="col-md-3">
                        <div class="aside-categories mb-3">
                            <div class="card">
                                <div class="card-header">Catégories</div>
                                <div class="card-body">
                                    <div class="accordion" id="accordionExample">
                                        @foreach (\App\Http\Controllers\CategoryController::getMainCategories() as $key => $main_cat)
                                            <div class="accordion-item">
                                                @if ($main_cat->children->count() > 0)
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse{{ $main_cat->id }}"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <a href="{{ route('category.show', $main_cat) }}"
                                                                class="prop-btn">
                                                                {{ $main_cat->name }} </a>
                                                        </button>
                                                    </h2>
                                                    {{-- <div id="collapse{{ $main_cat->id }}"
                                                    class="accordion-collapse collapse @if ($key == 0) show @endif"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample"> --}}
                                                    <div id="collapse{{ $main_cat->id }}"
                                                        class="accordion-collapse collapse" aria-labelledby="headingOne"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <ul class="list-unstyled">
                                                                @foreach (\App\Http\Controllers\CategoryController::getChildsCategories($main_cat->id) as $cat)
                                                                    <li><i class="fas fa-angle-right"></i> <a
                                                                            href="{{ route('category.show', $cat) }}">{{ $cat->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @else
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button remove-accordion-arrow collapsed"
                                                            type="button">
                                                            <a href="{{ route('category.show', $main_cat) }}"
                                                                class="prop-btn">
                                                                {{ $main_cat->name }} </a>
                                                        </button>
                                                    </h2>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Start Pagination --}}
                    <div class="col-md-9 pagination-box mt-3">
                        {{ $products->links('vendor.pagination.bootstrap-5') }}
                    </div>
                    {{-- End Pagination --}}
                </div>
            </div>
            {{-- End Display Result --}}
        </div>
    </div>
    {{-- Start search content --}}
@endsection
