<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summernote Text Editor CRUD and Image Upload in Laravel</title>
    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container p-4 ">

        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="">رؤية واضحة للصفحة كيف سنظهر </h1>
                    <hr>
                </div>
                <a href="{{ route('pages.index') }}" class="btn btn-lg btn-danger">
                    الرجوع لعرض الصفحات
                </a>
                @foreach ($data as $element)
                    <h3 class="text-center">{{ $element->title }}</h3>

                    <div>
                        {!! $element->description !!}
                    </div>
                @endforeach

            </div>
        </div>
    </div>

</body>

</html>
