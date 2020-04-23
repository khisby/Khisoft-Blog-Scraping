<h1>Petunjuk : </h1>
<ol>
    <li>Ambil URL postingan dari https://www.blog.khisoft.id</li>
    <li>paste pada kolom dibawah ini</li>
    <li>klik ambil artikel</li>
</ol>

<form action="index.php" method="GET">
     <input type="text" name="url" style="width: 300px" placeholder="Masukkan alamat urlnya..."> 
     <input type="submit" value="Ambil Artikel">
</form>

<?php

    if(isset($_GET['url'])){
        $url = $_GET['url'];
        require_once('simple_html_dom.php');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_URL, $url);
        $html=curl_exec($curl);

        $dom = new simple_html_dom(null, true, true, DEFAULT_TARGET_CHARSET, true, DEFAULT_BR_TEXT, DEFAULT_SPAN_TEXT);
        $html=$dom->load($html, true, true);
        $judul = $html->find('h1', 0)->innertext;
        $konten = "";
        foreach($html->find('p') as $p){
            $konten .= $p->innertext . "</br>";
        }


        echo "Judulnya : " . $judul . "</br>";
        echo "Kontennya : " . $konten;
    }


?>