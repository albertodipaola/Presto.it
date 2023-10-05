<?php

namespace App\Http\Livewire;

use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\ResizeImage;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category_id;
    public $imagesTemporary = [];
    public $images = [];
    public $announcement;

    protected $rules = [
        'title'=>'required|max:50',
        'description'=>'required|min:30',
        'category_id'=>'required|min:1',
        'price'=>'required|max:9999.99',        
        'images.*'=>'image|max:5120',        
    ];

    public function updatedImagesTemporary()
    {
        if ($this->validate(['imagesTemporary.*' => 'image|max:5120',])) {
            foreach ($this->imagesTemporary as $image) {
                $this->images[] = $image; 
            }
        }
    }

    public function removeImageTemporary($key)
    {
        if (array_key_exists($key, $this->images)) {
            array_splice($this->images, $key, 1);
        }
    }
 
    public function store()
    {
        $this->validate();

        $this->announcement = Auth::user()->announcements()->create($this->validate());    
        if (count($this->images)) {
            foreach ($this->images as $image) {
                $newImg = $this->announcement->images()->create([
                    'path'=>$image->store("announcements/{$this->announcement->id}", 'public'),
                ]);

                dispatch(new ResizeImage($newImg->path, 500, 500));
                dispatch(new GoogleVisionSafeSearch($newImg->id));
                dispatch(new GoogleVisionLabelImage($newImg->id));
            }
        }

        return redirect()->route('home')->with('message', 'annuncio creato con successo! Sarà aggiunto dopo il controllo di un revisore.');
    }
    
    public function render()
    {
        return view('livewire.create-announcement', ['categories'=>Category::all()]);
    }
}
