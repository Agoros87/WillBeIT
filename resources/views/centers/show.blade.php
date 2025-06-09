<x-layouts.public>
    <div class="p-8">
        <h1 class="text-3xl font-bold mb-4">{{ $center->name }}</h1>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Address')}}:</b> {{$center->address }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('City')}}:</b> {{$center->city }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Province')}}:</b> {{$center->province }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Postal Code')}}:</b> {{$center->postal_code }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Center Email')}}:</b> {{$center->email }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__("Director's Email")}}:</b> {{$center->director_email }}
        </p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__("Director's Name")}}:</b> {{$center->director_name }}
        </p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Erasmus Coordinator')}}
                :</b> {{$center->erasmus_coordinator }}</p>
        <p class="text-gray-700 mb-2"><b class="font-bold">{{__('Center Phone')}}:</b> {{$center->phone }}</p>
        <a href="{{ route('centers.index') }}" class="text-blue-600 hover:underline">← Volver al listado</a>
    </div>
</x-layouts.public>
