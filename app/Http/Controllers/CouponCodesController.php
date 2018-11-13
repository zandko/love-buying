<?php

namespace App\Http\Controllers;

use App\Models\CouponCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exceptions\CouponCodeUnavailableException;

class CouponCodesController extends Controller
{
    /*查询优惠卷*/
    public function show($code,Request $request)
    {

        if (!$record = CouponCode::where('code', $code)->first()) {
            throw new CouponCodeUnavailableException('优惠券不存在');
        }

        $record->checkAvailable($request->user());

        return $record;
    }
}
