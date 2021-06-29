<?php

if (!function_exists('roundStar')) {
    function roundStar($sumStar, $sumVote)
    {
        if ($sumStar == 0 ||
            $sumVote == 0 ||
            $sumStar == 0 && $sumVote == 0
        ) {
            return 0;
        }
        $stars = round($sumStar / $sumVote);

        return $stars;
    }
}

if (!function_exists('resolveStarsVote')) {
    function resolveStarsVote(int $sumStar, int $sumVote): string
    {
        if ($sumStar == 0 ||
            $sumVote == 0 ||
            $sumStar == 0 && $sumVote == 0
            ) {
            return '<i class="far fa-star text-muted"></i>
            <i class="far fa-star text-muted"></i>
            <i class="far fa-star text-muted"></i>
            <i class="far fa-star text-muted"></i>
            <i class="far fa-star text-muted"></i>';
        } else {
            $stars = roundStar($sumStar, $sumVote);
            if ($stars == 1) {
                return '<i class="fas fa-star"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>';
            } elseif ($stars == 2) {
                echo '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>';
            } elseif ($stars == 3) {
                return '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star text-muted"></i>
                <i class="far fa-star text-muted"></i>';
            } elseif ($stars == 4) {
                return '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star text-muted"></i>';
            } else {
                return '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>';
            }
        }
    }
}

if (!function_exists('renderAjaxHTML')) {
    function renderAjaxHTML(
        string $response,
        string $productsCategory,
        object $products,
        string $newArrival,
        string $addToCart
    ): void {
        foreach ($products as $product) {
            $roundStars = roundStar($product->number_of_vote_submissions, $product->total_vote);
            $resolveStarsVote = resolveStarsVote($product->number_of_vote_submissions, $product->total_vote);
            foreach ($product->categories as $productCate) {
                $productsCategory .= "<a class='d-inline-block text-body small font-weight-bold mb-1'
                                         href='/categories/$productCate->id'>$productCate->name</a>";
            }
            $response .= "<div class='col-sm-6 col-lg-4 px-2 px-sm-3 mb-3 mb-sm-5'>
            <!-- Product -->
            <div class='card border shadow-none text-center h-100'>
                <div class='position-relative'>
                    <img class='card-img-top' src='/$product->thumbnail' alt='$product->name'>
                    <div class='position-absolute top-0 left-0 pt-3 pl-3'>
                        <span class='badge badge-success badge-pill'>$newArrival</span>
                    </div>
                    <div class='position-absolute top-0 right-0 pt-3 pr-3'>
                        <button type='button'
                                class='btn btn-xs btn-icon btn-outline-secondary rounded-circle'
                                data-toggle='tooltip'
                                data-placement='top'
                                title=''
                                data-original-title='Save for later'>
                        <i class='fas fa-heart'></i>
                        </button>
                    </div>
                </div>
                <div class='card-body pt-4 px-4 pb-0'>
                    <div class='mb-2'>$productsCategory
                        <span class='d-block font-size-1'>
                        <a class='text-inherit' href='single-product.html'>$product->name</a>
                        </span>
                        <div class='d-block'>
                            <span class='text-dark font-weight-bold'>$product->price</span>
                        </div>
                    </div>
                </div>
                <div class='card-footer border-0 pt-0 pb-4 px-4'>
                    <div class='mb-3'>
                        <a class='d-inline-flex align-items-center small' href='#'>
                            <div class='text-warning mr-2'>$resolveStarsVote</div>
                            <span>$roundStars</span>
                        </a>
                    </div>
                    <button type='button'
                            class='btn btn-sm btn-outline-primary btn-pill transition-3d-hover'>$addToCart</button>
                </div>
            </div>
            <!-- End Product -->
            </div>";
        }
        echo $response;
    }
}

if (!function_exists('handingProductAndQuantity')) {
    function handingProductAndQuantity(array $cartData): array
    {
        $resolvedCart = [];
        $resolvedCart["cart"] = [];
        $resolvedCart["item"] = [];

        foreach ($cartData as $key => $value) {
            $singleItem = [
                'product_id' => $key,
                'product_quantity' => $value,
            ];
            $singleItemId = $key;
            array_push($resolvedCart["cart"], $singleItem);
            array_push($resolvedCart["item"], $singleItemId);
        }

        return $resolvedCart;
    }
}

if (!function_exists('paymentMethod')) {
    function paymentMethod($paymentMethodId)
    {
        if ($paymentMethodId == 0) {
            return trans('message.on_delivery');
        }

        return trans('message.payment_online');
    }
}

if (!function_exists('orderStatus')) {
    function orderStatus($orderStatusId)
    {
        switch ($orderStatusId) {
            case 0:
                return trans('message.wait_for_confirmation');
                break;
            case 1:
                return trans('message.confirmed');
                break;
            case 2:
                return trans('message.ordered');
                break;
            case 3:
                return trans('message.delivery');
                break;
            case 4:
                return trans('message.delivered');
                break;
            case 5:
                return trans('message.received');
                break;
            default:
                return trans('message.received');
        }
    }
}
