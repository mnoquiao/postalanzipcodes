<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>@yield('title') — postalandzipcodes.ph</title>
        <meta name="description" content="{{ $description ?? '' }}">
        <link rel="canonical" href="{{ $canonical ?? '' }}" />
        <meta name="robots" content="index, follow">

        <!-- global css -->
        @include('head')
        <!--  -->
        <!--  -->

        <!-- in-page styles -->
        @yield('page_styles')
        <!--  -->
        <!--  -->
</head>
<body class="@if(\Request::is('/'))index-class @endif">
    
        <!--                                    -->
        <!--    menus and nagivation            -->
                @include('includes.header')
        <!--                                    --> 


        
        <!--                                    -->
        <!--    main content (pages)            -->
                @yield('content')
        <!--                                    -->



        <!--                                    -->
        <!--    menus and nagivation            -->
                @include('includes.footer')
        <!--                                    --> 



        <!--                                    -->
        <!--    global js scripts               -->
                @include('scripts')
        <!--                                    -->



        <!--                                    -->
        <!--    in-page js scripts              -->
                @yield('page_scripts')
        <!--                                    -->

</body>
</html>