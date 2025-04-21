@props(['label' => 'Default Label', 'type' => 'text', 'name' => '', 'value' => ''])
<div>
    <label for="{{ $name }}" class="block font-semibold">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" {{ $attributes->merge(['class' => 'w-full border border-gray-300 p-1 rounded']) }}/>
    <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 py-2'>
        @foreach ((array) $errors->get($name) as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
