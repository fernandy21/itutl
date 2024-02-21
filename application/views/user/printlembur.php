<?php
// Get the ID from the URL parameter
$id = $_GET['id'];

// print_r($id);die();
// Fetch data from the database based on the ID
// Assuming you have a function to retrieve data based on ID in your model
$data = $this->lembur->getLemburId($id);
// print_r($data);die();
// echo '<pre>';
// var_dump($data);
// echo '</pre>';

function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
				'Selasa',
				'Rabu',
				'Kamis',
				'Jumat',
				'Sabtu',
				'Minggu'
			);
			
	$bulan = array (1 =>   'Januari',
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
	$split 	  = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	
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
                /* Set paper size to A6 */
                @page {
                    margin: 20px; /* Set margins to 0 for full-page printing */
                    padding: 0; /* Set margins to 0 for full-page printing */
                }
            }
            body {
                font-family: 'Times New Roman', Times, serif; /* Use Times New Roman font */
                font-size: 9pt; /* Set font size to 9pt */
                line-height: 1.5; /* Set line spacing to 1.5 */
            }
        </style>
    </head>
    <body>
        <div id="printArea" style="max-width: 105mm; height: 148mm; border: 1px solid; background-image: url(<?= base_url('assets/img/bgk-lembur.png')?>); background-size: cover; background-repeat: no-repeat;">
            <!-- Your content goes here -->
            <div>
                <div style="position:absolute; left:33mm; top: 35.5mm;">
                    Qhusnul Arienda, Amd. Farm<br>
                    Kepala Unit IT
                </div>
                <div style="position:absolute; left:33mm; top: 51.8mm;">
                    <?php echo $data->Nama; ?><br>
                    STAFF IT
                </div>
                <div style="position:absolute; left:33mm; top: 73.3mm;">
                    <?php echo $data->tanggal; ?>, <?php echo $data->durasi; ?><br>
                        </div>
                <div style="position:absolute; left:9mm; top: 84.2mm;">
                        <?php echo nl2br($data->perihal); ?><br>
                </div>
                        <div style="position:relative; right:-66mm ;top: 101mm;">
                    Martpaura, <?php echo tanggal_indo($tanggal, false) ?><br>
                </div>
                <div style="position:relative; right:-66mm; top: 112mm;">
                    Qhusnul Arienda, Amd. Farm<br>
                    &emsp;&emsp;&emsp;&emsp;&nbsp;159.011113
                </div>
            <!-- </p> -->
            </div>
        </div>
    </body>
</html>