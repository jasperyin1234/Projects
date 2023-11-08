@props(['name', 'label', 'options'])

<div class="mb-6">
    <label class="block text-lg mb-2">{{ $label }}</label>
    
    @foreach ($options as $option)
        <div class="flex items-center space-x-4 mb-2">
            <input type="radio" id="{{ $name . '_' . Str::slug($option) }}"
                name="{{ $name }}" value="{{ $option }}"
                @if (old($name, $attributes['value']) === $option) checked @endif>
            <label for="{{ $name . '_' . Str::slug($option) }}">{{ $option }}</label>
        </div>
    @endforeach

    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
