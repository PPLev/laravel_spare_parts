{{--<select class="form-control" name="tovar_status">--}}
    {{--<option value="1">товар существует</option>--}}
    {{--<option value="0">товар несуществует</option>--}}
{{--</select>--}}
{{----}}
{{--<input type="text" name="new_tovar" class="form-control" placeholder="Новый товар" value="">--}}
<select class="form-control" name="tovar_id">
        @foreach ($tovars as $tovar_list)
                <option value="{{$tovar_list->id}}"
                >{{$tovar_list->name}}
                </option>
        @endforeach
</select>
<input type="text" name="count" class="form-control" placeholder="Колличество товара" value="" required>
<input type="text" name="price" class="form-control" placeholder="Цена" value="" required>
<label for="">Производитель</label>
<select class="form-control" name="manufacturer_id">
    @foreach ($manufacturers as $manufacturer_list)
        <option value="{{$manufacturer_list->id}}"
        >{{$manufacturer_list->name}}
        </option>
    @endforeach
</select>
<input type="submit" value="Сохранить" class="btn btn-primary">
