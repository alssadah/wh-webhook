@extends('_layout')
@section('title')
    Command Page
@endsection

@section('css')
@endsection

@section('js')
@endsection
@section('content')

    @if(session()->has('error') || session()->has('Success') )
        <div class="alert alert-danger">
            {{ session()->get('error') || session()->has('Success') }}
        </div>
    @endif

    <div class="container mt-5">
        <div class="h3 text-center text-success text-decoration-underline">
            واجهه تعبئه الاوامر
        </div>

        <form method="post" action="insertReply">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">إدخل الأمر</label>
                <input type="text" required name="command" class="form-control" id="exampleInputEmail1">

            </div>

            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">إدخل الرد للأمر</label>
                <textarea class="form-control" required name="reply" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>

            <div class="col-3">

                <select class="form-select" name="lang" aria-label="">
                    <option value="1"  selected>عربي</option>
                    <option value="2" >إنجليزي</option>
                </select>

            </div>

            <button type="submit" class="btn btn-success mt-3">إضافه </button>
        </form>

    </div>
    <div class="container mt-5 ">

        <hr class="bg-success border-2 border-top border-success hrline">

    </div>

    <div class="container mt-5">

        <div class="h3 text-center text-success text-decoration-underline">
            في حاله وجود أكثر من أمر لنفس الرد
        </div>
        <form method="post" action="insertCommand" class="mb-5 ">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">الامر</label>
                <input type="text" required name="commandOptions" class="form-control" id="exampleInputEmail1">
            </div>

            <div class="col-12 mt-5">
                <label for="exampleInputEmail1" class="form-label">الرجاء إختيار الرد المناسب للأمر</label>
                <select class="form-select" name="replyId" aria-label="">
                    @foreach($replies as $reply)
                    <option value="{{$reply->command_id}}"  selected>{{$reply->command_reply}}</option>
                    @endforeach
                </select>

            </div>

            <button type="submit" class="btn btn-success mt-3">إضافه  </button>
        </form>
    </div>

@endsection


