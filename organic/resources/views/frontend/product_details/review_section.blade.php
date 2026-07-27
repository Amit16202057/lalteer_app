<div class="mb-4">
    <div class="p-3 p-sm-4">
        @php
            $total = 0;
            $total += $detailedProduct->reviews->where('status', 1)->count();
        @endphp
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h1 class="ml-1 fs-20 fw-700">{{ translate('REVIEWS') }} ({{ $total }})</h1>
            </div>
            <div style="margin-left: 10px;">
                <a href="javascript:void(0);" onclick="product_review('{{ $detailedProduct->id }}')"
                    class="btn btn-secondary-base fw-400 rounded-0 text-white">
                    <span class="d-md-inline-block">
                        {{ translate('Rate this Products') }}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Ratting -->
    {{-- <div class="px-3 px-sm-4 mb-4">
        <div class="border border-secondary-base bg-soft-secondary-base p-3 p-sm-4">
            <div class="row align-items-center">
                <div class="col-md-8 mb-3">
                    <div class="d-flex align-items-center justify-content-between justify-content-md-start">
                        <div class="w-100 w-sm-auto">
                            <span class="fs-36 mr-3">{{ $detailedProduct->rating }}</span>
                            <span class="fs-14 mr-3">{{ translate('out of 5.0') }}</span>
                        </div>
                        <div
                            class="mt-sm-3 w-100 w-sm-auto d-flex flex-wrap justify-content-end justify-content-md-start">
                            @php
                                $total = 0;
                                $total += $detailedProduct->reviews->where('status', 1)->count();
                            @endphp
                            <span class="rating rating-mr-2">
                                {{ renderStarRating($detailedProduct->rating) }}
                            </span>
                            <span class="ml-1 fs-14">({{ $total }}
                                {{ translate('reviews') }})</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-right">
                    <a href="javascript:void(0);" onclick="product_review('{{ $detailedProduct->id }}')"
                        class="btn btn-secondary-base fw-400 rounded-0 text-white">
                        <span class="d-md-inline-block"> {{ translate('Rate this Products') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div> --}}

    <script>
        function product_review(product_id) {
            // Check if user is authenticated
            @if (Auth::check())
                $.post('{{ route('product_review_modal') }}', {
                    _token: '{{ @csrf_token() }}',
                    product_id: product_id
                }, function(data) {
                    $('#product-review-modal-content').html(data);
                    $('#product-review-modal').modal('show', {
                        backdrop: 'static'
                    });
                    AIZ.extra.inputRating();
                });
            @else
                // Show login modal if the user is not authenticated
                $('#login_modal').modal('show');
            @endif
        }
    </script>
    <!-- Reviews -->
    @include('frontend.product_details.reviews')
</div>
