@if (!empty($fields))
    @foreach ($fields as $field)
        @include('builder.single.fields.' . $field['acf_fc_layout'])
    @endforeach
@endif
