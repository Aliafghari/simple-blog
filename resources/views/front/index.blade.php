<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('front/style.css') }}" />
    <title>وبسایت شخصی من</title>
</head>

<body>

    @include('front.nav')
    @include('front.home')
    @include('front.skill')
    @include('front.blogs')
    @include('front.footer')

                <script src="front/js/bootstrap.js"></script>
</body>

</html>
