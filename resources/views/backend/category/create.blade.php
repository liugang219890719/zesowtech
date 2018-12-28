@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '添加分类'])

    <form action="" method="post">
        @csrf
        <div class="row row-cards">
            <div class="col-sm-12">
                <a href="{{ route('backend.category.index') }}" class="btn btn-primary ml-auto">返回列表</a>
            </div>

            <div class="col-sm-7">
                <div class="form-group">
                    <label>父分类 @include('components.backend.required')</label>
                    <select name="parent_id" class="form-control">
                        <option value="0">无父分类</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @foreach($category->children as $child)
                                <option value="{{$child->id}}" disabled="disabled">|----{{$child->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-7">
                <div class="form-group">
                    <label>分类名 @include('components.backend.required')</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="分类名" required>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>描述 @include('components.backend.required')</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="一句话介绍" required></textarea>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">创建</button>
                </div>
            </div>
        </div>
    </form>

@endsection