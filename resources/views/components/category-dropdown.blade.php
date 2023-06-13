<x-dropdown>
    <x-slot name='trigger'>
        <button class="py-2 pl-3 pr-9 text-sm font-semibold lg:w-36 w-full text-left"
            >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon name='down-arrow'  class="absolute pointer-events-none" style="right: 12px; display: inline;" />

        </button>
    </x-slot>


    <x-dropdown-item href='/' :active="request()->routeIs('home')"> All</x-dropdown-item>


    @foreach ($categories as $category)      
        <x-dropdown-item href='/?category={{ $category->slug }}' :active="request()->is('*'.$category->slug)"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach
</x-dropdown>