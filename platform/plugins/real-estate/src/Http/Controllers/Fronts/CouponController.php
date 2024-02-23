<?php

namespace Botble\RealEstate\Http\Controllers\Fronts;

use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Facades\RealEstateHelper;
use Botble\RealEstate\Services\CouponService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CouponController extends BaseController
{
    public function __construct()
    {
        $this->middleware(function (Request $request, Closure $next) {
            if (! RealEstateHelper::isEnabledCreditsSystem()) {
                abort(404);
            }

            return $next($request);
        });
    }

    public function apply(Request $request, CouponService $couponService, BaseHttpResponse $response): BaseHttpResponse
    {
        $request->validate([
            'coupon_code' => ['required', 'string'],
        ]);

        $coupon = $couponService->getCouponByCode($request->input('coupon_code'));

        if ($coupon === null) {
            return $response
                ->setError()
                ->setMessage(__('This coupon is invalid!'));
        }

        $discountAmount = $couponService->getDiscountAmount(
            $coupon->type->getValue(),
            $coupon->value,
            Session::get('cart_total')
        );

        Session::put('applied_coupon_code', $coupon->code);
        Session::put('coupon_discount_amount', $discountAmount);

        return $response
            ->setMessage(__('Applied coupon ":code" successfully!', ['code' => $request->input('coupon_code')]));
    }

    public function remove(BaseHttpResponse $response): BaseHttpResponse
    {
        if (! Session::has('applied_coupon_code')) {
            return $response
                ->setError()
                ->setMessage(__('This coupon is not used yet!'));
        }

        Session::forget('applied_coupon_code');
        Session::forget('coupon_discount_amount');

        return $response
            ->setMessage(__('Removed coupon :code successfully!', ['code' => session('applied_coupon_code')]));
    }
}
