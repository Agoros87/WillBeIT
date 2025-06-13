@props(['label' => 'Default Label', 'type' => 'text', 'name' => '', 'value' => '', 'disabled' => false])
<div {{ $attributes }}>
    <label for="{{ $name }}" class="header-3 text-base min-w-max flex-1">{{ $label }}</label>
    <div class="flex-2 w-full">
        <input {{ $disabled ? 'disabled' : '' }} type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" class='w-full outline hover:outline-2 focus:outline-2 dark:text-gray-300 outline-gray-400 focus:outline-blue-600 dark:focus:outline-emerald-700 p-1 rounded flex-2'/>
        <ul class='text-sm text-red-600 dark:text-red-400 space-y-1 py-2'>
            @foreach ((array) $errors->get($name) as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
