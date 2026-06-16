<?php

include 'includes/auth.php';
include 'includes/header.php';

?>

<h3>Barcode Scanner</h3>

<div id="reader"></div>

<div id="result" class="mt-4"></div>

<script src="https://unpkg.com/html5-qrcode"></script>

<script>

function onScanSuccess(decodedText)
{
    fetch(
    'barcode-product.php?barcode='+
    decodedText
    )

    .then(response=>response.json())

    .then(data=>{

        if(data.error)
        {
            document.getElementById(
            'result'
            ).innerHTML=

            '<div class="alert alert-danger">'+
            data.error+
            '</div>';

            return;
        }

        document.getElementById(
        'result'
        ).innerHTML=

        `
        <div class="card">

            <div class="card-body">

                <h4>${data.product_name}</h4>

                <p>
                Barcode:
                ${data.barcode}
                </p>

                <p>
                Category:
                ${data.category}
                </p>

                <p>
                Price:
                ₹${data.price}
                </p>

                <p>
                Stock:
                ${data.quantity}
                </p>

            </div>

        </div>
        `;
    });
}

var html5QrcodeScanner =
new Html5QrcodeScanner(
    "reader",
    {
        fps: 10,
        qrbox: 250,
        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
    }
);

html5QrcodeScanner.render(onScanSuccess);

</script>

<?php include 'includes/footer.php'; ?>