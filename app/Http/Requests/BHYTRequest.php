<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BHYTRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'so_bhyt' => 'required|string|max:255',
            'ngay_cap_bhyt' => 'required|date',
            'noi_cap_bhyt' => 'required|string|max:255',
            'so_bhxh' => 'required|string|max:255',
            'ngay_cap_bhxh' => 'required|date',
            'noi_cap_bhxh' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'so_bhyt.required' => 'Số BHYT là bắt buộc.',
            'so_bhyt.string' => 'Số BHYT phải là chuỗi ký tự.',
            'so_bhyt.max' => 'Số BHYT không được vượt quá 255 ký tự.',
            'ngay_cap_bhyt.required' => 'Ngày cấp BHYT là bắt buộc.',
            'ngay_cap_bhyt.date' => 'Ngày cấp BHYT phải là ngày hợp lệ.',
            'noi_cap_bhyt.required' => 'Nơi cấp BHYT là bắt buộc.',
            'noi_cap_bhyt.string' => 'Nơi cấp BHYT phải là chuỗi ký tự.',
            'noi_cap_bhyt.max' => 'Nơi cấp BHYT không được vượt quá 255 ký tự.',
            'so_bhxh.required' => 'Số BHXH là bắt buộc.',
            'so_bhxh.string' => 'Số BHXH phải là chuỗi ký tự.',
            'so_bhxh.max' => 'Số BHXH không được vượt quá 255 ký tự.',
            'ngay_cap_bhxh.required' => 'Ngày cấp BHXH là bắt buộc.',
            'ngay_cap_bhxh.date' => 'Ngày cấp BHXH phải là ngày hợp lệ.',
            'noi_cap_bhxh.required' => 'Nơi cấp BHXH là bắt buộc.',
            'noi_cap_bhxh.string' => 'Nơi cấp BHXH phải là chuỗi ký tự.',
            'noi_cap_bhxh.max' => 'Nơi cấp BHXH không được vượt quá 255 ký tự.',
        ];
    }
}
