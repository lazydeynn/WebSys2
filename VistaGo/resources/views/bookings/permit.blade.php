<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>VistaGo Entry Permit</title>
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            border: 2px solid #4F46E5;
            padding: 30px;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #4F46E5;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #4F46E5;
            margin: 0;
            font-size: 28px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0;
            font-size: 14px;
            color: #666;
        }
        .content {
            margin-bottom: 20px;
        }
        .content .row {
            margin-bottom: 10px;
        }
        .content .label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 30px;
            border-top: 1px solid #ccc;
            padding-top: 10px;
        }
        .status-badge {
            background-color: #10B981;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>VistaGo</h1>
            <p>Official Entry Permit</p>
        </div>

        <div class="content">
            <div class="row">
                <span class="label">Permit No:</span> #{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}
            </div>
            <div class="row">
                <span class="label">Tourist Name:</span> {{ $booking->user->name }}
            </div>
            <div class="row">
                <span class="label">Destination:</span> {{ $booking->destination->name }}
            </div>
            <div class="row">
                <span class="label">Visit Date:</span> {{ \Carbon\Carbon::parse($booking->visit_date)->format('F d, Y') }} {{ $booking->end_date ? '- ' . \Carbon\Carbon::parse($booking->end_date)->format('F d, Y') : '' }} at {{ $booking->visit_time ? \Carbon\Carbon::parse($booking->visit_time)->format('h:i A') : 'N/A' }}
            </div>
            @if($booking->guide)
            <div class="row">
                <span class="label">Tour Guide:</span> {{ $booking->guide->name }}
            </div>
            @endif
            <div class="row">
                <span class="label">Status:</span>
                <span class="status-badge">APPROVED</span>
            </div>
            <div class="row" style="margin-top: 20px; border-top: 2px solid #4F46E5; padding-top: 20px;">
                <span class="label" style="font-size: 18px; color: #111827;">Total Paid:</span> 
                <span style="font-size: 18px; font-weight: bold; color: #4F46E5;">&#8369;{{ number_format($booking->total_price, 2) }}</span>
            </div>
        </div>

        <div class="footer">
            <p>Please present this digital or printed permit at the entrance.</p>
            <p>&copy; {{ date('Y') }} VistaGo Tourism Management System. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
