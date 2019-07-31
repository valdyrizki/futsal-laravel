<?php
ob_end_flush();
ob_flush();
ob_end_clean();
Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);

        //JUDUL
        Fpdf::Cell(190, 5, 'Bukti Transaksi',0,1,'C');

        //HEADER TABLE
        Fpdf::Cell(10,7,'',0,1);
        Fpdf::SetFont('Arial','B',10);

        Fpdf::Cell(30,6,'NAMA',0,0, 'L');
        Fpdf::Cell(15,6,':',0,0, 'L');
        Fpdf::Cell(30,6,$booking->name,0,1, 'L');

        Fpdf::Cell(30,6,'ID BOOKING',0,0, 'L');
        Fpdf::Cell(15,6,':',0,0, 'L');
        Fpdf::Cell(30,6,$booking->id_booking,0,1, 'L');

        Fpdf::Cell(30,6,'LAPANG',0,0, 'L');
        Fpdf::Cell(15,6,':',0,0, 'L');
        Fpdf::Cell(30,6,$booking->lapang->nama_lapang,0,1, 'L');

        Fpdf::Cell(30,6,'HARGA',0,0, 'L');
        Fpdf::Cell(15,6,':',0,0, 'L');
        Fpdf::Cell(30,6,Fungsi::getRupiah($booking->lapang->harga_lapang),0,1, 'L');

        Fpdf::Cell(30,6,'STATUS',0,0, 'L');
        Fpdf::Cell(15,6,':',0,0, 'L');
        Fpdf::Cell(30,6,Fungsi::getStatusbooking($booking->status_booking),0,1, 'L');


        Fpdf::Output();
?>
