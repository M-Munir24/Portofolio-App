<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUpload;
use App\Models\Portofolio;


class Porto extends Component
{
    use WithFileUpload;

    public $isModal = false;

    public $title, $description, $image, $portofolio_id;
    public function render()
    {
        return view('livewire.porto');
    }

    //Show modal
    public function openModal(){
        $this->isModal = true;
    }

    //Close 
    public function closeModal(){
        $this->isModal = false;
    }

    public function resetFields(){
        $this->title = '';
        $this->description = '';
        $this->image = '';
    }

    public function store() {

        $this->validate([
            'title' => 'require|string|max:25|min:5',
            'description' => 'required|string|max:300',
            'image' => 'require|image'
        ]);

        Portofolio::updateOrCreate(['id' => $this->portofolio_id], [
            'title' => $this->title,
            'description' => $this->description,
            'portofolio_image' => $this->image->storePublicly('portofolio-image')
        ]);
        $this->closeModal();
        $this->resetFields();
    }

}
