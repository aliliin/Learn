@extends('app')
@section('content')
    <h1>{{ $article->title }}</h1>

    <hr>
    <br>
    <form class="form-horizontal" action="{{URL ('articles/'.$article->id)}}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="col-sm-1 control-label">Title</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="title" value="{{$article->title}}">
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-sm-1 control-label">content</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="content" rows="5" placeholder="">{{$article->content}}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="published_at" class="col-sm-1 control-label">Published_at</label>
            <div class="col-sm-10">
                <input type="date" name="published_at" class="form-control" value="{{date("Y-m-d")}}">
            </div>

        </div>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-10">
                <button type="submit" class="btn btn-primary form-control">发表文章</button>
            </div>
        </div>
    </form>
    <!-- 下面这一段是 验证提示信息-->
    @if($errors->any())
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item-danger">{{$error}}</li>
            @endforeach
        </ul>
    @endif
@stop