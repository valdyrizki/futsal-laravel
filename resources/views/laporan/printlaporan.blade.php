<?php
ob_end_flush();
ob_flush();
ob_end_clean();
Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);

        //JUDUL
        Fpdf::Cell(190, 5, 'Laporan Transaksi',0,1,'C');

        //HEADER TABLE
        Fpdf::Cell(10,7,'',0,1);
        Fpdf::SetFont('Arial','B',10);
        Fpdf::Cell(10,6,'NO',1,0, 'C');
        Fpdf::Cell(30,6,'NAMA',1,0, 'C');
        Fpdf::Cell(30,6,'LAPANG',1,0, 'C');
        Fpdf::Cell(25,6,'TANGGAL',1,0, 'C');
        Fpdf::Cell(25,6,'WAKTU',1,0, 'C');
        Fpdf::Cell(30,6,'STATUS',1,0, 'C');
        Fpdf::Cell(40,6,'HARGA',1,1, 'C');

        //ISI TABLE
        $no = 0;
        foreach ($transaksi as $t) {
            $no++;
            Fpdf::SetFont('Arial','',10);
            Fpdf::Cell(10,6,$no,1,0, 'C');
            Fpdf::Cell(30,6, $t->booking->name,1,0, 'C');
            Fpdf::Cell(30,6,$t->booking->lapang->nama_lapang,1,0, 'C');
            Fpdf::Cell(25,6,$t->booking->tgl_booking,1,0, 'C');
            Fpdf::Cell(25,6,$t->booking->waktu_booking,1,0, 'C');
            Fpdf::Cell(30,6,Fungsi::getStatusbooking($t->booking->status_booking),1,0, 'C');
            Fpdf::Cell(40,6,$t->total_harga,1,1, 'C');
        }


        Fpdf::Output();
?>
