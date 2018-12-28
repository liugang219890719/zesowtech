@extends('layouts.backend')

@section('body')

    @include('components.breadcrumb', ['name' => '标签列表'])

    <div class="row row-cards">
        <div class="col-sm-12">
            <a href="{{ route('backend.tag.create') }}" class="btn btn-primary ml-auto">添加</a>
        </div>
        <div class="col-sm-12">
            <form action="" method="get">
                <div class="form-group">
                    <label>标签名字</label>
                    <input type="text" class="form-control" name="keywords" value="{{ request()->input('keywords', '') }}" placeholder="请输入关键字">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">过滤</button>
                    <a href="{{ route('backend.tag.index') }}" class="btn btn-warning">重置</a>
                </div>
            </form>
        </div>
        <div class="col-sm-12">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>标签名</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @forelse($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>
                            <a href="{{route('backend.tag.edit', $tag)}}" class="btn btn-warning btn-sm">编辑</a>

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
            {{$tags->render()}}
        </div>
    </div>

@endsection