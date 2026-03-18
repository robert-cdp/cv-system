@props([
    'title',
    'subtitle' => null,
    'icon' => null,
])

@section('title', $title)

@if($subtitle)
    @section('title-sub', $subtitle)
@endif

@if($icon)
    @section('title-icon', $icon)
@endif
