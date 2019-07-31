<div class="form-group">
    <label for="exampleInputEmail1">Nama Lapang</label>
<input type="text" name="nama_lapang" value="{{ old('nama_lapang') ?? $lapang->nama_lapang}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lapang" required>
</div>
<div class="div form-group">
    <label for="exampleInputEmail1">Jenis Lapang</label>
    <select name="jenis_lapang" class="form-control js-example-basic-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
        @if ($lapang)
            @if ($lapang->jenis_lapang == 2)
                <option value="2">V-Sport</option>
                <option value="1">Sintetis</option>
            @else
                <option value="1">Sintetis</option>
                <option value="2">V-Sport</option>
            @endif
        @else
            <option value="1">Sintetis</option>
            <option value="2">V-Sport</option>
        @endif
    </select>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Harga Lapang</label>
    <input type="number" value="{{ old('harga_lapang') ?? $lapang->harga_lapang}}" name="harga_lapang" class="form-control" id="exampleInputPassword1" placeholder="Harga Lapang" required>
</div>
<div class="form-group">
    @if ($lapang->gambar_lapang)
        <img class="img-fluid" src="{{asset('storage/'.$lapang->folder_lapang.'/245/'.$lapang->gambar_lapang)}}" alt="user-header">
    @endif
    <label for="exampleInputPassword1">Gambar Lapang</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Gambar Lapang" value="null">
</div>
<div class="div form-group">
        <label for="exampleInputEmail1">Status Lapang</label>
        <select name="status_lapang" class="form-control js-example-basic-single select2-hidden-accessible" tabindex="-1" aria-hidden="true" required>
            @if ($lapang)
                @if ($lapang->status_lapang == 2)
                    <option value="2">Tidak Aktif</option>
                    <option value="1">Aktif</option>
                @else
                    <option value="1">Aktif</option>
                    <option value="2">Tidak Aktif</option>
                @endif
            @else
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
            @endif
        </select>
    </div>

<button type="submit" class="btn btn-primary">{{$submit_button}}</button>
