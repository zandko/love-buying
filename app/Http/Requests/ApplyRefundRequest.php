<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplyRefundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'return_reason_id' => 'required',
            'opened' => 'required',
            'comment' => 'nullable|string|max:255',
        ];
    }

    public function attrbutes()
    {
        return [
            'return_reason_id' => '理由',
            'opened' => '产品是否打开',
            'comment' => '其他详情',
        ];
    }
}
