<?php
require '../config/functions.php';
require '../pdf/fpdf.php';

$pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 2);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 20);
$pdf->SetX(0);
$pdf->MultiCell(30.5, 0.5, 'SMKN 2 CIMAHI', 0, 'C');
$pdf->SetFont('Times', 'B', 12);
$pdf->SetX(0);
// $pdf->MultiCell(30.5, 0.5, 'Telpon : 0038XXXXXXX', 0, 'C');
$pdf->SetX(0);
$pdf->MultiCell(30.5, 0.5, 'JL. Kamarung km. 1,5 No.69 Kel. Citereup Kec. Cimahi Utara ', 0, 'C');
$pdf->SetX(0);
$pdf->MultiCell(30.5, 0.5, 'Telp/Fax : (022)87805857 Email : smkn2cmi@yahoo.com Kota Cimahi 40512', 0, 'C');
$pdf->Line(2, 3.1, 28, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(2, 3.2, 28, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(0, 0.7, "Slip Pembayaran SPP ", 0, 1, 'C');

$siswa = query("SELECT * FROM siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas WHERE nis ='$_GET[nis]' ")[0];

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 0.7, "NIS       : " . $siswa['nis'], 0, 1, 'L');
$pdf->Cell(0, 0.7, "Nama   : " . $siswa['nama'], 0, 1, 'L');
$pdf->Cell(0, 0.7, "Kelas   : " . $siswa['nama_kelas'], 0, 1, 'L');

$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(2, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'SPP', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Tanggal Bayar', 1, 0, 'C');
$pdf->Cell(8, 0.8, 'Keterangan', 1, 1, 'C');

$pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran INNER JOIN spp ON spp.id_spp = pembayaran.id_spp INNER JOIN user ON user.id_user = pembayaran.id_user WHERE id_pembayaran ='$_GET[id_pembayaran]'");
$p = mysqli_fetch_array($pembayaran);
$no = 1;
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(2, 0.8, $no++, 1, 0, 'C');
$pdf->Cell(8, 0.8, "Rp. " . number_format($p['nominal'], '2', ',', '.') . "", 1, 0, 'C');
$pdf->Cell(8, 0.8, $p["tanggal_bayar"], 1, 0, 'C');
$pdf->Cell(8, 0.8, $p["status"], 1, 0, 'C');


$pdf->SetLineWidth(1);
$pdf->ln(2);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(0, 4, "Cimahi, " . date('m-d-Y'), 0, 1, 'R');

$pdf->Cell(47, 0, "Pemimpin, " . $p["nama_user"], 0, 1, 'C');
$pdf->Cell(47, 0, "(_____________)", 0, 0, 'C');





$pdf->Output("laporan_buku.pdf", "I");
