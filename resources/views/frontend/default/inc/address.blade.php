<address class="fs-sm mb-0">
    <strong>{{ $address->address }}</strong>
</address>

<strong> Город: </strong>{{ $address->city->name }}
<br>

<strong>Штат: </strong>{{ $address->state->name }}

<br>
<strong>Страна: </strong> {{ $address->country->name }}
