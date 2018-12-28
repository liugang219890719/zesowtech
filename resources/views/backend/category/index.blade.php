@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '分类列表'])

    <div class="row row-cards">
        <div class="col-sm-12">
            <a href="{{ route('backend.category.create') }}" class="btn btn-primary ml-auto">添加</a>
        </div>
        <div class="col-sm-12">
            <form action="" method="get">
                <div class="form-group">
                    <label>分类名字</label>
                    <input type="text" class="form-control" name="keywords" value="{{ request()->input('keywords', '') }}" placeholder="请输入关键字">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">过滤</button>
                    <a href="{{ route('backend.category.index') }}" class="btn btn-warning">重置</a>
                </div>
            </form>
        </div>
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名</th>
                    <th>描述</th>
                    <th>视频数</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categorys as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>{{$category->post_count}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                            <a href="{{route('backend.category.edit', $category)}}" class="btn btn-warning btn-sm">编辑</a>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="5">暂无记录</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-sm-12">
            {{$categorys->render()}}
        </div>
    </div>

@endsection