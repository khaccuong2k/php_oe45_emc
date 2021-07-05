<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'content' => 'required|max:255',
            'product_id' => 'numeric',
        ];
    }

    public function message()
    {
        return [
            'content.required' => trans('message.comment_content_required'),
            'content.max' => trans('message.comment_content_max_255'),
            'product_id' => trans('message.invalid_product'),
        ];
    }
}
