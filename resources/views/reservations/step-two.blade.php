<x-guest-layout>
    <div class="container mx-auto py-6">
        <div class="flex items-center bg-gray-50 min-h-screen">
            <div class="flex-1 max-w-6xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8">
                        <img class="object-cover w-full h-full"
                            src="https://eva.ru/imgix/eva/560000-570000/562345/channel/Depositphotos_47083441_s-2019_20122650110337797.jpg?w=1024&h=1024&crop=1"
                            alt="">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <h3 class="mb-4 text-2xl font-bold text-blue-600">Make reservations</h3>

                        <div class="w-full rounded-full bg-blue-600">
                            <div class="w-100 p-1 text-xs font-medium leading-none text-center text-white rounded-full">Шаг 2</div>
                        </div>

                        <div class="mt-8">
                            <h4 class="text-xl font-bold mb-4">Special Promotion</h4>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Vestibulum aliquam lectus eu lacus molestie, vel pharetra felis fermentum. Nullam in
                                fringilla eros. Aliquam consectetur, arcu sed fermentum blandit, velit diam
                                convallis tellus, et molestie quam erat et nulla.</p>
                            <a href="#" class="text-blue-600 font-medium">Learn more</a>
                        </div>

                        <form method="POST" action="{{ route('reservations.store.step.two') }}">
                            @csrf
                            <div class="sm:col-span-6 pt-5">
                                <label for="table_id"
                                    class="block text-sm font-medium text-gray-700 mb-2">Столик</label>
                                <div class="mt-1">
                                    <select id="table_id" name="table_id"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 form-multiselect @error('table_id') border-red-400 @enderror">

                                        @foreach ($tables as $table)
                                            <option value="{{ $table->id }}" @if ($table->id == $reservation->table_id) selected @endif>
                                                {{ $table->name }}
                                                ({{ $table->guest_number }} места)
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('table_id')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mt-6 p-4 flex justify-between">
                                <a href="{{ route('reservations.step.one') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white">Назад</a>
                                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white">Забронировать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>