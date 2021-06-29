<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute phải được chấp nhận.',
    'active_url' => ':attribute không phải là một URL hợp lệ.',
    'after' => ':attribute phải là một ngày sau :date.',
    'after_or_equal' => ':attribute phải là một ngày sau hoặc là ngày :date.',
    'alpha' => ':attribute chỉ được chứa các chữ cái.',
    'alpha_dash' => ':attribute chỉ được chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute chỉ được chứa các chữ cái và số.',
    'array' => ':attribute phải là một mảng.',
    'before' => ':attribute phải là một ngày sau :date.',
    'before_or_equal' => 'The :attribute phải là một ngày sau hoặc là ngày :date.',
    'between' => [
        'numeric' => ':attribute phải ở giữa :min và :max.',
        'file' => ':attribute phải ở giữa :min và :max kilobytes.',
        'string' => ':attribute phải ở giữa :min và :max characters.',
        'array' => ':attribute phải ở giữa :min và :max items.',
    ],
    'boolean' => ':attribute chỉ có thể phải đúng hoặc sai.',
    'confirmed' => ':attribute xác nhận không phù hợp.',
    'current_password' => 'Mật khẩu không đúng.',
    'date' => ':attribute Không phải là ngày hợp lệ.',
    'date_equals' => ':attribute phải là ngày :date.',
    'date_format' => ':attribute không phù hợp với định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute phải là :digits chữ số.',
    'digits_between' => ':attribute phải ở giữa :min và :max chữ số.',
    'dimensions' => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct' => ':attribute có giá trị trùng lặp.',
    'email' => ':attribute phải là một địa chỉ email hợp lệ.',
    'ends_with' => ':attribute must end with one of the following: :values.',
    'exists' => ':attribute đã chọn không hợp lệ.',
    'file' => ':attribute phải là một tệp.',
    'filled' => ':attribute phải có một giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ':attribute phải lớn hơn :value kilobytes.',
        'string' => ':attribute phải lớn hơn :value ký tự.',
        'array' => ':attribute phải có nhiều hơn :value phần tử.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file' => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải lớn hơn hoặc bằng :value ký tự.',
        'array' => ':attribute phải có :value phần tử hoặc nhiều hơn.',
    ],
    'image' => ':attribute phải là một hình ảnh.',
    'in' => ':attribute đã chọn không hợp lệ.',
    'in_array' => ':attribute không tồn tại ở :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là một địa chỉ IPv4 hợp lệ.',
    'ipv6' => ':attribute phải là một địa chỉ IPv6 hợp lệ.',
    'json' => ':attribute phải là một chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ':attribute phải nhỏ hơn :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn :value ký tự.',
        'array' => ':attribute phải có ít hơn :value phần tử.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ':attribute phải nhỏ hơn hoặc bằng :value ký tự.',
        'array' => ':attribute không được có nhiều hơn :value phần tử.',
    ],
    'max' => [
        'numeric' => ':attribute không được lớn hơn :max.',
        'file' => ':attribute không được lớn hơn :max kilobytes.',
        'string' => ':attribute không được lớn hơn :max ký tự.',
        'array' => ':attribute không được có nhiều hơn :max phần tử.',
    ],
    'mimes' => ':attribute phải là một tệp loại: :values.',
    'mimetypes' => ':attribute phải là một tệp loại: :values.',
    'min' => [
        'numeric' => ':attribute ít nhất phải là :min.',
        'file' => ':attribute ít nhất phải là :min kilobytes.',
        'string' => ':attribute ít nhất phải là :min ký tự.',
        'array' => ':attribute phải có ít nhất :min phần tử.',
    ],
    'multiple_of' => ':attribute phải là bội số của :value.',
    'not_in' => ':attribute đã chọn không hợp lệ.',
    'not_regex' => ':attribute định dạng không hợp lệ.',
    'numeric' => ':attribute phải là một số.',
    'password' => 'password không chính xác.',
    'present' => ':attribute phải tồn tại.',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => ':attribute được yêu cầu bắt buộc.',
    'required_if' => ':attribute được yêu cầu khi :other là :value.',
    'required_unless' => ':attribute bắt buộc trừ khi :other trong :values.',
    'required_with' => ':attribute được yêu cầu khi :values tồn tại.',
    'required_with_all' => ':attribute được yêu cầu khi :values tồn tại.',
    'required_without' => ':attribute được yêu cầu khi :values không tồn tại.',
    'required_without_all' => ':attribute được yêu cầu khi không :values tồn tại.',
    'prohibited' => ':attribute bị cấm.',
    'prohibited_if' => ':attribute bị cấm khi :other là :value.',
    'prohibited_unless' => ':attribute bị cấm trừ khi :other trong :values.',
    'same' => ':attribute và :other phải phù hợp.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => ':attribute phải là :size kilobytes.',
        'string' => ':attribute phải là :size ký tự.',
        'array' => ':attribute phải chứa :size phần tử..',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng một trong những điều sau: :values.',
    'string' => ':attribute phải là một chuỗi.',
    'timezone' => ':attribute phải là một khu vực hợp lệ.',
    'unique' => ':attribute đã được thực hiện.',
    'uploaded' => ':attribute không tải lên được.',
    'url' => ':attribute định dạng không hợp lệ.',
    'uuid' => ':attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
