<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gourmet Log</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    <!-- css -->
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- CSSリセット -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>

    @include('components.header')

    <img class="fullscreen-image image-container" src="img/Gourmet Log.png" alt="">
    {{-- <div class="overlay-text">あいうえお</div> --}}
    {{-- <div class="overlay-text"><img src="img/Gourmet Log.png" alt=""></div> --}}

</body>

</html>

<style>
.fullscreen-image {
  width: 100%;
  height: 100vh;
  object-fit: cover;
  opacity: 0.8; /* 薄さを調整するための値（0.0〜1.0） */
}

.image-container {
  position: relative;
}

.overlay-text {
    
  position: absolute;
  top: 50%;
  /* left: 50%; */
  /* transform: translate(-50%, -50%); */
  /* z-index: 1; */
  background-color: rgba(255, 255, 255, 0.8); /* 背景色（白）と透明度を調整 */
  padding: 10px;
  width: 100%
}

</style>
