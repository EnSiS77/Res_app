<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                <a href="{{ route('admin.tables.create') }}"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Добавить столик</a>
            </div>

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Имя
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Количество гостей
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Статус
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Локация
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Действия
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tables as $table)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $table->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $table->guest_number }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $table->status->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $table->location->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex space-x-2">
                                        <a href="{{ route('admin.tables.edit', $table->id) }}"
                                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Изменить</a>
                                        <form action="{{ route('admin.tables.destroy', $table->id) }}"
                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                            method="POST"
                                            onsubmit="return confirm('Вы действительно хотите удалить столик?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Удалить</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
