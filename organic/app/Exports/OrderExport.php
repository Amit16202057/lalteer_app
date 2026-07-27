<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\AfterSheet;

class OrderExport implements FromCollection, WithHeadings, WithEvents
{
    protected $orders;
    protected $filters;

    public function __construct($orders, $filters)
    {
        $this->orders = $orders;
        $this->filters = $filters;
    }

    public function collection()
    {
        return $this->orders->map(function ($order) {
            return [
                $order->code,
                $order->grand_total, // This will be "Amount" in Excel
                ucfirst($order->payment_status),
                ucfirst($order->delivery_status),
                $order->created_at->format('Y-m-d H:i'),
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Order Code',
            'Amount', // renamed from Grand Total
            'Payment Status',
            'Delivery Status',
            'Order Date'
        ];
    }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {

                // Calculate total amount
                $totalAmount = $this->orders->sum('grand_total');

                $summary = [
                    ["Filtered Summary"],
                    ["Search", $this->filters['search'] ?? 'All'],
                    ["Payment Status", $this->filters['payment_status'] ?? 'All'],
                    ["Delivery Status", $this->filters['delivery_status'] ?? 'All'],
                    ["Date Range", $this->filters['date'] ?? 'All'],
                    ["Exported Total Orders", count($this->orders)],
                    ["Total Amount", $totalAmount],
                    [""], // Blank row before headings
                ];

                $row = 1;
                foreach ($summary as $line) {
                    $event->sheet->setCellValue("A{$row}", $line[0]);
                    if (isset($line[1])) {
                        $event->sheet->setCellValue("B{$row}", $line[1]);
                    }
                    $row++;
                }
            },

            AfterSheet::class => function (AfterSheet $event) {
                // Make summary bold
                $event->sheet->getStyle('A1:B7')->getFont()->setBold(true);
            }
        ];
    }
}
