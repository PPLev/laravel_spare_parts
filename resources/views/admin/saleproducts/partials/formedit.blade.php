@if($data['user_type'])
<select class="form-control" name="status_order">
    <option @if ($saleproduct->status_order == 1)
            {{ __('selected') }}
            @endif
            value="1"
    >Статус В ожидании</option>
    <option @if ($saleproduct->status_order == 2)
            {{ __('selected') }}
            @endif
            value="2"
    >Статус принят</option>
</select>
@endif

<select class="form-control" name="product_id">
    @foreach ($data['tovar'] as $tovar_item)
        <option @if ($tovar_item->id == $saleproduct->tovar_id)
                {{ __('selected') }}
                @endif
                value="{{$tovar_item->id}}"
        >{{$tovar_item->name}}
        </option>
    @endforeach
</select>
<input type="text" name="price_up" class="form-control" placeholder="Цена от" value="{{$saleproduct->price_up}}"
       required>
<input type="text" name="price_down" class="form-control" placeholder="цена до" value="{{$saleproduct->price_down}}"
       required>
<label for="">Производитель</label>
<select class="form-control" name="manufacturer_id">
    @foreach ($data['manufacturers'] as $manufacturer_list)
        <option @if ($manufacturer_list->id == $saleproduct->manufacturer_id)
                {{ __('selected') }}
                @endif
                value="{{$manufacturer_list->id}}"
        >{{$manufacturer_list->name}}
        </option>
    @endforeach
</select>
<input type="submit" value="Сохранить" class="btn btn-primary">
