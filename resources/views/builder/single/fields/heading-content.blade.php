@php
    $headingContent = $field['heading'];
    $headingType = $field['headingType'] ?? 'h2';
    $heading = $headingContent
        ? "<{$headingType} class='single-heading-content__heading'>{$headingContent}</{$headingType}>"
        : null;

@endphp

<section class="single-heading-content">
    {!! $heading !!}

    <div class="single-heading-content__text">
        {!! $field['content'] !!}
    </div>
</section>
