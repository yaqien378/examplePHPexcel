<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=test.xls");

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Testing excel</title>
    </head>
    <body>
        <table border="3px;">
            <thead>
                <tr style="text-align:center">
                    <th >No.</th>
                    <th>Nama</th>
                    <th colspan="2">dana</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td ><center>1</center></td>
                    <td>jabrek</td>
                    <td>2016</td>
                    <td>2.000.000,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>yaqin</td>
                    <td>2017</td>
                    <td>3.050.000,00</td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
