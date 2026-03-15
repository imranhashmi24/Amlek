<div class="row">
    @if($formData)
    @foreach($formData->form_data as $data)
    <div class="mb-3 col-12 col-md-6 col-lg-4">
        <div class="mb-3 form-group">
            <label class="form-label">{{ __($data->name) }}</label>
            @if($data->type == 'text')
            <input type="text" class="form-control " name="{{ $data->label }}"
                value="{{ old($data->label, isset($property_details) ? $property_details[$loop->index]->val : '') }}"
                @if($data->is_required == 'required') required @endif
            >
            @elseif($data->type == 'textarea')
            <textarea class="form-control " name="{{ $data->label }}"
                @if($data->is_required == 'required') required @endif
                    >{{ old($data->label, isset($property_details) ? $property_details[$loop->index]->val : '') }}</textarea>
            @elseif($data->type == 'select')

                   <?php
                        $defaultValue = old($data->label, isset($property_details) ? $property_details[$loop->index]->val : '');
                    ?>

            <select class="form-control " name="{{ $data->label }}" @if($data->is_required == 'required') required
                @endif
                >
                <option value="">@lang('Select One')</option>
                @foreach ($data->options as $item)
                <option value="{{ $item }}" @selected($item==$defaultValue)>{{ __($item) }}</option>
                @endforeach
            </select>
            @elseif($data->type == 'checkbox')
            <?php
                        $defaultValue = old($data->label, isset($property_details) ? $property_details[$loop->index]->val : '');
                    ?>
            @foreach($data->options as $option)
            <div class="form-check">
                <input class="form-check-input" name="{{ $data->label }}[]" type="checkbox" value="{{ $option }}"
                    @checked($option==$defaultValue) id="{{ $data->label }}_{{ titleToKey($option) }}">
                <label class="form-check-label" for="{{ $data->label }}_{{ titleToKey($option) }}">{{ $option }}</label>
            </div>
            @endforeach
            @elseif($data->type == 'radio')
            <?php
                        $defaultValue = old($data->label, isset($property_details) ? $property_details[$loop->index]->val : '');
                    ?>
            @foreach($data->options as $option)
            <div class="form-check">
                <input class="form-check-input" name="{{ $data->label }}" type="radio" value="{{ $option }}"
                    id="{{ $data->label }}_{{ titleToKey($option) }}" @checked($option==$defaultValue)>
                <label class="form-check-label" for="{{ $data->label }}_{{ titleToKey($option) }}">{{ $option }}</label>
            </div>
            @endforeach
            @elseif($data->type == 'file')
            <input type="file" class="form-control " name="{{ $data->label }}" @if($data->is_required == 'required')
            required @endif
            accept="@foreach(explode(',',$data->extensions) as $ext) .{{ $ext }}, @endforeach"
            >
            <pre class="mt-1 text--base">@lang('Supported mimes'): {{ $data->extensions }}</pre>
            @endif
        </div>
    </div>
    @endforeach
    @else
    <div class="mb-3 col-md-12">
        <h6 class="text-center">@lang('Please selected one property type')</h6>
    </div>
    @endif
</div>
