<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function index()
	{
		$this->load->view('Owner/Layout/head');
		$this->load->view('Owner/Layout/sidebar');
		$this->load->view('Owner/vLaporan');
		$this->load->view('Owner/Layout/footer');
	}
	public function cetak()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$transaksi = $this->db->query("SELECT * FROM `reservasi_service` JOIN data_reservasi ON data_reservasi.id_reservasi=reservasi_service.id_reservasi JOIN pelanggan ON pelanggan.id_pelanggan = reservasi_service.id_pelanggan JOIN data_sparepart ON data_sparepart.id_sparepart=data_reservasi.id_sparepart WHERE MONTH(date)='" . $bulan . "' AND YEAR(date)='" . $tahun . "' AND stat_reservasi='3'")->result();
		// memanggil library FPDF
		require('asset/fpdf/fpdf.php');

		// intance object dan memberikan pengaturan halaman PDF
		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AddPage();

		$pdf->SetFont('Times', 'B', 14);

		$pdf->Cell(280, 40, 'LAPORAN TRANSAKSI BULAN Ke- ' . $bulan . ' TAHUN ' . $tahun, 0, 0, 'C');
		$pdf->SetLineWidth(0);
		$pdf->Cell(10, 30, '', 0, 1);
		$pdf->SetFont('Times', 'B', 9);
		$pdf->Cell(10, 7, 'No', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Nama Pelanggan', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Produk', 1, 0, 'C');
		$pdf->Cell(20, 7, 'Quantity', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Harga', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Subtotal', 1, 0, 'C');
		$pdf->Cell(30, 7, 'Tanggal Transaksi', 1, 0, 'C');
		$pdf->Cell(40, 7, 'Total Transaksi', 1, 0, 'C');
		$pdf->Cell(50, 7, 'No Telepon', 1, 0, 'C');


		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Times', '', 10);
		$no = 1;
		$total = 0;

		foreach ($transaksi as $key => $value) {
			$total += $value->total_pembayaran;
			$pdf->SetFillColor(255, 255, 255);
			$pdf->Cell(10, 6, $no++, 1, 0, 'C');
			$pdf->Cell(30, 6, $value->nama_pelanggan, 1, 0, 'L', true);
			$pdf->Cell(40, 6, $value->nama_sparepart, 1, 0, 'L', true);
			$pdf->Cell(20, 6, $value->qty, 1, 0, 'C', true);
			$pdf->Cell(30, 6, 'Rp.' . number_format($value->harga, 2), 1, 0, 'L', true);
			$pdf->Cell(30, 6, 'Rp.' . number_format($value->harga * $value->qty, 2), 1, 0, 'L', true);
			$pdf->Cell(30, 6, $value->date, 1, 0, 'L', true);
			$pdf->Cell(40, 6, 'Rp.' . number_format($value->total_pembayaran, 2), 1, 0, 'L', true);
			$pdf->Cell(50, 6, $value->no_hp, 1, 1, 'L', true);
		}
		$pdf->Ln();
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(180, 6, '', 0, 0, 'C');
		$pdf->Cell(40, 6, 'Total Pendapatan: ', 0, 0, 'L', true);
		$pdf->Cell(50, 6, 'Rp.' . number_format($total, 2), 0, 0, 'L', true);
		$pdf->Output();
	}
}

/* End of file cLaporan.php */
