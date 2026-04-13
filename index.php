<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signature Drawing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        #signatureCanvas {
            border: 1px solid #000;
            cursor: default; /* Changes cursor to arrow */
        }
        .controls {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Draw Your Signature</h1>
    <canvas id="signatureCanvas" width="500" height="200"></canvas>
    <div class="controls">
        <button onclick="clearCanvas()">Clear</button>
        <form action="save_signature.php" method="POST" onsubmit="saveSignature()">
            <input type="hidden" id="signatureInput" name="signature">
            <button type="submit">Save Signature</button>
        </form>
    </div>

    <script>
        const canvas = document.getElementById("signatureCanvas");
        const ctx = canvas.getContext("2d");

        let isDrawing = false;

        canvas.addEventListener("mousedown", startDrawing);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("mouseup", stopDrawing);
        canvas.addEventListener("mouseleave", stopDrawing);

        function startDrawing(event) {
            isDrawing = true;
            ctx.beginPath();
            ctx.moveTo(event.offsetX, event.offsetY);
        }

        function draw(event) {
            if (!isDrawing) return;
            ctx.lineWidth = 2;
            ctx.lineCap = "round";
            ctx.strokeStyle = "black";
            ctx.lineTo(event.offsetX, event.offsetY);
            ctx.stroke();
        }

        function stopDrawing() {
            isDrawing = false;
            ctx.beginPath();
        }

        function clearCanvas() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        }

        function saveSignature() {
            const signatureData = canvas.toDataURL("image/png");
            document.getElementById("signatureInput").value = signatureData;
        }
    </script>
</body>
</html>
