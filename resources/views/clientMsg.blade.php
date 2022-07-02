@extends('_layout')
@section('title')
     رسائل للعملاء الإفتتاحية
@endsection

@section('css')
@endsection

@section('js')
@endsection
@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">رقم العميل</th>
            <th scope="col">رسالة العملاء الإفتتاحيه</th>

        </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <th scope="row">#</th>
                <td>{{$message->number}}</td>
                <td>{{$message->message}}</td>
{{--                <td>{{$command->command_reply}}</td>--}}


            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{ $messages->links() }}--}}
@endsection
