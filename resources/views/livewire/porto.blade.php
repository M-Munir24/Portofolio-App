<div class="container mx-auto mt-10 pb-10">
    <div class="title-container mb-4 flex justify-between">
        <h1 class="title">My Portofolio</h1>
        <x-jet-button wire:click="openModal()" class="justify-center">Create New Portofolio</x-jet-button>
    </div>
    <hr class="break-line">
    @if ($isModal)
        @include('livewire.portofolio.create')
    @endif

    @if (session()->has('message'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
        <div class="flex">
            <div>
                <p class="text-sm">{{ session('message') }}</p>
            </div>
        </div>
    </div>
    @endif
</div> 
