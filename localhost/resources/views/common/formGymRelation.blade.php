@push("formGymRelation")

    <form method='POST' action="{{ action('GymController@store', [
    'equipment'=>$equipment
    ]) }}">

        @if($equipment[0]->id)
            {{ method_field("PUT") }}
            <input type='hidden' name="id" value="{{ old('id', $equipment[0]->id) }}">
        @endif
        {{ csrf_field() }}

    <label>
        <select name="equipments[]" size="10" multiple  class="form-control input-lg">
            {{--multiple - может быть много отправляемых на сервер значений--}}
            {{--size - просто колво выводимых записей--}}
            @foreach($equipment as $equip)
                <option value="{{ $equip->id }}"
                @if( in_array($equip->id, old('equipments', $arr)) )
                    selected
                 @endif
                >
                {{ $equip->equip_name }}
                </option>
            @endforeach
        </select>
    </label>

    <p>
        <input type="submit" value="Ассоциировать с последней записью в gyms">
    </p>

    </form>
@endpush

