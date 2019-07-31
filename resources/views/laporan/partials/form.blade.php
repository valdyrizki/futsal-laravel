<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />




<div class="form-control-wrapper col-md-4">
    <input type="text" id="datepicker" class="form-control col-md-6" name="tgl1" placeholder="Tanggal awal" autocomplete="off" />
</div>

<div class="form-control-wrapper col-md-4">
        <input type="text" id="datepicker2" class="form-control col-md-6" name="tgl2" placeholder="Tanggal akhir" autocomplete="off" />
    </div>

<div class="form-group col-md-4">
    <input type="submit" class="btn btn-primary form-control" value="{{$submit_button}}">
</div>


<script>
    $('#datepicker').datepicker({
        format:"yyyy-mm-dd"
    });

    $('#datepicker2').datepicker({
        format:"yyyy-mm-dd"
    });
</script>
