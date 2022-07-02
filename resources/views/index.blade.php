@extends('_layout')
    @section('title')
    Command Page
    @endsection

    @section('css')
    @endsection

    @section('js')
    @endsection
        @section('content')

            <div class="container mt-2">

            <div class="col-8 m-auto">

                @if (session('status'))
                    <div class="alert alert-success text-center h4">
                        {{ session('status') }}
                    </div>
                @endif

            </div>
            </div>
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
                    <th scope="col">النمط الصارم</th>
                    <th scope="col">حذف الأمر</th>
                </tr>
                </thead>
                <tbody>
                @foreach($commands as $command)
                <tr>
                    <th scope="row">{{$command->command_id}}</th>
                    <td>{{$command->command_name}}</td>
                    <td>{{$command->command_reply}}</td>
{{--                    <td>{{App\Models\CommandText::find($command->id)->Command['command_reply']}}</td>--}}
                    <td>

{{--                    <form method="post" action="/command/{{$command->id}}/{{$command->status}}">--}}
{{--                        @csrf--}}
                        <a  class="{{$command->status==1 ?"link-success":"link-danger"}}" href="/command/{{$command->command_id}}/{{$command->status}}">{{$command->status==1 ?"فعال":"موقف" }} </a>
{{--                    </form>--}}

                    </td>
                    <td>
                        <a  class="{{$command->strict==1 ?"link-success":"link-warning"}}" href="/commandMode/{{$command->command_id}}/{{$command->strict}}">{{$command->strict==1 ?"فعال":"موقف" }} </a>
                    </td>

                    <td>

                        <form method="post" action="/delCommand/{{$command->command_id}}">
                            @csrf
                            <button type="submit" class="btn btn-danger">حذف </button>
                        </form>

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
    </div>
                <div class="container mt-5">
                    <div class="row">
                        <div class="col-12">

                <div class=" d-flex align-items-center justify-content-center">

                        {{ $commands->links() }}
                </div>
                    </div>
                        </div>

                </div>

        @endsection


