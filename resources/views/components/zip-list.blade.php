@props(['results', 'page_info', 'subheader_title'])

<section class="dark:text-white bg-gradient-to-b from-gray-900 via-gray-800 to-white">
    <header>
        <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-10 pb-96">
            <h1 class="text-3xl font-bold tracking-tight text-gray-50 max-w-screen-lg">
                {{ html_entity_decode($subheader_title) }}</h1>
            <p class="mb-4 py-4 text-xl font-normal dark:text-gray-300 font-Caveat max-w-screen-lg">
                {!! $page_info !!}
            </p>
        </div>
    </header>
</section>

<section class="dark:text-black dark:white -mt-96">
    <div class="max-w-screen-xl mx-auto px-4 lg:px-6 py-10">

        <div class="px-4 py-5 border border-b-0 dark:border-gray-700 hidden">
            <div class="max-w-full md:max-w-md">
                <form x-data @submit.prevent>
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="search"
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Filter Results" required>
                    </div>
                </form>

            </div>
        </div>

        <div class="relative overflow-x-auto">
            <table class="w-full text-base text-left dark:text-gray-400 flex flex-col px-4 font-mono">
                <thead class="text-lg uppercase font-Anton tracking-widest font-medium">
                    <tr
                        class="hidden lg:flex lg:flex-row stack-sm border rounded-sm dark:bg-amber-400 dark:text-gray-900 dark:border-gray-700 flex-wrap my-8 lg:my-6">
                        <th scope="col" class="basis-1/5 px-6 py-3">Location</th>
                        <th scope="col" class="basis-1/5 px-6 py-3">Zip Code</th>
                        <th scope="col" class="basis-1/5 px-6 py-3">City or Town</th>
                        <th scope="col" class="basis-1/5 px-6 py-3">Region or Province</th>
                        <th scope="col" class="basis-1/5 px-6 py-3 justify-center flex">Phone Area Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $idx => $value)
                        <tr
                            class="stack-sm border rounded-sm dark:bg-white dark:border-gray-700 flex flex-row flex-wrap my-8 lg:my-6">
                            <th scope="row"
                                class="basis-3/5 lg:basis-1/5 flex items-end lg:items-start pl-6 py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->barangay_url }}"
                                    title="zip code information of {{ $value->barangay }}"
                                    class="hover:underline text-3xl font-bold lg:text-lg">
                                    {{ $value->barangay }}
                                </a>
                            </th>
                            <td
                                class="basis-2/5 lg:basis-1/5 grow flex justify-end lg:justify-start px-6 py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->postal_url }}" title="{{ $value->postal }} zip code info"
                                    class="hover:underline text-3xl font-bold lg:text-lg">
                                    <dl>
                                        <dt class="sr-only">Zip Code</dt>
                                        <dd>
                                            {{ $value->postal }}
                                        </dd>
                                    </dl>
                                </a>
                            </td>
                            <td class="basis-full lg:basis-1/5 grow-0 px-6 py-0 lg:py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->city_url }}" title="zip codes details for {{ $value->city }}"
                                    class="hover:underline text-xl font-medium lg:text-base">
                                    {{ $value->city }}
                                </a>
                            </td>
                            <td class="basis-full lg:basis-1/5 grow-0 px-6 py-0 lg:py-4 font-medium dark:text-gray-900">
                                <a href="{{ $value->url_region }}" title="zip codes details for {{ $value->region }}"
                                    class="hover:underline text-lg font-medium lg:text-base">
                                    {{ $value->region }}
                                </a>
                            </td>
                            <td
                                class="basis-auto lg:basis-1/5 grow-0 px-6 py-0 lg:py-4 mb-4 lg:mb-0 justify-center flex">
                                <dl>
                                    <dt class="sr-only">Phone Area Code</dt>
                                    <dd class="text-lg font-medium lg:text-base">
                                        {{ $value->phone_area_code }}
                                    </dd>
                                </dl>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
