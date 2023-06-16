<x-guest-layout>
    <div class="container w-full px-5 py-6 mb-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-y-6">
            @foreach ($categories as $category)
                <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                    <img class="w-full h-48" src="{{ Storage::url($category->image) }}" alt="Image" />
                    <div class="px-6 py-4">
                        <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                            {{ $category->name }}</h4>
                        <p class="leading-normal text-gray-700">{{ $category->description }}</p>
                    </div>
                    <div class="flex items-center justify-between p-4">
                        <a href="{{ route('categories.show', $category->id) }}"><button
                                class="px-6 py-2 bg-green-600 text-green-50 hover:text-green-400 rounded-lg">Подробнее</button></a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-guest-layout>
