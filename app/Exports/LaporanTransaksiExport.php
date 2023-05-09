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
            $data = Service::whereIn('status',['Pembayaran diverifikasi'])->get();
            $this->totalData = count($data);
            
        } else {
            $data = Service::whereBetween('tanggal', [$this->formdate, $this->todate])->get();      
            $this->totalData = count($data);      
        }
        // dd($data);
        return $data;
    }

    public function headings(): array
    {
    return [
                ["DATA LAPORAN TRANSAKSI BENGKEL MOBIL TOTOK JAYA"],
                ["TEMPAT  : BENGKEL MOBIL TOTOK JAYA"],
                ["BULAN     : "],
                ["NO.", "NAMA AKUN", "NO ANTRIAN", "TANGGAL", "MONTIR", "NAMA STNK", "NOMOR PLAT", "NAMA MOBIL", "TANGGAL SERVICE", "KELUHAN", "STATUS", "HARGA SERVICE", "TOTAL KESELURUHAN"],
                
            ];
    }

    public function map($row): array
    {
        $no = "";
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
            $row->priceService,
            $row->total_price,

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
        $sheet->getStyle('A4:M4')->applyFromArray($styleArray);
        $sheet->getStyle('A5:M5')->applyFromArray($styleArray);

        $setSheet = $this->totalData + 1;
        for ($i = 1; $i < $setSheet; $i++) {
            $x = 4;
            $x += $i;

            // TERAPKAN BORDER BERDASRKAN COLUMN
            $sheet->getStyle('A' . $x . ':M' . $x)->applyFromArray($styleArray);

            // TERAPKAN VALUE BERDASRKAN COLUMN
            $sheet->getCell('A' . $x)->setValue($i);

            // SETTING KOLOM MENJADI WRAP TEXT
            $sheet->getStyle("B" . $x . ":B" . $x)->getAlignment()->setWrapText(true);
            $sheet->getStyle("D" . $x . ":D" . $x)->getAlignment()->setWrapText(true);
            $sheet->getStyle("G" . $x . ":G" . $x)->getAlignment()->setWrapText(true);

            // $sheet->getStyle("E" . $x . ":E" . $x)->getAlignment()->setHorizontal('center');
        }

        // MENGGABUNGKAN COLUMN
        $sheet->mergeCells('A1:M1');
        $sheet->mergeCells('A2:M2');
        $sheet->mergeCells('A3:M3');

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
        // $sheet->mergeCells('M4:M5');

        // SETTING KOLOM MENJADI WRAP TEXT
        $sheet->getStyle("G4:G5")->getAlignment()->setWrapText(true);
        $sheet->getStyle("F4:F5")->getAlignment()->setWrapText(true);

        // MEMBUAT TULISAN TEBAL (BOLD)
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        $sheet->getStyle('A4:M4')->getFont()->setBold(true);
        // $sheet->getStyle('A5:M5')->getFont()->setBold(true);

        /**
         * MEMBUAT TULISAN MENJADI VERTIKAL TENGAH
         */
        $sheet->getStyle('A1:M1')->getAlignment()->setVertical('center');
        $sheet->getStyle('A4:M4')->getAlignment()->setVertical('center');
        // $sheet->getStyle('A5:M5')->getAlignment()->setVertical('center');

        /**
         *  MEMBUAT TULISAN MENJADI HORIZONTAL TENGAH
         */
        $sheet->getStyle('A1:M1')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A4:M4')->getAlignment()->setHorizontal('center');
        // $sheet->getStyle('A5:M5')->getAlignment()->setHorizontal('center');
    }
}
