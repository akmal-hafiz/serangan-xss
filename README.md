# serangan-xss
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Eksperimen XSS: Ketika Komentar Biasa Bisa Jadi Serangan Berbahaya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        pre {
            background: #f4f4f4;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        code {
            background: #f4f4f4;
            padding: 2px 5px;
            border-radius: 3px;
        }
    </style>
</head>
<body>

<h1 align="center">Eksperimen XSS: Ketika Komentar Biasa Bisa Jadi Serangan Berbahaya</h1>

<h2>Pendahuluan</h2>
<p>Pernahkah kamu membayangkan bahwa kolom komentar di sebuah situs bisa digunakan untuk menjalankan perintah berbahaya di browser? Yah, itu sangat seram bukan? Dan ini tentunya bukan cerita fiksi, tapi kenyataan yang sering terjadi karena celah keamanan bernama Cross-Site Scripting (XSS).</p>

<p>Tentu saja saya dalam artikel ini, akan mencoba menjelaskan XSS dengan contoh eksperimen sederhana, sekaligus menunjukkan bagaimana serangan ini terjadi dan cara menghindarinya tentu saja yang bakal kalian mengerti dengan cepat.</p>

<h2>Apa Itu XSS?</h2>
<p>Cross-Site Scripting (XSS) ini adalah jenis serangan keamanan di mana penyerang bisa dengan sangat gampang sekali menyisipkan kode JavaScript berbahaya ke dalam halaman web, dengan tujuan agar kode tersebut dijalankan di browser korban - cukup seram bukan?</p>

<p>Biasanya serangan berbahaya seperti ini itu dilakukan melalui input user, contoh sederhananya seperti kolom komentar, form pencarian, atau parameter di URL.</p>

<p>Begini contohnya, jika ada sebuah situs menampilkan input pengguna secara langsung tanpa validasi, maka script yang sesederhana ini bisa disisipkan:</p>

<pre><code>&lt;script&gt;alert('Saya diserang XSS!')&lt;/script&gt;</code></pre>

<p>Dan ketika halaman ditampilkan, browser akan menjalankan script tersebut - meskipun itu berasal dari input pengguna biasa.</p>

<h2>Jenis-Jenis XSS</h2>
<p>Menurut OWASP (Open Web Application Security Project), XSS dibagi menjadi beberapa jenis:</p>
<ul>
  <li><strong>Reflected XSS</strong> - Script muncul dari permintaan langsung pengguna (biasanya via URL).</li>
  <li><strong>Stored XSS</strong> - Script disimpan di server (misalnya di database), dan lalu ditampilkan ke banyak pengguna.</li>
  <li><strong>DOM-based XSS</strong> - Script yang dimanipulasi melalui JavaScript sisi klien (frontend).</li>
</ul>

<h2>Eksperimen Reflected XSS Sederhana</h2>
<p>Berikut ini adalah eksperimen sederhana dari saya menggunakan dua file yang telah saya buat: Contoh.html dan Contoh.php.</p>

<h3>File Contoh.html</h3>
<pre><code>&lt;form action="display.php" method="GET"&gt;
  Masukkan komentar: &lt;input type="text" name="comment"&gt;
  &lt;input type="submit" value="Kirim"&gt;
&lt;/form&gt;</code></pre>

<h3>File Contoh.php</h3>
<pre><code>&lt;?php
$comment = $_GET['comment'];
echo "Komentar Anda: " . $comment;
?&gt;</code></pre>

<h3>Cara Menyerang:</h3>
<p>Masukkan code sederhana ini:</p>
<pre><code>&lt;script&gt;alert('XSS Berhasil Masuk!')&lt;/script&gt;</code></pre>

<p>Di sini, saya membuat jika XSS berhasil masuk, maka akan memunculkan pop-up. Dan ya, hasilnya seperti ini:</p>
<p>Ini adalah contoh klasik dari reflected XSS, karena input langsung dimasukkan ke dalam halaman tanpa disaring.</p>

<h2>Cara Mencegah XSS</h2>
<p>Dan sekarang saya akan memberikan cara untuk mencegah XSS, langkah utamanya adalah dengan menyaring input pengguna dan menghindari pencetakan langsung input ke halaman web yang telah kita buat.</p>

<p>Di PHP, jangan lupa gunakan fungsi seperti ini:</p>
<pre><code>&lt;?php
$comment = htmlspecialchars($_GET['comment']);
echo "Komentar Anda: " . $comment;
?&gt;</code></pre>

<p>Dengan begitu, jika pengguna memasukkan tag &lt;script&gt;, maka yang ditampilkan hanya teks biasa, bukan script yang dijalankan dan tidak akan muncul pop up.</p>

<p>Selain itu, pertimbangkan juga:</p>
<ul>
  <li>Validasi input</li>
  <li>Gunakan Content Security Policy (CSP)</li>
  <li>Gunakan framework modern yang secara default sudah ada fitur untuk melindungi dari serangan berbahaya XSS (seperti React, Laravel, dll)</li>
</ul>

<h2>Kesimpulan</h2>
<p>XSS adalah contoh bahaya yang amat nyata bagaimana input pengguna yang tampak sepele dan kecil seperti ini bisa menjadi celah serius jika tidak ditangani dengan benar. Maka dari itu dengan memahami cara kerja dan pencegahannya, kita tentunya bisa membangun web yang jauh lebih aman dan nyaman.</p>

<h2>Referensi</h2>
<ul>
  <li>OWASP - Cross Site Scripting (XSS)</li>
  <li>Mozilla MDN - Cross-site scripting (XSS)</li>
  <li>Acunetix - What is Cross-site Scripting?</li>
  <li>PortSwigger - XSS explained</li>
</ul>

</body>
</html>
