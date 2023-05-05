<h4 class="mt-7">Доступная логистика</h4>
@forelse ($logisticZoneCities as $zoneCity)
    <div class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-3">
        <div class="radio-left d-inline-flex align-items-center">
            <div class="theme-radio">
                <input type="radio" name="chosen_logistic_zone_id" id="logistic-{{ $zoneCity->logistic_zone_id }}"
                    value="{{ $zoneCity->logistic_zone_id }}">
                <span class="custom-radio"></span>
            </div>
            <div>
                <label for="logistic-{{ $zoneCity->logistic_zone_id }}" class="ms-3 mb-0">
                    <div class="h6 mb-0">{{ $zoneCity->logistic->name }}</div>
                    <div> Плата за доставку
                        {{ formatPrice($zoneCity->logisticZone->standard_delivery_charge) }}</div>
                </label>
            </div>
        </div>
        <div class="radio-right text-end">
            <img src="{{ uploadedAsset($zoneCity->logistic->thumbnail_image) }}" alt="{{ $zoneCity->logistic->name }}"
                class="img-fluid">
        </div>
    </div>
@empty
    <div class="col-12 mt-5">
        <div class="tt-address-content">
            <div class="alert alert-danger text-center">
                В ваш город сейчас не доставляем
            </div>
        </div>
    </div>
@endforelse
