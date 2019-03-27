
@push("formGym")
    <p><br /> </p>
    <form method="post" action="{{ route('delete.file') }}" enctype="multipart/form-data">
        <input name="_token" type="hidden" value="{{ csrf_token() }}">

        <input type="file"  name="files[]" multiple>
        <button type="submit">Удалить</button>
        {{--вывод ошибки--}}
        @if ($errors->has('files'))
            <span>
      <strong>{{ $errors->files }}</strong>
        </span>
        @endif
        {{------------------}}
    </form>
    <p><br /> </p>
@endpush
