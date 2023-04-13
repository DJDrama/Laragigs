{{--@extends('components.layout')
@section('content')--}}
<x-layout>
    @include('partials._hero')
    @include('partials._search')
    {{--<h1><?php echo $heading; ?></h1>
    <?php foreach ($listings as $listing): ?>
        <h2><?php echo $listing['title']; ?></h2>
        <p><?php echo $listing['description']; ?></p>
    <?php endforeach; ?>--}}

    <!-- We Can Change above code to below using directives
use 'curly braces' for values
use '@' for loops
-->

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        {{--@if(count($listings) == 0)
            <p>No Listings Found!</p>
        @endif--}}
        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                {{--component pass in a variable--}}
                <x-listing-card :listing="$listing"/>
            @endforeach
        @else
            <p>No Listings Found!</p>
        @endunless

    </div>
</x-layout>
{{--@endsection--}}
