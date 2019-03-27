
@push("formGym")
    <form method='POST' action="{{ action('GymControllerFirst@store', [
    'gym_name'=>$gym->gym_name,
    'gym_num' => $gym->gym_num,
    'equip_name' => $equipment->equip_name
    ]) }}">

        @if($equipment_gym->id)
            {{ method_field("PUT") }}
            <input type='hidden' name="id" value="{{ old('id', $equipment_gym->id) }}">
        @endif
        {{ csrf_field() }}
        <p>
            <label for="name">Название зала: </label>
            <br />
            <input name="gym_name" value="{{ old('gym_name', $gym->gym_name) }}" id="name">
        </p>
            {{--вывод ошибки--}}
            @if ($errors->has('gym_name'))
                <span>
      <strong>{{ $errors->first('gym_name') }}</strong>
    </span>
            @endif
            {{------------------}}
        <p>
            <label for="num">Номер зала:</label>
            <br />
            <input name="gym_num" value="{{ old('gym_num', $gym->gym_num) }}" id="num">
        </p>
            {{--вывод ошибки--}}
            @if ($errors->has('gym_num'))
                <span>
      <strong>{{ $errors->first('gym_num') }}</strong>
    </span>
            @endif
            {{------------------}}
            <p>
                <label for="equip_name">Оборудование:</label>
                <br />
                <input name="equip_name" value="{{ old('equip_name', $equipment->equip_name) }}" id="equip_name">
            </p>
            {{--вывод ошибки--}}
            @if ($errors->has('equip_name'))
                <span>
      <strong>{{ $errors->first('equip_name') }}</strong>
    </span>
            @endif
            {{------------------}}
            <p>
                <label for="hidden">Некий выбор чего-то там:</label>
                <br />
                <input type="checkbox" name="hidden" value="1" id="hidden"
                @if(old("hidden")) checked @endif
                >
            </p>
        <p>
            <input type="submit" value="Отправить">
        </p>
            <p>
                <a href="{{ action('GymControllerFirst@destroy', [
    'id' => $equipment_gym->id
    ]) }}">
                    Удалить
                </a>
            </p>

    </form>
@endpush
@include('common.upload')
@include('common.deleteFile')

