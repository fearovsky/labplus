<section class="projects">
    <div class="container">
        @if ($field['heading'])
            <div class="section-title">
                <h1 class="section-title__text">
                    {!! $field['heading'] !!}
                </h1>
            </div>
        @endif

        @include('builder.advanced.fields.subfields.projects-row', [
            'item' => $field['firstRow'],
        ])

        @include('builder.advanced.fields.subfields.projects-row-alt', [
            'item' => $field['secondRow'],
        ])

        @include('builder.advanced.fields.subfields.projects-row', [
            'item' => $field['thirdRow'],
        ])
    </div>
</section>
