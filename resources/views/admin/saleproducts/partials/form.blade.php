<input type="hidden" name="status_order" class="form-control" placeholder="Статус заказа" value="1" required >
<select class="form-control" name="tovar_id">
    @foreach ($data['tovar'] as $product_item)

        <option value="{{$product_item->id}}"

        >{{$product_item->name}}
        </option>
    @endforeach
</select>
<input type="text" name="price_up" class="form-control" placeholder="Цена от" value="" required>
<input type="text" name="price_down" class="form-control" placeholder="цена до" value="" required>
<label for="">Производитель</label>
<select class="form-control" name="manufacturer_id">
    @foreach ($data['manufacturers'] as $manufacturer_list)

        <option value="{{$manufacturer_list->id}}"

        >{{$manufacturer_list->name}}
        </option>
    @endforeach
</select>
<input type="submit" value="Сохранить" class="btn btn-primary">
