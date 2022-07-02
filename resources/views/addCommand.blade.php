@extends('_layout')
@section('title')
    Command Page
@endsection

@section('css')
    <link rel="stylesheet" href=
    "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

@endsection

@section('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script type="text/javascript">

        $("#rowAdder").click(function () {
            newRowAdd =
                '<div id="row"> <div class="input-group m-3">' +
                '<input type="text" class="form-control m-input" name="command[]"> ' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button">' +
                '<i class="bi bi-trash"></i> حذف</button> </div> </div> </div>';

            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>
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
            واجهه تعبئه الاوامر
        </div>

        <form method="post" action="insertReply">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">إدخل الأمر</label>
{{--                <input type="text" required name="command" class="form-control" id="exampleInputEmail1">--}}

                    {{-- dynaimc--}}
                <div class="input-group m-3">

                    <input type="text"
                           class="form-control m-input" name="command[]"  required>

                </div>
                <div id="newinput"></div>
                <button id="rowAdder" type="button"
                        class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> إضافة أمر
                </button>

                    {{--dynamic --}}


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

@endsection


