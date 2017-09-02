<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data-user.xls");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Export dan Import data Excel dengan PHP</title>
    </head>
    <body>
        <table border="2px">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kontak</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ( count( $users ) > 0 ) { ?>
                    <?php foreach ($users as $val) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo ucfirst( $val->nama ); ?></td>
                            <td><?php echo $val->alamat; ?></td>
                            <td><?php echo $val->kontak; ?></td>
                        </tr>
                        <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="4" style="text-align: center"><span>Tidak ada data yang di tampilkan.</span></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="text-align: center"><p>2017&copy;Punelproject</p></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
