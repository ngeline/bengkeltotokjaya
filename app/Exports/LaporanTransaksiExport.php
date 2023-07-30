<?php

namespace App\Exports;

use App\Models\Service;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class LaporanTransaksiExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths, WithStyles
{
    protected $tahun;
    protected $total_data;
    protected $imunisasi;
    protected $formdate;
    protected $todate;
    protected $totalData;

    public function __construct($formdate, $todate)
    {
        $this->formdate=$formdate;
        $this->todate=$todate;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        if ($this->formdate== "semua" || $this->todate == "semua") {
            $data = Service::with('detail_services')->whereMonth('created_at', date('m'))->whereIn('status',['Pembayaran diverifikasi'])->get();
            $this->totalData = count($data);
            
        } else {
            $data = Service::with('detail_services')->whereBetween('tanggal', [$this->formdate, $this->todate])->get();      
            $this->totalData = count($data);      
        }
        // dd($data);
        return $data;
    }

    public function headings(): array
    {
        $date = $this->formdate == 'semua' ? date('Y-m-d') : date('Y-m-d', strtotime($this->formdate));
        return [
                ["DATA LAPORAN TRANSAKSI BENGKEL MOBIL TOTOK JAYA"],
                ["TEMPAT  : BENGKEL MOBIL TOTOK JAYA"],
                ["TANGGAL     : ".$date ],
                ["NO.", "NAMA AKUN", "NO ANTRIAN", "TANGGAL", "MONTIR", "NAMA STNK", "NOMOR POLISI", "NAMA MOBIL", "TANGGAL SERVICE", "KELUHAN", "STATUS", "HARGA SERVICE", "SPAREPART + BIAYA PEMASANGAN", "TOTAL KESELURUHAN"],
            ];
    }

    public function map($row): array
    {
        $no = "";
        $list_spareparts = '';
        $total_price_sparepart = 0;
        foreach ($row->detail_services as $value) {
            $total_price_sparepart += $value->total_price;
            $total_price = number_format($value->total_price, 0, ',', ',');
            $list_spareparts .= "- {$value->sparepartName} ({$value->total_sparepart}) - {$total_price}\n";
        }
        $total_price_sparepart += $row->total_price;
        return [
            $no,
            $row->user->name,
            $row->no_antrian,
            $row->tanggal,
            $row->montir,
            $row->name_stnk,
            $row->number_plat,
            $row->nama_mobil,
            $row->service_date,
            $row->complaint,
            $row->status,
            number_format($row->priceService, 0, ',',','),
            $list_spareparts,
            number_format($total_price_sparepart, 0, ',', ','),

        ];
    }

    public function columnWidths(): array
    {
        return [
            "A" => 4,
            "B" => 30,
            "C" => 15,
            "D" => 20,
            "E" => 20,
            "F" => 30,
            "G" => 12,
            "H" => 20,
            "I" => 25,
            "J" => 35,
            "K" => 25,
            "L" => 25,
            "M" => 30,
            "N" => 30,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // SETTING BORDER
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        // TERAPKAN BORDER BERDASARKAN COLOMN
        $sheet->getStyle('A4:N4')->applyFromArray($styleArray);
        $sheet->getStyle('A5:N5')->applyFromArray($styleArray);

        $setSheet = $this->totalData + 1;
        for ($i = 1; $i < $setSheet; $i++) {
            $x = 4;
            $x += $i;

            
            $sheet->getStyle("M".$x)->getAlignment()->setWrapText(true);
            $sheet->getStyle("A$x:N$x")->getAlignment()->setVertical('top');

            // TERAPKAN BORDER BERDASRKAN COLUMN
            $sheet->getStyle('A' . $x . ':N' . $x)->applyFromArray($styleArray);

            // TERAPKAN VALUE BERDASRKAN COLUMN
            $sheet->getCell('A' . $x)->setValue($i);

            // SETTING KOLOM MENJADI WRAP TEXT
            $sheet->getStyle("B" . $x . ":B" . $x)->getAlignment()->setWrapText(true);
            $sheet->getStyle("D" . $x . ":D" . $x)->getAlignment()->setWrapText(true);
            $sheet->getStyle("G" . $x . ":G" . $x)->getAlignment()->setWrapText(true);

            // $sheet->getStyle("E" . $x . ":E" . $x)->getAlignment()->setHorizontal('center');
        }

        // MENGGABUNGKAN COLUMN
        $sheet->mergeCells('A1:N1');
        $sheet->mergeCells('A2:N2');
        $sheet->mergeCells('A3:N3');

        // MENGGABUNGKAN COLUMN SECARA HORIZONTAL
        // $sheet->mergeCells('A4:A5');
        // $sheet->mergeCells('B4:B5');
        // $sheet->mergeCells('C4:C5');
        // $sheet->mergeCells('D4:D5');
        // $sheet->mergeCells('E4:E5');
        // $sheet->mergeCells('F4:F5');
        // $sheet->mergeCells('G4:G5');
        // $sheet->mergeCells('H4:H5');
        // $sheet->mergeCells('I4:I5');
        // $sheet->mergeCells('J4:J5');
        // $sheet->mergeCells('K4:K5');
        // $sheet->mergeCells('L4:L5');
        // $sheet->mergeCells('M4:N5');

        // SETTING KOLOM MENJADI WRAP TEXT
        $sheet->getStyle("G4:G5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F4:F5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("M4:M5")->getAlignment()->setWrapText(true);

        // MEMBUAT TULISAN TEBAL (BOLD)
        $sheet->getStyle('A1:N1')->getFont()->setBold(true);
        $sheet->getStyle('A4:N4')->getFont()->setBold(true);
        // $sheet->getStyle('A5:N5')->getFont()->setBold(true);

        /**
         * MEMBUAT TULISAN MENJADI VERTIKAL TENGAH
         */
        $sheet->getStyle('A1:N1')->getAlignment()->setVertical('center');
        $sheet->getStyle('A4:N4')->getAlignment()->setVertical('center');
        // $sheet->getStyle('A5:N5')->getAlignment()->setVertical('center');

        /**
         *  MEMBUAT TULISAN MENJADI HORIZONTAL TENGAH
         */
        $sheet->getStyle('A1:N1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A4:N4')->getAlignment()->setHorizontal('center');
        // $sheet->getStyle('A5:M5')->getAlignment()->setHorizontal('center');
    }
}
