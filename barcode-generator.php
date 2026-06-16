<?php

    require_once 'vendor/autoload.php';

    function generateBarcode($barcodeNumber)
    {
        $generator =  new Picqer\Barcode\BarcodeGeneratorPNG();

        $barcodePath = 'barcode/generated/'.$barcodeNumber.'.png';

        if(!file_exists($barcodePath))
        {
            file_put_contents(
                $barcodePath,
                $generator->getBarcode(
                    $barcodeNumber,
                    $generator::TYPE_CODE_128
                )
            );
        }

        return $barcodePath;
    }
?>