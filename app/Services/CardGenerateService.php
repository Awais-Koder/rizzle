<?php

namespace App\Services;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Picqer\Barcode\BarcodeGenerator;
use ZipArchive;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CardGenerateService
{
    public static function generateCard($data)
    {
        $cardExpiryDate = Carbon::now()->addYear();
        $userName = $data->name;
        $number = $data->card_number; // Dummy card number
        $templatePath = public_path('card/f.png');
        $image = imagecreatefrompng($templatePath);
        $fontSize = 70; // Font size
        $fontColor = imagecolorallocate($image, 0, 0, 0);
        $fontPath = public_path('card/credit.ttf');
        $expireDate = Carbon::now()->addYear()->format('m/y');
        // $userNameX = 130; // X coordinate for the user name
        // $userNameY = 1500; // Y coordinate for the user name
        // $expireDateX = 1140; // X coordinate for the expire date
        // $expireDateY = 1500;
        // $numberX = 100; // X coordinate for the number
        // $numberY = 1100; // Y coordinate for the number
        $userNameX = 15; // X coordinate for the user name
        $userNameY = 15; // Y coordinate for the user name
        $expireDateX = 11; // X coordinate for the expire date
        $expireDateY = 15;
        $numberX = 10; // X coordinate for the number
        $numberY = 11; // Y coordinate for the number

        // Split the card number into chunks of 4 digits, separated by a space
        $formattedCardNumber = chunk_split($number, 4, ' ');

        // Trim the last space added by chunk_split
        $formattedCardNumber = trim($formattedCardNumber);

        imagettftext($image, $fontSize, 0, $userNameX, $userNameY, $fontColor, $fontPath, $userName);
        imagettftext($image, $fontSize, 0, $expireDateX, $expireDateY, $fontColor, $fontPath, $expireDate);
        imagettftext($image, 120, 0, $userNameX, $numberY, $fontColor, $fontPath, $formattedCardNumber);

        // Process back card image
        $backTemplatePath = public_path('card/b.png');
        $backImage = imagecreatefrompng($backTemplatePath);

        // Generate QR Code
        $qrContent = $number;
        $qrCode = new QrCode($qrContent);
        // $qrCode->setSize(220);
        $writer = new PngWriter();
        $qrCodeImage = imagecreatefromstring($writer->write($qrCode)->getString());

        // Generate Barcode
        $barcodeContent = $number;
        $generator = new BarcodeGeneratorPNG();
        $scale = 3; // Adjust this value to control the barcode's width indirectly
        $height = 60; // Directly controls the barcode's height
        $barcodeImageString = $generator->getBarcode($barcodeContent, $generator::TYPE_CODE_128, $scale, $height);
        $barcode = imagecreatefromstring($barcodeImageString);

        // Calculate QR code position for bottom right corner
        $qrXPosition = imagesx($backImage) - imagesx($qrCodeImage) - 30; // 10 pixels from the right edge
        $qrYPosition = imagesy($backImage) - imagesy($qrCodeImage) - 30; // 10 pixels from the bottom edge

        // Calculate Barcode position for center top
        $barcodeWidth = imagesx($barcode);
        $barcodeHeight = imagesy($barcode);
        $barcodeXPosition = 70; // Center horizontally
        $barcodeYPosition = 240; // 10 pixels from the top edge

        // Copy QR code onto the back image at calculated position
        imagecopy($backImage, $qrCodeImage, $qrXPosition, $qrYPosition, 0, 0, imagesx($qrCodeImage), imagesy($qrCodeImage));

        // Copy Barcode onto the back image at calculated position
        imagecopy($backImage, $barcode, $barcodeXPosition, $barcodeYPosition, 0, 0, $barcodeWidth, $barcodeHeight);

        // Save both images to temporary directory
        $tempDir = public_path('temp/');
        if (!file_exists($tempDir)) {
            mkdir($tempDir, 0777, true);
        }
        $frontImagePath = $tempDir . 'frontImage.png';
        $backImagePath = $tempDir . 'backImage.png';
        imagepng($image, $frontImagePath);
        imagepng($backImage, $backImagePath);
        imagedestroy($image);
        imagedestroy($backImage);
        imagedestroy($qrCodeImage);
        imagedestroy($barcode);

        // Create zip archive
        $zip = new ZipArchive;
        $zipFilePath = public_path('temp/cardImages.zip');
        $data->expiry_date = $cardExpiryDate;
        $data->save();
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($frontImagePath, 'frontImage.png');
            $zip->addFile($backImagePath, 'backImage.png');
            $zip->close();
            // Send response to download zip file
            return response()->download($zipFilePath)->deleteFileAfterSend(true);
        } else {
            return 'Failed to create zip file.';
        }
    }
}
##
