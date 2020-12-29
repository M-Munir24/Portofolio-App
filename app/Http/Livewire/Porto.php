<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Portofolio;


class Porto extends Component
{
    use WithFileUploads;

    public $portofolios, $portofolio, $title, $description, $image, $portofolio_id;

    public $isModal = false, $showModal = false;
   
    public function render()
    {
        $this->portofolios = Portofolio::all();
        return view('livewire.porto');
    }

    //Show modal
    public function openModal(){
        $this->isModal = true;
    }

    public function openShowModal(){
        $this->showModal = true;
    }


    //Close 
    public function closeModal(){
        $this->isModal = false;
    }

    public function closeShowModal(){
        $this->showModal = false;
    }


    public function resetFields(){
        $this->title = '';
        $this->description = '';
        $this->image = '';
    }

    public function store() {

        $this->validate([
            'title' => 'required|string|max:25|min:5',
            'description' => 'required|string|max:300',
            'image' => 'required|image'
        ]);

        Portofolio::updateOrCreate(['id' => $this->portofolio->id], [
            'title' => $this->title,
            'description' => $this->description,
            'portofolio_image' => $this->image->storePublicly('portofolio-image', 'public')
        ]);
        session()->flash('message', $this->portofolio_id ? $this->title.'Berhasil di update' : 'Potofolio Berhasil ditambahkan');
        $this->closeModal();
        $this->resetFields();
    }

    public function show($id) {
        $this->portofolio = Portofolio::find($id);
        $this->openShowModal();
    }

    public function edit($id) {
        $this->portofolio = Portofolio::find($id);
        $this->title = $this->portofolio->title;
        $this->description = $this->portofolio->description;

        $this->openModal();

    }

    public function delete($id) {
        Portofolio::destroy($id);
        session()->flash('message', 'Berhasil Dihapus');
        $this->closeShowModal();
    }

}
