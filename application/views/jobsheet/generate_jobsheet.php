<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Jobsheet</title>
    <link rel="icon" href="<?php echo base_url('images/logo/SafarLogo1.png'); ?>" type="image/png" />
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .jobsheet_div {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid black;
            margin-left: 5px;
            margin-right: 5px;
            margin-top: 15px;
        }

        .jobsheet_row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            /* Spacing between elements */
            border-bottom: 1px solid black;
            /* Add bottom border to row */
            padding-bottom: 10px;
            /* Add padding below row */
            margin-bottom: 10px;
            /* Add margin below row */
        
        }

        .qrcode_div {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .qrcode {
            max-width: 150px;
            max-height: 150px;
            margin-top: -10px;
        }

        h3 {
            margin: 5px 0;
        }

        /* Target specific h3 elements containing dynamic echoed values */
        h3 strong {
            font-weight: normal;
        }

        .side_div1 {
            flex: 1;
            /* Let side divs take remaining space */
           height: 240px;; 
        }
        .side_div2 {
            flex: 1;
            /* Let side divs take remaining space */
        }

        /* Center align text for material required and department */
        .centered-text {
            text-align: center;
        }

        .department-table {
            border-collapse: collapse;
            width: 100%;
        }

        .department-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        .department-table td:first-child {
            text-align: center;
        }

        @media print {
            body {
                margin: 0;
            }

            .jobsheet_div {
                width: calc(100% - 20px);
                /* Adjust width for print mode */
                /* Subtract 10px to account for margins */
                padding: 10px;
                box-sizing: border-box;
                border: 1px solid black;
                margin-left: 10px;
                margin-right: 5px;
                margin-top: 15px;
                margin-bottom: 15px;
                height: 1090px;
            }

            .jobsheet_row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 20px;
                /* Spacing between elements */
                border-bottom: 1px solid black;
                /* Add bottom border to row */
                padding-bottom: 10px;
                /* Add padding below row */
                margin-bottom: 10px;
                /* Add margin below row */
            }

            .qrcode_div {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .qrcode {
                max-width: 150px;
            max-height: 150px;
            margin-top: -10px;
            }

            /* Center align text for material required and department */
            .centered-text {
                text-align: center;
            }

            .department-table {
                border-collapse: collapse;
                width: 100%;
            }

            .department-table td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }

            .department-table td:first-child {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <?php foreach ($jobsheet as $l) { ?>
    <?php } ?>
    <div class="jobsheet_div">
        <!-- First Section -->
        <h2 style="text-align:center">JOB SHEET - <?php echo $jobsheet->id; ?></h2>
        <div class="jobsheet_row">
            <div>
                <h3>Date of Issue: <strong><?php echo $date; ?></strong></h3>
                <h3>Article Name: <strong><?php echo $article->name.'('.$category->name.')'; ?></strong></h3>
                <h3>Color: <strong><?php echo $color->color; ?></strong></h3>
                <h3>No of Pairs: <strong><?php echo $jobsheet->no_of_pairs; ?></strong></h3>
                <h3>Size: <strong><?php echo $jobsheet->size; ?></strong></h3>
            </div>
            <div class="qrcode_div">
                <img src="<?= $qrCodePath ?>" alt="qrcode" class='qrcode'>
            </div>
        </div>

        <!-- Second Section with Material Required (centered) -->
        <div class="jobsheet_row centered-text">
            <div class="side_div1">
                <h3>Material Required </h3>
            </div>

        </div>

        <!-- Third Section with Department (centered) -->
        <div>
            <div class="side_div2">
                <h3 class="centered-text">Departments</h3>
                <div>
                    <table class="department-table">
                        <?php foreach ($job_type as $type) { ?>
                            <tr>
                                <td width="50%">
                                    <h3><?php echo $type['dept_name']; ?></h3>
                                </td>
                                <td width="50%"></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>

</html>