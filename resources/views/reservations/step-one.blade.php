<x-guest-layout>
    <div class="container mx-auto py-6">
        <div class="flex items-center bg-gray-50 min-h-screen">
            <div class="flex-1 max-w-6xl mx-auto bg-white rounded-lg shadow-xl">
                <div class="md:flex">
                    <div class="md:w-1/2 p-8">
                        <img class="object-cover w-full h-full" src="https://eva.ru/imgix/eva/560000-570000/562345/channel/Depositphotos_47083441_s-2019_20122650110337797.jpg?w=1024&h=1024&crop=1" alt="">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <h3 class="mb-4 text-2xl font-bold text-blue-600">Make reservations</h3>
                       
                        <div class="flex items-center mb-4">
                            <div class="flex-1">
                                <div class="relative w-full bg-gray-200 rounded-full">
                                    
                                    <div class="absolute flex justify-between text-xs font-medium text-white w-full">
                                        <div class="absolute h-4 bg-blue-600 rounded-full" style="width: 50%; left: 0;">
                                        <span class="absolute top-1/2 transform -translate-y-1/2 left-0" style="margin-left: 5rem;">
                                            Шаг 1
                                        </span>
                                        
                                    </div>
                                    <span class="absolute top-1/2 transform -translate-y-1/2 right-0" style="margin-right: 5rem;">
                                        Шаг 2
                                    </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        


                        <form method="POST" action="{{ route('reservations.store.step.one') }}">
                            @csrf
                            <div class="mt-6">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
                                <input type="text" id="first_name" name="first_name" value="{{ $reservation->first_name ?? '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('first_name') border-red-400 @enderror">
                                @error('first_name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Фамилия</label>
                                <input type="text" id="last_name" name="last_name" value="{{ $reservation->last_name ?? '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('last_name') border-red-400 @enderror">
                                @error('last_name')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ $reservation->email ?? '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('email') border-red-400 @enderror">
                                @error('email')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <label for="tel_number" class="block text-sm font-medium text-gray-700">Номер телефона</label>
                                <input type="tel" id="tel_number" name="tel_number" value="{{ $reservation->tel_number ?? '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('tel_number') border-red-400 @enderror">
                                @error('tel_number')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6">
                                <label for="res_date" class="block text-sm font-medium text-gray-700">Дата резервации</label>
                                <input type="datetime-local" id="res_date" name="res_date" min="{{ $min_date->format('Y-m-d\TH:i:s') }}" max="{{ $max_date->format('Y-m-d\TH:i') }}" value="{{ $reservation && $reservation->res_date ? $reservation->res_date->format('Y-m-d\TH:i') : '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('res_date') border-red-400 @enderror">
                                <span class="text-xs text-blue-700">Пожалуйста, выберите время между 17:00 и 23:00.
                                </span>
                            
                                @error('res_date')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mt-6">
                                <label for="guest_number" class="block text-sm font-medium text-gray-700">Количество гостей</label>
                                <input type="number" id="guest_number" name="guest_number" min="1" value="{{ $reservation->guest_number ?? '' }}" class="w-full px-4 py-2 mt-2 bg-white border border-gray-400 rounded-md focus:outline-none focus:border-blue-500 @error('guest_number') border-red-400 @enderror">
                                @error('guest_number')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-6 p-4 flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-800 rounded-lg text-white">Далее</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
