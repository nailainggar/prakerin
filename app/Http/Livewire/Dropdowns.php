<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use App\Models\Rw;
use App\Models\Kasus;
use App\Models\Kasus2;

class Dropdowns extends Component
{
    public $provinsi;
    public $kota;
    public $kecamatan;
    public $desa;
    public $rw;

    public $selectedProvinsi  = NULL;
    public $selectedKota = NULL;
    public $selectedKecamatan = NULL;
    public $selectedDesa = NULL;
    public $selectedRw = NULL;

    public function mount($selectedRw = null) {
        $this->provinsi  = Provinsi::all();
        $this->kota      = collect();
        $this->kecamatan = collect();
        $this->desa = collect();
        $this->rw = collect();
        $this->selectedRw = $selectedRw;

        if (!is_null($selectedRw))
        {
            $rw = Rw::with('desa.kecamatan.kota.provinsi')->find($selectedRw);
            if ($rw)
            {
                $this->rw = Rw::where('id_desa', $rw->id_desa)->get();
                $this->desa = desa::where('id_kecamatan', $rw->desa->id_kecamatan)->get();
                $this->kecamatan = Kecamatan::where('id_kota', $rw->desa->kecamatan->id_kota)->get();
                $this->kota = Kota::where('id_provinsi', $rw->desa->kecamatan->kota->id_provinsi)->get();
                $this->SelectedProvinsi = $rw->desa->kecamatan->kota->id_provinsi;
                $this->SelectedKota = $rw->desa->kecamatan->id_kota;
                $this->SelectedKecamatan = $rw->desa->id_kecamatan;
                $this->SelectedDesa = $rw->id_desa;
            }
        }

    }
    public function render()
    {
        return view('livewire.dropdowns');
    }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->kota = Kota::where('id_provinsi', $provinsi)->get();
    }

    public function updatedSelectedKota($kota)
    {
        $this->kecamatan = Kecamatan::where('id_kota', $kota)->get();
    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        $this->desa = Desa::where('id_kecamatan', $kecamatan)->get();
    }
    
    public function updatedSelectedDesa($desa)
    {
        $this->rw = Rw::where('id_desa', $desa)->get();
    }

    public function updatedSelectedRw($rw)
    {
        $this->kasus2 = Kasus2::where('id_rw', $rw)->get();
    }
    
}