<h1>Listings</h1>
{{--<h1><?php echo $heading; ?></h1>
<?php foreach ($listings as $listing): ?>
    <h2><?php echo $listing['title']; ?></h2>
    <p><?php echo $listing['description']; ?></p>
<?php endforeach; ?>--}}

<!-- We Can Change above code to below using directives
use 'curly braces' for values
use '@' for loops
-->
<h1>{{$heading}}</h1>
{{--@if(count($listings) == 0)
    <p>No Listings Found!</p>
@endif--}}
@unless(count($listings) == 0)
    @foreach ($listings as $listing)
        <h2>
            <a href="/listings/{{$listing['id']}}">
                {{$listing['title']}}
            </a>
        </h2>
        <p>{{$listing['description']}}</p>
    @endforeach
@else
    <p>No Listings Found!</p>
@endunless
