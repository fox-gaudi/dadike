@extends('home.public.header')

@section('meta')
<style>
    label{
        position: relative;
    }
    #fileinp{
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
    #btn{
        margin-right: 5px;
    }
    #text{
        color: red;
    }
</style>
@endsection

@section('content_01')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="page-caption">
                    <h2 class="page-title">个人中心</h2>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="/">主页</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="widget widget-contact">
                    @if(session('psuccess'))
                        <p>success!</p>
                    @endif
                    @if(session('perror'))
                        <p>error!</p>
                    @endif
                    <h3 class="widget-title">我的信息</h3>
                    @if($userdata)
                    <address>
                        <strong>{{$userdata->us_name}}</strong>
                        <br> TEL:{{$userdata->us_tel}}
                        @if($userdata->identify == 0)
                            <br>普通会员
                        @else
                            <br>VIP
                        @endif
                        <br> 注册于:{{$userdata->created_at}}
                    </address>
                    <address>
                        <strong>电子邮件</strong>
                        <br>
                        <a href="mailto:#">{{$userdata->us_email}}</a>
                    </address>
                    @endif
                </div>
                <!-- /.widget search -->
                <div class="widget widget-social">
                    <div class="social-circle">
                        <a href="#" class="#"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="#"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form action="/personal" method="post" enctype="multipart/form-data">
                        @if(isset($userdata['infos']))
                        {{ method_field('PUT') }}
                        @endif
                            {{ csrf_field() }}
                            <img src="{{ isset($userdata['infos']->usds_head)?'/all_uploads/'.$userdata['infos']->usds_head :'\reception_public\images\head\default.jpg' }}" alt="头像" style="width: 100px;height: 100px;float: right; " class="img-circle">
                            <h1>更多信息</h1>
                            <p>请完善您的个人信息,让大家都认识你!</p>
                            <label for="fileinp">
                                <input type="button" id="btn" value="点击上传新头像" class="btn" disabled>
                                <input type="file" id="fileinp" name="usds_head" accept=".jpg,.jpeg,.png" disabled>
                            </label>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label" for="usds_true_name">真实姓名</label>
                                    <input type="text" name="usds_true_name" id="usds_true_name" placeholder="" class="form-control" value="{{ $userdata['infos']->usds_true_name or '' }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label" for="Subject">上次更新时间</label>
                                    <p style="padding-top: 10px;">{{$userdata['infos']->updated_at or ''}}</p>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label" for="name">地址</label>
                                    <input type="text" name="usds_addr" id="name" placeholder="" class="form-control" value="{{ $userdata['infos']->usds_addr or ''}}" disabled>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label" for="textarea">个人介绍</label>
                                        <textarea class="form-control" id="textarea" name="usds_describe" rows="6" placeholder="" disabled>{{ $userdata['infos']->usds_describe or ''}}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" id="singlebutton" class="btn  btn-danger" style="float: right; width: 130px;" disabled></input>
                                        </form>
                                        <a id="changea" onclick="change(this)" class="btn btn-default">修改</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
    function change(){
        if($('#changea').text() == '取消') {
            $('input').prop('disabled',true);
            $('textarea').prop('disabled',true);
            $('#changea').text('修改');
        }else{
            $('input').prop('disabled',false);
            $('textarea').prop('disabled',false);
            $('#changea').text('取消'); 
        }
    }
</script>