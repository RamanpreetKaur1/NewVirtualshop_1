{{-- <div class="mb-3">
    <label for="brand_id" class="form-label">Select Brand</label>
    <select name="brand_id" id="brand_id" class="form-control">
        <option value="">Select </option>
        @foreach ($brands as $brand)
            <option @if (!empty($products['brand_id'] == $brand['id'])) selected="" @endif value="{{ $brand['id'] }}">
                {{ $brand['brand_name'] }}</option>
        @endforeach
    </select>
</div> --}}
{{--
<div class="mb-3">
    <label for="brand_id" class="form-label">Select Brand</label>
    <select name="brand_id" id="brand_id" class="form-control">
        <option value="">Select </option>
        @if (!empty($getbrands))
            @foreach ($getbrands as $brand)
                <option  value="{{ $brand['id'] }}"> {{ $brand['brand_name'] }}</option>
            @endforeach
        @endif

    </select>
</div> --}}


