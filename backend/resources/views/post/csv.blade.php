@foreach ($columns as $key => $column)
    @if ($key > 0)
        , {{-- Add a comma as a delimiter after the first column --}}
    @endif
    {{ $column }}
    @foreach ($data as $key => $row)
        , {{ 'asdfdf' }}
    @endforeach
    <br>
@endforeach
