<main class="main">
    @if (!empty($fields))
        @foreach ($fields as $field)
            @include('builder.' . $field['acf_fc_layout'])
        @endforeach
    @endif
</main>
