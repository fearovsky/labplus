<section class="projects">
    <div class="container">
        @if (!empty($field['heading']))
            <div class="section-title">
                <h1 class="section-title__text">
                    {!! $field['heading'] !!}
                </h1>
            </div>
        @endif

        @if (!empty($field['rows']))
            @foreach ($field['rows'] as $index => $row)
                @include('builder.advanced.fields.subfields.projects-row', [
                    'item' => $row,
                ])

                @if (!empty($row['secondRow']))
                    @include('builder.advanced.fields.subfields.projects-row-alt', [
                        'item' => $row['secondRow'],
                    ])
                @endif
            @endforeach
        @endif

    </div>
</section>
