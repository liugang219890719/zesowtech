@extends('layouts.member')

@section('member')

    <div class="row">
        <h3>上传试讲</h3>  <a href="{{ route('member.course.complete') }}" class="btn btn-primary ml-auto">返回列表</a>
    </div>
        <div class="row">  
              
                        <div class="col-sm-3">
                        
                          <img class="card-img-top" style="height: 300px;" data-echo="{{ image_url($course->thumb) }}" src="/images/loading.png">
                        </div>
                        <div class="col-sm-9">
                            <h2 >{{ $course->title }}</h2>
                            <p class="lh-30">
                                <span class="badge badge-primary">
                                    更新于 {{ $course->created_at->diffForHumans() }}
                                </span>
                                @if($course->charge)
                                    <span class="badge badge-danger">价格 {{$course->charge}}元</span>
                                @else
                                    <span class="badge badge-success">免费</span>
                                @endif
                            </p>
                        </div>
                    </div>
        <div class="row">
  
    <form action="{{ route('member.course.video.create') }}" method="post">
        @csrf
        <div class="row row-cards">
            
            <div class="col-sm-12">
              
                
                <div class="form-group">
                    <label>上传视频</label>
                    @include('frontend.member.video')
                </div>
                
            </div>
          
            
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">创建</button>
                </div>
            </div>
        </div>
    </form>

@section('js')
@include('components.frontend.aliyun_upload_js')
<script>
    $(function () {
        $('select[name="course_id"]').change(function () {
            var courseId = $(this).val();
            $.getJSON(`/backend/ajax/course/${courseId}/chapters`, function (res) {
                var html = '';
                $.each(res, function (key, item) {
                    html += `<option value='${item.id}'>${item.title}</option>`;
                })
                $('select[name="chapter_id"]').html(html);
            })
        });
    });
</script>

@endsection 
@endsection