<div class="border bg-light-subtle rounded p-2">
    <table class="table tt-footable tt-footable-border-0">
        <thead>
            <tr>
                <th>
                    <label for="" class="control-label">Вариация</label>
                </th>
                <th data-breakpoints="xs sm">
                    <label for="" class="control-label">Цена</label>
                </th>
                <th data-breakpoints="xs sm">
                    <label for="" class="control-label">Склад <small
                            class="text-warning">Местоположение по умолчанию</small></label>
                </th>
                <th data-breakpoints="xs sm">
                    <label for="" class="control-label">Артикуль</label>
                </th>
                <th data-breakpoints="xs sm">
                    <label for="" class="control-label">Код</label>
                </th>
            </tr>
        </thead>

        <tbody>
            @foreach ($variations as $key => $variation)
                @php
                    $name = '';
                    $code_array = array_filter(explode('/', $variation->variation_key));
                    $lstKey = array_key_last($code_array);

                    foreach ($code_array as $key2 => $comb) {
                        $comb = explode(':', $comb);

                        $option_name = \App\Models\Variation::find($comb[0])->collectLocalization('name');
                        $choice_name = \App\Models\VariationValue::find($comb[1])->collectLocalization('name');

                        $name .= $choice_name;

                        if ($lstKey != $key2) {
                            $name .= '-';
                        }
                    }
                @endphp

                <tr class="variant">
                    <td>
                        <input type="text" value="{{ $name }}" class="form-control" disabled>
                        <input type="hidden" value="{{ $variation->variation_key }}"
                            name="variations[{{ $key }}][variation_key]">
                    </td>
                    <td>
                        <input type="number" step="0.01" name="variations[{{ $key }}][price]"
                            min="0" class="form-control" value="{{ $variation->price }}" required>
                    </td>
                    <td>
                        <input type="number" name="variations[{{ $key }}][stock]"
                            value="{{ $variation->product_variation_stock ? $variation->product_variation_stock->stock_qty : 0 }}"
                            min="0" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="variations[{{ $key }}][sku]"
                            value="{{ $variation->sku }}" value="SKU" class="form-control">
                    </td>
                    <td>
                        <input type="text" name="variations[{{ $key }}][code]"
                            value="{{ $variation->code }}" value="code" class="form-control">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
