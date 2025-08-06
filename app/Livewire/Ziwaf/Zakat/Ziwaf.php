<?php

namespace App\Livewire\Ziwaf\Zakat;

use App\Models\Komponen_Ziwaf;
use Livewire\Component;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Ziwaf extends Component
{

    public $gram;
    public $nilaiemas;
    public $zakatEmas;

    public $asset = '';
    public $laba = '';
    public $totalassetlaba;
    public $zakatPerdagangan;

    public $gaji;
    public $gaji2;
    public $totalpenghasilan;
    public $zakatPenghasilan;

    public $uang;
    public $surat;
    public $totalkekayaan;
    public $zakatUang;

    public $harga;
    public $kg;
    public $toggleValue = false;
    public $hargatotal;
    public $zakatPertanian;


    public $jenisPerusahaan = 'jasa';
    public $totalperusahaan;
    public $pendapatan;
    public $aktiva;
    public $pasiva;
    public $zakatJasa;
    public $zakatDagang;


    public $fitrah = 'false';
    public $jumlah;
    public $nama = [];
    public $muzakki;
    public $total = 0;
    public $zakatFitrah;
    public $nominal_fitrah;


    public $selectedOption = '';
    public $selectedOption2 = '';
    public $jenis3;
    public $atasNama;
    public $zakat;
    public $nisab;
    public $nisabbulan;
    public $harga_emas;
    public $nominal_nisab;
    public $nisab_kg;
    public $data;
    public $goldPrice = [];
    public $site = 'lakuemas'; // Default site


    protected function rules()
    {
        if ($this->selectedOption2 === 'Perusahaan') {
            return [
                'atasNama' => 'required|string',
            ];
        }elseif ($this->selectedOption === 'maal') {
            return [
                'atasNama' => 'required|string',
                'jenis3' => 'required|string',
            ];
        }elseif ($this->selectedOption === 'fitrah') {
            $rules = [
                'jumlah' => 'required|integer|min:1|max:10', // Validasi untuk jumlah
            ];

            for ($i = 0; $i < $this->jumlah; $i++) {
                $rules["nama.$i"] = 'required'; // Validasi untuk setiap nama
            }

            return $rules;
        }
    }

    protected function messages()
    {
        return [
            'atasNama.required' => 'Nama wajib diisi.',
            'jenis3.required' => 'Jenis wajib diisi.',
            'jumlah.required' => 'Jumlah wajib diisi.',
            'nama.*.required' => 'Nama Muzakki wajib diisi.',    
        ];
    }

    public function hitung()
    {
       $this->zakatFitrah = $this->jumlah * $this->nominal_fitrah;
        $this->total = $this->jumlah;
    }

    public function jasa()
    {
        $this->jenisPerusahaan = 'jasa';
    }

    public function dagang()
    {
        $this->jenisPerusahaan = 'dagang';
    }

    public function pendapatan()
    {
        $pendapatan = !empty($this->pendapatan) ? (float) str_replace('.', '', $this->pendapatan) : 0;
        $this->totalperusahaan = $pendapatan;
    }

    public function aktifpasif()
    {
        $aktiva = !empty($this->aktiva) ? (float) str_replace('.', '', $this->aktiva) : 0;
        $pasiva = !empty($this->pasiva) ? (float) str_replace('.', '', $this->pasiva) : 0;
        $this->totalperusahaan = $aktiva + $pasiva;
    }

    public function maalJasa()
    {
            $pendapatan = !empty($this->pendapatan) ? (float) str_replace('.', '', $this->pendapatan) : 0;
            $this->totalperusahaan = $pendapatan;

            if ($this->totalperusahaan >= $this->nisab) {
                $this->zakatJasa = $this->totalperusahaan * 0.025;
            } else {
                $this->zakatJasa = 0;
            }
        }

    public function maalDagang()
    {
        $aktiva = !empty($this->aktiva) ? (float) str_replace('.', '', $this->aktiva) : 0;
        $pasiva = !empty($this->pasiva) ? (float) str_replace('.', '', $this->pasiva) : 0;
        $this->totalperusahaan = $aktiva + $pasiva;

        if ($this->totalperusahaan >= $this->nisab) {
            $this->zakatDagang = $this->totalperusahaan * 0.025;
        } else {
            $this->zakatDagang = 0;
        }
    }


    public function gramtoidr()
    {
        $gram = !empty($this->gram) ? (float) str_replace('.', '', $this->gram) : 0;
        $this->nilaiemas = $gram * $this->harga_emas;
        // $this->nilaiemas = $this->gram * $this->goldPrice[0]['sell'];
    }

    public function maalEmas()
    {
        $gram = !empty($this->gram) ? (float) str_replace('.', '', $this->gram) : 0;
        $this->nilaiemas = $gram * $this->harga_emas;
        // $this->nilaiemas = $this->gram * $this->goldPrice[0]['sell'];

        if ($this->nilaiemas >= $this->nisab) {
            $this->zakatEmas = $this->nilaiemas * 0.025;
        } else {
            $this->zakatEmas = 0;
        }
    }


    public function assetlaba()
    {
        $asset = !empty($this->asset) ? (float) str_replace('.', '', $this->asset) : 0;
        $laba = !empty($this->laba) ? (float) str_replace('.', '', $this->laba) : 0;

        $this->totalassetlaba = $asset + $laba;
    }

    public function maalPerdagangan()
    {
        $asset = !empty($this->asset) ? (float) str_replace('.', '', $this->asset) : 0;
        $laba = !empty($this->laba) ? (float) str_replace('.', '', $this->laba) : 0;
        // Kalkulasi Zakat Penghasilan
        $this->totalassetlaba = $asset + $laba;

        if ($this->totalassetlaba >= $this->nisab) {
            $this->zakatPerdagangan = $this->totalassetlaba * 0.025;
        } else {
            $this->zakatPerdagangan = 0;
        }
    }


    public function penghasilan()
    {
        $gaji = !empty($this->gaji) ? (float) str_replace('.', '', $this->gaji) : 0;
        $gaji2 = !empty($this->gaji2) ? (float) str_replace('.', '', $this->gaji2) : 0;

        $this->totalpenghasilan = $gaji + $gaji2;
    }

    public function maalPenghasilan()
    {
        $gaji = !empty($this->gaji) ? (float) str_replace('.', '', $this->gaji) : 0;
        $gaji2 = !empty($this->gaji2) ? (float) str_replace('.', '', $this->gaji2) : 0;
        // Kalkulasi Zakat Penghasilan
        $this->totalpenghasilan = $gaji + $gaji2;

        if ($this->totalpenghasilan >= $this->nisabbulan) {
            $this->zakatPenghasilan = $this->totalpenghasilan * 0.025;
        } else {
            $this->zakatPenghasilan = 0;
        }
    }

    public function kekayaan()
    {
        $uang = !empty($this->uang) ? (float) str_replace('.', '', $this->uang) : 0;
        $surat = !empty($this->surat) ? (float) str_replace('.', '', $this->surat) : 0;

        $this->totalkekayaan = $uang + $surat;
    }

    public function maalUang()
    {
        $uang = !empty($this->uang) ? (float) str_replace('.', '', $this->uang) : 0;
        $surat = !empty($this->surat) ? (float) str_replace('.', '', $this->surat) : 0;
        // Kalkulasi Zakat Penghasilan
        $this->totalkekayaan = $uang + $surat;

        if ($this->totalkekayaan >= $this->nisab) {
            $this->zakatUang = $this->totalkekayaan * 0.025;
        } else {
            $this->zakatUang = 0;
        }
    }


    public function totalharga()
    {
        $harga = !empty($this->harga) ? (float) str_replace('.', '', $this->harga) : 0;
        $this->hargatotal = $harga * $this->kg;
    }

    public function maalPertanian()
    {
        $harga = !empty($this->harga) ? (float) str_replace('.', '', $this->harga) : 0;
        $this->hargatotal = $harga * $this->kg;
        $persen = $this->toggleValue ? '0.05' : '0.1';
        
        if ($this->kg >= $this->nisab_kg){
            $this->zakatPertanian = $this->hargatotal * $persen;
        }else {
            $this->zakatPertanian = 0;
        }
    }


    // public function fetchGoldPrice()
    // {
    //     // Use Cache to store the gold price for 1 hour (3600 seconds)
    //     $this->goldPrice = Cache::remember("goldPrice_{$this->site}", 3600, function () {
    //         try {
    //             // Make the API request to fetch gold prices
    //             $response = Http::get("https://logam-mulia-api.vercel.app/prices/{$this->site}");
    //             return $response->json('data') ?? []; // Return the 'data' array or an empty array if not available
    //         } catch (\Exception $e) {
    //             return null; // Return null if there's an issue with the API call
    //         }
    //     });
    // }

    public function mount()
    {
        $komZiwaf = Komponen_Ziwaf::find(1);
        $this->harga_emas = $komZiwaf->harga_emas;
        $this->nominal_nisab = $komZiwaf->nisab;
        $this->nisab_kg = $komZiwaf->nisab_kg;
        $this->nominal_fitrah = $komZiwaf->nominal_fitrah;

        $this->data = session('data', '');
        if ($this->data == 'fitrah') {
            $this->selectedOption = 'fitrah';
        }elseif ($this->data == 'maal') {
            $this->selectedOption = 'maal';
        }


        // redirect()->route(route: 'x');
        // $this->selectedOption = '';
        // $this->selectedOption2 = '';
        // dd($this->selectedOption);
        // $this->fetchGoldPrice();
        // $this->nisab = 85 * $this->goldPrice[0]['sell'];
        $this->nisab = 85 * $this->nominal_nisab;;
        $this->nisabbulan = $this->nisab / 12;

        // Inisialisasi selectedOption berdasarkan URL jika ada
        if (Request::is('maal')) {
            $this->selectedOption = 'maal';
        } elseif (Request::is('fitrah')) {
            $this->selectedOption = 'fitrah';
        }
        $this->checkRamadan();
    }

    private function checkRamadan()
    {
        $currentDate = date('d-m-Y'); // Get current date
        $hijriDate = $this->convertToHijri($currentDate);

        if (($hijriDate['hijri']['month']['number']) == 9) {
            $this->fitrah = 'true';
        } else {
            $this->fitrah = 'true';
        }
    }

    private function convertToHijri($date)
    {
        $response = Http::get("http://api.aladhan.com/v1/gToH/$date");

        // Check if the request was successful
        if ($response->successful()) {
            return $response->json()['data']; // Return the data part of the response
        }

        return null; // Handle error as needed
    }

    public function refresh()
    {
        $this->dispatch('reload-page');
    }


    public function submitZakat()
    {
        // Mendapatkan nilai dari parameter
        $zakatEmas = $this->zakatEmas;
        $zakatPenghasilan = $this->zakatPenghasilan;
        $zakatPertanian = $this->zakatPertanian;
        $zakatPerdagangan = $this->zakatPerdagangan;
        $zakatUang = $this->zakatUang;
        $zakatJasa = $this->zakatJasa;
        $zakatDagang = $this->zakatDagang;
        $zakatFitrah = $this->zakatFitrah;
        $selectedOption = $this->selectedOption;
        $selectedOption2 = $this->selectedOption2;
        $jenis3 = $this->jenis3;
        $atasNama = $this->atasNama;
        $validatedData = $this->validate();

        // Menentukan URL redirect berdasarkan nilai parameter
        if ($zakatEmas > 0) {
            // return redirect()->route('pembayaran_zakat', [
            //     'zakatEmas' => $zakatEmas
            // ]);
            $this->zakat = [
                'nominal' => $zakatEmas,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => $validatedData['jenis3'],
                'atasNama' => $validatedData['atasNama'],
            ];

        } elseif ($zakatPenghasilan > 0) {
            $this->zakat = [
                'nominal' => $zakatPenghasilan,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => $validatedData['jenis3'],
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatPertanian > 0) {
            $this->zakat = [
                'nominal' => $zakatPertanian,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => $validatedData['jenis3'],
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatPerdagangan > 0) {
            $this->zakat = [
                'nominal' => $zakatPerdagangan,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => $validatedData['jenis3'],
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatUang > 0) {
            $this->zakat = [
                'nominal' => $zakatUang,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => $validatedData['jenis3'],
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatJasa > 0) {
            $this->zakat = [
                'nominal' => $zakatJasa,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenisPerusahaan' => $this->jenisPerusahaan,
                'jenis3' => 'Entitas',
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatDagang > 0) {
            $this->zakat = [
                'nominal' => $zakatDagang,
                'jenis1' => $selectedOption,
                'jenis2' => $selectedOption2,
                'jenis3' => 'Entitas',
                'jenisPerusahaan' => $this->jenisPerusahaan,
                'atasNama' => $validatedData['atasNama'],
            ];
        } elseif ($zakatFitrah > 0) {
            $this->muzakki = [
                'namaMuzakki' => $validatedData['nama'],
                'jumlah' => $validatedData['jumlah'],
                'zakatFitrah' => $zakatFitrah,
                'jenis1' => $selectedOption,

            ];
        }else {
            // Default redirect or error handling if none of the conditions are met
            return redirect()->route('pembayaran_zakat');
        }

        return redirect()->route('zakat.data')
            ->with([
                'zakat' => $this->zakat,
                'muzakki' => $this->muzakki
            ]);
    }



    public function handleDropdownChange()
    {
        // // Logika untuk mengubah tampilan atau melakukan aksi
        // // ketika dropdown dipilih, misalnya menghitung nilai zakat
        // if ($this->selectedOption === 'maal') {
        //     // Logika ketika Zakat Maal dipilih
        // } elseif ($this->selectedOption === 'profesi') {
        //     // Logika ketika Zakat Profesi dipilih
        // }
        // dd($this->selectedOption);
    }
    public function render()
    {
        return view('livewire.ziwaf.zakat.ziwaf')->layout('layouts.mobile');
    }
}

