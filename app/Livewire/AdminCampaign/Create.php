<?php

namespace App\Livewire\AdminCampaign;

use App\Models\Campaign;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Kategori;

class Create extends Component
{
    use WithFileUploads;
    public $kategoriList = [];


    #[Rule('required|string')]
    public $title;

    #[Rule('required')]
    public $slug;
    
    #[Rule('required|string')]
    public $description;
    #[Rule('required|integer')]
    public $id_kategori;

    #[Rule('required|date')]
    public $start_date;

    #[Rule('required|date')]
    public $end_date;

    #[Rule('nullable|integer')]
    public $raised;

    #[Rule('required|integer')]
    public $goal;

    #[Rule('required|string')]
    public $lokasi;

    #[Rule('required|integer')]
    public $min_donation;

    #[Rule('required|image')]
    public $main_picture;
    
    #[Rule('nullable|image')]
    public $second_picture;
    
    #[Rule('nullable|image')]
    public $last_picture;

    protected $messages = [
        'title.required' => 'Judul harus diisi.',
        'title.string' => 'Judul harus berupa teks.',
        'slug.required' => 'Slug harus diisi.',
        'description.required' => 'Deskripsi harus diisi.',
        'description.string' => 'Deskripsi harus berupa teks.',
        'id_kategori.required' => 'Kategori harus dipilih.',
        'id_kategori.integer' => 'Kategori harus berupa teks.',
        'start_date.required' => 'Tanggal mulai harus diisi.',
        'start_date.date' => 'Tanggal mulai tidak valid.',
        'end_date.required' => 'Tanggal akhir harus diisi.',
        'end_date.date' => 'Tanggal akhir tidak valid.',
        'raised.integer' => 'Jumlah dana yang terkumpul harus berupa angka.',
        'goal.required' => 'Target harus diisi.',
        'goal.integer' => 'Target harus berupa angka.',
        'lokasi.required' => 'Lokasi harus diisi.',
        'lokasi.string' => 'Lokasi harus berupa teks.',
        'min_donation.required' => 'Donasi minimum harus diisi.',
        'min_donation.integer' => 'Donasi minimum harus berupa angka.',
        'main_picture.required' => 'Gambar utama harus diunggah.',
        'main_picture.image' => 'Gambar utama harus berupa file gambar.',
        'second_picture.image' => 'Gambar kedua harus berupa file gambar.',
        'last_picture.image' => 'Gambar terakhir harus berupa file gambar.',
    ];

    public function save()
    {
        $this->validate();

        // try {
        //     $this->validate();
        // } catch (\Illuminate\Validation\ValidationException $e) {
        //     dd($e->errors());
        // }

        $mainPicturePath = $this->uploadImage($this->main_picture);
        $secondPicturePath = $this->uploadImage($this->second_picture);
        $lastPicturePath = $this->uploadImage($this->last_picture);
        $slugg = Str::slug($this->slug);

        $campaign = Campaign::create([
            'title' => $this->title,
            'slug' => $slugg,
            'description' => $this->description,
            'goal' => $this->goal,
            'raised' => $this->raised ?? 0,
            'id_kategori' => $this->id_kategori,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'min_donation' => $this->min_donation,
            'lokasi' => $this->lokasi,
            'main_picture' => $mainPicturePath,
            'second_picture' => $secondPicturePath,
            'last_picture' => $lastPicturePath,
        ]);
        
        $this->reset();
        session()->flash('message', 'Campaign Created successfully.');
        $this->dispatch('campaignCreated');
        return $campaign;

    }


    protected function uploadImage($image)
    {
        if ($image) {
            $filename = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/campaign', $filename);
            return basename($filename);
        }
        return null;
    }

    public function mount()
    {
        $this->kategoriList = Kategori::all();

    }
    public function render()
    {
        return view('livewire.admincampaign.create');
    }
}
