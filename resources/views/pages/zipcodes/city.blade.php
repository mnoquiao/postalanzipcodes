@extends('layouts.app')
@section('title', $page_title)
@section('page_styles')
@endsection

@section('content')
<div class="relative overflow-hidden py-10 md:py-5">

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

        <!-- search -->
        @include('includes.search')
        <!--  -->
        <!--  -->

        <!-- ads -->
        @include('ads.ads1')
        <!--  -->
        <!--  -->

        @if ( null !== $results )
            {{-- zip code list display --}}
            <x-zip-list :results="$results" :page_info="$page_info" />
        @else

            <!-- no results -->
            @include('includes.no-results')
            <!--  -->
            <!--  -->

        @endif

        <!-- ads -->
        @include('ads.ads2')
        <!--  -->
        <!--  -->

    </div>
</div>
@endsection



@section('page_scripts')
<!-- schema -->
<script type="application/ld+json">{
      "@context": "https://schema.org",
      "@graph": [
          {

              "@type": "PostalAddress",
              "@id": "{{ $results[0]->city_url }}",
              "streetAddress": "",
              "addressLocality": "{{ $results[0]->city }}",
              "addressRegion": "{{ $results[0]->region }}",
              "postalCode": "{{ $city_zips }}",
              "postOfficeBoxNumber": "{{ $city_zips }}",
              "addressCountry": "PH"
          }
      ]
  }
</script>
@endsection
