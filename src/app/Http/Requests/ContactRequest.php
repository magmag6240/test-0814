<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'fullName' => ['required'],
            'email' => ['required', 'email'],
            'zip' => ['required', 'size:8'],
            'address' => ['required'],
            'opinion' => ['required', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => '名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '有効なメールアドレス形式で入力してください',
            'zip.required' => '郵便番号を入力してください',
            'zip.size' => '郵便番号はハイフンありの半角8文字で入力してください',
            'address.required' => '住所を入力してください',
            'opinion.required' => 'ご意見を入力してください',
            'opinion.max' => 'ご意見は120字以内で入力してください',
        ];
    }
}
