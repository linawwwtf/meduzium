<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Order;
use App\Services\PdfService;

class PdfController extends Controller
{
    public function store()
    {
        $data = request()->validate([
            'order_id' => 'required|exists:orders,id',
            'events_ids' => 'required'
        ]);

        $eventsIds = $data['events_ids'];
        $eventTitles = [];
        foreach ($eventsIds as $id) {
            $event = Event::findOrFail($id);
            $eventTitles[] = $event->title;
        }

        $orderId = $data['order_id'];

        $order = Order::with('tickets')->findOrFail($orderId);

        $data = [
            'docName' => "tickets-order-{$orderId}",
            'orderId' => $orderId,
            'totalPrice' => $order->total_price,
            'buyDate' => date('d.m.Y', strtotime($order->created_at)),
            'visitDate' => date('d.m.Y', strtotime($order->date)),
            'ticketsData' => $order->tickets,
            'eventsTitles' => $eventTitles
        ];

        $pdfService = new PdfService();
        return $pdfService->generatePDF($data);
    }
}
