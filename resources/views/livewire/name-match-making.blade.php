<div>


    <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Number</label>
        <div class="mt-2">
            <input wire:keydown.debounce.500ms="findName" wire:model="search" type="number" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        <span>Result</span><br>
        @if ($resultText)
            {{ $resultText }}
        @else
            <i>No Record Found</i>
        @endif

    </div>


    <div class="mt-8 bg-gray-900">
        <div class="mx-auto max-w-7xl">
            <div class="bg-gray-900 py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-white">User List</h1>
                        </div>

                    </div>
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-700">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Phone</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">ASCII Number</th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800">
                                    @for ($i = 0; $i < count($phones); $i++)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{ $phones[$i] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ $names[$i] }}</td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{ ord($names[$i]) }}</td>
                                        </tr>
                                    @endfor

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
