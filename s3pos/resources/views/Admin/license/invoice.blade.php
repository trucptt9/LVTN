<!DOCTYPE html>
<html lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Dịch Vụ</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            caption-side: bottom;
            border-collapse: collapse;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            vertical-align: top;
            border-color: #d1d9e7;
        }

        td {
            border-color: inherit;
            border-style: solid;
            padding: 5px;
            text-align: center;
        }

        .invoice-header {
            text-align: center;
        }

        .invoice-details {
            margin-bottom: 24px;
            margin-top: 24px;
        }

        .title {
            font-weight: bold;
            font-size: 20px;
        }

        .image-qrcode {
            text-align: center;
            margin-top: 20px;
        }

        .image-qrcode img {
            height: 200px;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="invoice-header">
            <div class="title">Hóa Đơn Dịch Vụ</div>
            <div>({{ $license->key }})</div>
        </div>
        <div class="invoice-details">
            <div><strong>Cửa hàng:</strong> {{ $license->store->name }}</div>
            <div><strong>Địa chỉ:</strong> {{ $license->store->address }}</div>
            <div><strong>Trạng thái:</strong> {{ $license->status }}</div>
            <div><strong>Thời gian sử dụng:</strong> {{ date('d/m/Y', strtotime($license->date_start)) }} -
                {{ date('d/m/Y', strtotime($license->date_end)) }}</div>
        </div>
        <table class="table table-bordered">
            <tr>
                <td style="width: 25%">Gói dịch vụ</td>
                <td style="width: 15%">Thời gian</td>
                <td style="width: 22%">Đơn giá/ tháng</td>
                <td style="width: 15%">Max user</td>
                <td style="width: 23%">Tổng tiền</td>
            </tr>
            <tr>
                <td>
                    {{ $license->package->name }}
                </td>
                <td>
                    {{ $license->total_month }} tháng
                </td>
                <td>
                    {{ number_format($license->package->amount) }}
                </td>
                <td>
                    {{ number_format($license->package->max_user) }}
                </td>
                <td>
                    {{ number_format($license->total_amount) }}
                </td>
            </tr>
        </table>
        <div class="image-qrcode">
            <img src="{{ $qrcode }}" alt="">
            <div>Quét mã này để thanh toán dịch vụ</div>
        </div>
    </div>
</body>

</html>
