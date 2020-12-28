<div class="container mx-auto mt-10 pb-10">
    <div class="title-container mb-4 flex justify-between">
        <h1 class="title">My Portofolio</h1>
        <x-jet-button wire:click="openModal()" class="justify-center">Create New Portofolio</x-jet-button>
    </div>
    <hr class="break-line">
    @if ($isModal)
        @include('livewire.portofolio.create')
    @endif
</div> 
