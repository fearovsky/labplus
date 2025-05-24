    @if (!empty($fields))
        @foreach ($fields as $field)
            @include('builder.advanced.fields.' . $field['acf_fc_layout'])
        @endforeach
    @endif
