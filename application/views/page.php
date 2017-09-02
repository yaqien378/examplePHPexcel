<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Export dan Import data Excel dengan PHP</title>

        <link rel="stylesheet" href="<?= base_url() ?>/assets/style.css" />
    </head>
    <body>

        <div id="container">
            <h1>EXPORT DAN IMPORT DATA EXCEL DENGAN PHP</h1>

            <div id="body">
                <p>Import Data dari Excel ke Database</p>
                <code>
                    <form  action="<?php echo  site_url('page/import'); ?> " method="post" enctype="multipart/form-data">
                        <p><input type="file" name="fileinput" value="" placeholder="file upload"></p>
                        <button type="submit" name="button">import</button>
                    </form>
                </code>

                <p>Export Data dari Database ke Excel</p>
                <code><?= anchor('page/export', 'Export') ?></code>

                <div>
                    <table>
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
                </div>
            </div>

            <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
        </div>

    </body>
</html>
