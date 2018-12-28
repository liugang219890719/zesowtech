<?php

/*
 * This file is part of the Qsnh/meedu.
 *
 * (c) XiaoTeng <616896861@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->input('keywords', '');
        $categorys = Category::when($keywords, function ($query) use ($keywords) {
            return $query->where('name', 'like', '%'.$keywords.'%');
        })
            ->orderByDesc('created_at')
            ->paginate(10);

        $categorys->appends($request->input());

        return view('backend.category.index', compact('categorys'));
    }

    public function create(Category $category)
    {
        $categories = $category->cats();
        return view('backend.category.create',compact('categories'));
    }

    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->filldata())->save();
        flash('分类成功', 'success');

        return back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('backend.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $course = Category::findOrFail($id);
        $course->fill($request->filldata())->save();
        flash('分类编辑成功', 'success');

        return back();
    }
}
