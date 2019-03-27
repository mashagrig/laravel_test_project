
@push("formGym")
<form method="post" action="{{ route('upload.file') }}" enctype="multipart/form-data">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">

    <input type="file"  name="files[]" multiple>
    <button type="submit">Загрузить</button>

    {{--вывод ошибки--}}
    @if ($errors->has('files'))
        <span>{{ $errors->files }}</span>
    @endif
    {{------------------}}
</form>
@endpush
