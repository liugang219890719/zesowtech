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

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TagRequest;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $keywords = $request->input('keywords', '');
        $tags = Tag::when($keywords, function ($query) use ($keywords) {
            return $query->where('name', 'like', '%'.$keywords.'%');
        })
            ->orderByDesc('created_at')
            ->paginate(10);

        $tags->appends($request->input());

        return view('backend.tag.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tag.create');
    }

    public function store(TagRequest $request, Tag $tag)
    {
        $tag->fill($request->filldata())->save();
        flash('添加标签成功', 'success');

        return back();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        return view('backend.tag.edit', compact('tag'));
    }

    public function update(TagRequest $request, $id)
    {
        $course = Tag::findOrFail($id);
        $course->fill($request->filldata())->save();
        flash('标签编辑成功', 'success');

        return back();
    }
}
