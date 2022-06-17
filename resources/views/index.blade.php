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
                    جدول الأوامر مع الردود
                </div>


                <div class="container mt-5">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">الأمر</th>
                    <th scope="col">الرد</th>
                    <th scope="col">حالة الأمر</th>
                    <th scope="col">حذف الأمر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commands as $command)
                <tr>
                    <th scope="row">{{$command->id}}</th>
                    <td>{{$command->content}}</td>
                    <td>{{App\Models\CommandText::find($command->id)->Command['command_reply']}}</td>
                    <td>

{{--                    <form method="post" action="/command/{{$command->id}}/{{$command->status}}">--}}
{{--                        @csrf--}}
                        <a  class="{{$command->status==1 ?"link-success":"link-warning"}}" href="/command/{{$command->id}}/{{$command->status}}">{{$command->status==1 ?"فعال":"موقف" }} </a>
{{--                    </form>--}}

                    </td>

                    <td>

                        <form method="post" action="/delCommand/{{$command->id}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">حذف </button>
                        </form>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>

        @endsection


