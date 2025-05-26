@props([
    'title',
    'description',
    'columns',
    'rows',
    'resource' => "roles",
    'editable' => true,
    'deletable' => true,
    'creatable' => true,
    'details' => true,
])


@php
$rowArray = $rows instanceof \Illuminate\Pagination\AbstractPaginator
? $rows->items()
: (is_array($rows) ? $rows : collect($rows)->toArray());
@endphp

<div x-data="{
    sortKey: '',
    sortAsc: true,
    search: '',
    rows: @js($rowArray),
    get sortedRows() {
        let rows = [...this.rows];

        if (this.sortKey) {
            rows.sort((a, b) => {
                let valA = a[this.sortKey]?.toString().toLowerCase() ?? '';
                let valB = b[this.sortKey]?.toString().toLowerCase() ?? '';
                return this.sortAsc ? valA.localeCompare(valB) : valB.localeCompare(valA);
            });
        }
        return rows;
    }
}">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold text-gray-900">{{ $title ?? 'Data Table' }}</h1>
            <p class="mt-2 text-sm text-gray-700">{{ $description ?? '' }}</p>
        </div>
        @if($creatable)
        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
            <a href="{{ route($resource . '.create') }}" class="block rounded-md bg-rose-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-rose-500">
                Create new
            </a>
        </div>
        @endisset
    </div>
    <form method="GET" x-ref="form">
        <div class="mt-4 mb-4 space-x-4 flex">

            <x-input.text name="search" :value="request('search')" @input.debounce.500ms="$refs.form.submit()" type="text" placeholder="Search..." />
            <x-input.select name="results" onchange="this.form.submit()">
                <option value="10" @selected(request("results")==10)>10</option>
                <option value="25" @selected(request("results")==25)>25</option>
                <option value="100" @selected(request("results")==100)>100</option>
            </x-input.select>

        </div>
    </form>


    <div class="overflow-x-auto mt-6">
        <table class="min-w-full divide-y divide-gray-300">
            <thead>
                <tr>
                    @foreach ($columns as $key => $label)
                    <th @click="sortKey === '{{ $key }}' ? sortAsc = !sortAsc : (sortKey = '{{ $key }}', sortAsc = true)" class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                        {{ $label }}
                    </th>
                    @endforeach
                    @if ($actions ?? false)
                    <th class="px-3 py-3.5 text-right text-sm font-semibold text-gray-900">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <template x-for="row in sortedRows" :key="row.id">
                    <tr>
                        @foreach ($columns as $key => $label)
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-700" x-text="row['{{ $key }}']"></td>
                        @endforeach
                        @if ($editable || $deletable || $details)
                        <td class="whitespace-nowrap px-3 py-4 text-right text-sm flex space-x-1">
                            @if ($details)
                            <a :href="`/{{ $resource }}/${row.id}`">
                                <x-button.info>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </x-button.info>
                            </a>
                            @endif
                            @if ($editable)
                            <a :href="`/{{ $resource }}/${row.id}/edit`">
                                <x-button.warning>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                    </svg>
                                </x-button.warning>
                            </a>
                            @endif
                            @if ($deletable)
                            <form :action="`/{{ $resource }}/${row.id}`" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-button.danger type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </x-button.danger>
                            </form>

                            @endif
                        </td>
                        @endif


                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</div>
