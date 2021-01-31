<div class="form-group">
    <div class ="m-auto">
        <div class="mb-8 form-group">
            <label class="inline-block w-32 font-bold mr-5">provinsi : </label><br>
            <select name="nama_provinsi" wire:model="selectedProvinsi" 
            class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group">
                <option value='' >-- pilih provinsi --</option>
                @foreach($provinsi as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
        @if(!is_null($selectedProvinsi))
            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">Kota :</label><br>
                <select name="id_kota" wire:model="selectedKota" 
                    class=" form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value='' >-- pilih kota --</option>
                    @foreach($kota as $data2)
                    <option value="{{ $data2->id }}">{{ $data2->nama_kota }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($selectedKota))
            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">kecamatan :</label><br>
                <select name="id_kecamatan" wire:model="selectedKecamatan" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih kecamatan --</option>
                    @foreach($kecamatan as $data3)
                        <option value="{{ $data3->id }}">{{ $data3->nama_kecamatan }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        
        @if(!is_null($selectedKecamatan))

            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">Desa :</label><br>
                <select name="id_Desa" wire:model="selectedDesa" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih Desa --</option>
                    @foreach($desa as $data4)
                        <option value="{{ $data4->id }}">{{ $data4->nama_desa }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(!is_null($selectedDesa))

            <div class="mb-8 form-group">
                <label class="inline-block w-32 font-bold mr-5">rw :</label><br>
                <select name="id_rw" wire:model="selectedRw" 
                    class="form-control p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline form-group"
                    >
                    <option value=''>-- pilih RW --</option>
                    @foreach($rw as $data5)
                        <option value="{{ $data5->id }}">{{ $data5->nama_rw }}</option>
                    @endforeach
                </select>
            </div>
        @endif
    </div>
</div>