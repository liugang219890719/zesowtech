@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '编辑分类'])

    <form action="" method="post" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row row-cards">
            <div class="col-sm-12">
                <a href="{{ route('backend.category.index') }}" class="btn btn-primary ml-auto">返回列表</a>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>分类名 @include('components.backend.required')</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="分类名" required>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>描述 @include('components.backend.required')</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="一句话介绍" required>{{$category->description}}</textarea>
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