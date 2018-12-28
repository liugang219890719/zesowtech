@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '添加标签'])

    <form action="" method="post">
        @csrf
        <div class="row row-cards">
            <div class="col-sm-12">
                <a href="{{ route('backend.tag.index') }}" class="btn btn-primary ml-auto">返回列表</a>
            </div>
            <div class="col-sm-7">
                <div class="form-group">
                    <label>标签名 @include('components.backend.required')</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="标签名" required>
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