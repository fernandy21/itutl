<?php
// Get the ID from the URL parameter
$id = $_GET['id'];
if (strpos($id, ',') !== false) {
    $id = explode(',', $id);
}
// If it's a single ID, convert it to an array
$id = (array) $id;

$nama_user = $_GET['user'];
// echo '<pre>';
// var_dump($nama_user);
// // var_dump($datanama);
// echo '</pre>';
// die();

// Fetch data from the database based on the ID
// Assuming you have a function to retrieve data based on ID in your model
$data = $this->lembur->getLemburId($id);
$datanama = $this->lembur->getLemburNama($nama_user);

function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
    );

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $split       = explode('-', $tanggal);
    $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }
    return $tgl_indo;
}

$tanggal = date('Y-m-d');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Print Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            @page {
                margin: 20px;
                /* Set margins to 0 for full-page printing */
                padding: 0;
                /* Set margins to 0 for full-page printing */
            }
        }

        body {
            width: auto;
            display: flex;
            flex-wrap: wrap;
            flex-direction: row;
            zoom: 190%;
            font-family: 'Times New Roman', Times, serif;
            /* Use Times New Roman font */
            font-size: 9pt;
            /* Set font size to 9pt */
            line-height: 1.5;
            /* Set line spacing to 1.5 */
        }
    </style>
</head>

<body onload="window.print()">
    <?php
    if (isset($id)) {
        foreach ($data as $row) :
    ?>
            <div id="printArea" class="print_lembur_<?php echo $row->id; ?>" style="margin:5mm; width: 105mm; height: 148mm; border: 1px solid; background-image: url(<?= base_url('assets/img/bgk-lembur.png') ?>); background-size: cover; background-repeat: no-repeat;">
                <!-- Your content goes here -->
                <div>
                    <div style="position:relative; left:33mm; top: 35.5mm;">
                        Qhusnul Arienda, Amd. Farm<br>
                        Kepala Unit IT
                    </div>
                    <div style="position:relative; left:33mm; top: 41.8mm;">
                        <?php echo $row->Nama; ?><br>
                        STAFF IT
                    </div>
                    <div style="position:relative; left:33mm; top: 54mm;">
                        <?php echo $row->tanggal; ?>, <?php echo $row->durasi; ?><br>
                    </div>
                    <div style="position:relative; left:9mm; top: 60mm;">
                        <?php echo nl2br($row->perihal); ?><br>
                    </div>
                    <div style="position:relative; right:-30mm ;top: 63mm; text-align: center; line-height: 1;">
                        Martapura, <?php echo tanggal_indo($tanggal, false) ?><br>
                        Pemberi Tugas,<br><br><br>
                        Qhusnul Arienda, Amd. Farm<br>
                        159.011113
                    </div>
                    <div style="position:relative; left:-29mm; top: 47.2mm; text-align: center; line-height: 1;">
                        Penerima Tugas,<br><br><br>
                        <?php echo $row->Nama; ?><br>
                        <?php echo $row->NIK; ?><br>
                    </div>
                    <div style="position:relative; left:47.4mm; top: 50mm; line-height: 1;">
                        Mengetahui
                    </div>
                </div>
            </div>
        <?php endforeach;
    } elseif (isset($nama_user)) {
        foreach ($datanama as $row) :
        ?>
            <div id="printArea" class="print_lembur_<?php echo $row->Nama; ?>" style="margin:5mm; width: 105mm; height: 148mm; border: 1px solid; background-image: url(<?= base_url('assets/img/bgk-lembur.png') ?>); background-size: cover; background-repeat: no-repeat;">
                <!-- Your content goes here -->
                <div>
                    <div style="position:relative; left:33mm; top: 35.5mm;">
                        Qhusnul Arienda, Amd. Farm<br>
                        Kepala Unit IT
                    </div>
                    <div style="position:relative; left:33mm; top: 41.8mm;">
                        <?php echo $row->Nama; ?><br>
                        STAFF IT
                    </div>
                    <div style="position:relative; left:33mm; top: 54mm;">
                        <?php echo $row->tanggal; ?>, <?php echo $row->durasi; ?><br>
                    </div>
                    <div style="position:relative; left:9mm; top: 60mm;">
                        <?php echo nl2br($row->perihal); ?><br>
                    </div>
                    <div style="position:relative; right:-30mm ;top: 63mm; text-align: center; line-height: 1;">
                        Martapura, <?php echo tanggal_indo($tanggal, false) ?><br>
                        Pemberi Tugas,<br><br><br>
                        Qhusnul Arienda, Amd. Farm<br>
                        159.011113
                    </div>
                    <div style="position:relative; left:-29mm; top: 47.2mm; text-align: center; line-height: 1;">
                        Penerima Tugas,<br><br><br>
                        <?php echo $row->Nama; ?><br>
                        <?php echo $row->NIK; ?><br>
                    </div>
                    <div style="position:relative; left:47.4mm; top: 50mm; line-height: 1;">
                        Mengetahui
                    </div>
                </div>
            </div>
    <?php endforeach;
    }
    ?>


</body>

</html>