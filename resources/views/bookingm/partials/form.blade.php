<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="form-group">
    <label for="exampleInputEmail1">Nama Lapang</label>
<select name="id_lapang" class="form-control col-md-6" required="">
    <option disabled selected>Pilih Lapang</option>
    @foreach ($lapangs as $l)
<option value="{{$l->id_lapang}}">{{$l->nama_lapang." - ".Fungsi::getJenislapang($l->jenis_lapang)." : ".Fungsi::getRupiah($l->harga_lapang)}}</option>
    @endforeach
</select>
</div>

<div class="clear-fix">&nbsp;</div>

<div class="form-control-wrapper">
    <input type="text" id="datepicker" class="form-control col-md-6" name="tgl_booking" placeholder="Tanggal Booking" autocomplete="off" />
</div>

<div class="clear-fix">&nbsp;</div>

<div class="form-group">
    <label for="exampleInputEmail1">Waktu Booking</label>
    <select name="waktu_booking" class="form-control col-md-6" required="">
        <option disabled selected>Pilih Waktu Booking</option>
        <option value="08:00:00">08:00</option>
        <option value="09:00:00">09:00</option>
        <option value="10:00:00">10:00</option>
        <option value="11:00:00">11:00</option>
        <option value="12:00:00">12:00</option>
        <option value="13:00:00">13:00</option>
        <option value="14:00:00">14:00</option>
        <option value="15:00:00">15:00</option>
        <option value="16:00:00">16:00</option>
        <option value="17:00:00">17:00</option>
        <option value="18:00:00">18:00</option>
        <option value="19:00:00">19:00</option>
        <option value="20:00:00">20:00</option>
        <option value="21:00:00">21:00</option>
        <option value="22:00:00">22:00</option>
    </select>
</div>

<div class="clear-fix">&nbsp;</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary form-control" value="{{$submit_button}}">
</div>

<script>
    $('#datepicker').datepicker({
        format:"yyyy-mm-dd"
    });
</script>
