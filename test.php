<!DOCTYPE html>
<html>
<head>
    <title>Contoh Input dengan onchange</title>
</head>
<body>
    <label for="inputText">Masukkan Teks:</label>
    <input type="text" id="inputText" onchange="ubahParagraf()">
    
    <p id="output">Teks akan ditampilkan di sini.</p>
    
    <script>
        function ubahParagraf() {
            var inputText = document.getElementById("inputText").value;
            var output = document.getElementById("output");
            output.textContent = "Teks yang dimasukkan: " + inputText;
        }
    </script>
</body>
</html>