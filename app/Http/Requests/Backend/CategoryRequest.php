<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:120',
            'parent_id'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请输入分类名字',
            'name.max' => '分类名字的长度不能超过120个字符',
            'parent_id.required'=>'请输入父分类',
        ];
    }

    public function filldata()
    {
        $data = [
            'name' => $this->input('name'),
            'description' => $this->input('description'),
            'parent_id' => $this->input('parent_id'),
        ];

        return $data;
    }
}
