<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.reservation.index') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Назад</a>
            </div>

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                    <form method="POST" action="{{ route('admin.reservation.store') }}">
                        @csrf
                        <div class="sm:col-span-6 mt-2">
                            <label for="first_name" class="block text-sm font-medium text-gray-700">Имя</label>
                            <div class="mt-1">
                                <input type="text" id="first_name" name="first_name"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-2">
                            <label for="last_name" class="block text-sm font-medium text-gray-700"> Фамилия </label>
                            <div class="mt-1">
                                <input type="text" id="last_name" name="last_name"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" name="email"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-2">
                            <label for="tel_number" class="block text-sm font-medium text-gray-700">Номер
                                телефона</label>
                            <div class="mt-1">
                                <input type="tel" id="tel_number" name="tel_number"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-2">
                            <label for="res_date" class="block text-sm font-medium text-gray-700">Дата
                                резервации</label>
                            <div class="mt-1">
                                <input type="datetime-local" id="res_date" name="res_date"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>
                        <div class="sm:col-span-6 mt-2">
                            <label for="guest_number" class="block text-sm font-medium text-gray-700" >Количество гостей</label>
                            <div class="mt-1">
                                <input type="number" id="guest_number" name="guest_number" min="1"
                                    class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                            </div>
                        </div>

                        <div class="sm:col-span-6 mt-3">
                            <label for="table" class="block text-sm font-medium text-gray-700">Столик</label>
                            <div class="mt-1">
                                <select id="table_id" name="table_id"
                                    class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5 form-multiselect">

                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="px-6 py-4">
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Сохранить</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</x-admin-layout>
