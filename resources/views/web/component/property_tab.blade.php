<div class="pb-4 col-12">
    <div class="sort-links">
        <div>
            <?php
                $search = [];
                $tab = isset($_GET['tab']) ? $_GET['tab'] : 'map';
                if ($tab) {
                    $search["tab"] = $tab;
                }
                $property_type = isset($_GET['property_type']) ? $_GET['property_type'] : null;

                if ($property_type) {
                    $search["property_type"]= $property_type;
                }

                $city_id = isset($_GET['city_id']) ? $_GET['city_id'] : null;

                if ($city_id) {
                    $search["city_id"] = $city_id;
                }
                $subproperty_type_id = isset($_GET['subproperty_type_id']) ? $_GET['subproperty_type_id'] : null;
                if ($subproperty_type_id) {
                    $search["subproperty_type_id"] = $subproperty_type_id;
                }
                $country_id = isset($_GET['country_id']) ? $_GET['country_id'] : null;
                if ($country_id) {
                    $search["country_id"] = $country_id;
                }
                $purpose = isset($_GET['purpose']) ? urldecode($_GET['purpose']) : null;
                if ($purpose) {
                    $search["purpose"] = $purpose;
                }
                $time_period = isset($_GET['time_period']) ? $_GET['time_period'] : null;
                if ($time_period) {
                    $search["time_period"] = $time_period;
                }

                $from_price = isset($_GET['from_price']) ? $_GET['from_price'] === '0' : '0';
                if ($from_price) {
                    $search["from_price"] = $from_price;
                }


                $to_price = isset($_GET['to_price']) ? $_GET['to_price'] : null;
                if ($to_price) {
                    $search["to_price"] = $to_price;
                }
            ?>
            <a href="{{ route('property', array_merge($search, ['tab' => 'list'])) }}" class="{{ $tab == 'list' ? 'active' : '' }}">@lang('List View')</a>
            <a href="{{ route('property', array_merge($search, ['tab' => 'map'])) }}" class="{{ $tab == 'map' ? 'active' : '' }}">@lang('View real estate map')</a>
        </div>
    </div>
</div>
