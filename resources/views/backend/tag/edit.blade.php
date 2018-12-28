@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '编辑标签'])

    <form action="" method="post" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="row row-cards">
            <div class="col-sm-12">
                <a href="{{ route('backend.tag.index') }}" class="btn btn-primary ml-auto">返回列表</a>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>分类名 @include('components.backend.required')</label>
                    <input type="text" class="form-control" name="name" value="{{$tag->name}}" placeholder="分类名" required>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">更新</button>
                </div>
            </div>
        </div>
    </form>

@endsection