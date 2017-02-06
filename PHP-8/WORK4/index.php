<?php
$json = file_get_contents(__DIR__ . '/list.json');
$list = json_decode($json);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Table json</title>
        <style>
            td{
                padding: 10px;
                border: 1px solid black;
            }
            thead {
                font-weight: 600;
            }
            table {
                border-collapse: collapse
            }
        </style>
    </head>

    <body>
        <table>
            <thead>
                <tr>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Adress</td>
                    <td>Number</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $user) { ?>
                    <tr>
                        <td>
                            <?= $user->firstName ?>
                        </td>
                        <td>
                            <?= $user->lastName ?>
                        </td>
                        <td>
                            <?= implode(', ', (array)$user->adress) ?>
                        </td>
                        <td>
                            <a href="tel:<?= preg_replace('/\D/', '', $user->phoneNumber); ?>">
                                <?= $user->phoneNumber ?>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
    </body>

    </html>