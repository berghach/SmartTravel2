<?php

class QrCode {

    public static function generateQrCode($content, $size = 200) {
        $qrCodeUrl = "https://chart.googleapis.com/chart?chs={$size}x{$size}&cht=qr&chl=" . urlencode($content) . "&choe=UTF-8";

        return "<img src='{$qrCodeUrl}' alt='QR Code' />";
    }

}

// HOW TO USE IT?
// JUST DO THIS

// include "qr.php";
// $qrContent = "Hello";
// echo QrCode::generateQrCode($qrContent, 500);

// $msg = "I'm berghach";
// echo QrCode::generateQrCode($msg);


?>