<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php

    require('linksfunctions.php');
    if (!isset($_GET['date'])) {
        include('partials/not_found.php');
        exit;
    }


    $linkdate = $_GET['date'];

    $row = getlinkBydate($linkdate);
    if (!$row) {
        include('partials/not_found.php');
        exit;
    }
    ?>
    <div class="float-container">

        <div class="float-child" style="width: 45%;float: left;padding: 20px;">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3> View link </h3>
                    </div>
                    <div class="card-body">
                        <a href="linkupdate.php?date=<?php echo $row["date"] ?>" class="btn btn-outline-secondary">Update</i></a>
                        <a class="btn btn-outline-danger" href="linkdelete.php?date=<?php echo $row["date"] ?>"> Delete</a>
                        <a class="btn btn-outline-secondary" href="link.php"> Back</a>

                    </div>
                </div>


                <table class="table">


                    <tbody>
                        <tr>
                            <th> date </th>
                            <td><?php echo $row['date'] ?></td>
                        </tr>
                        <tr>
                            <th> Link </th>
                            <td><?php echo $row['link'] ?></td>
                        </tr>
                        <tr>
                            <th> Picture </th>
                            <td><?php echo $row['picture'] ?></td>
                        </tr>
                       
                        <tr>
                            <th> Notes </th>
                            <td><?php echo $row['notes'] ?></td>
                        </tr>
                        <tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    </div>


    <div class="float-child" style="width: 50%;float: left;padding: 20px;">

        <div class="mapouter" style="position: relative;
            float: left; width:100%">
            <div class="gmap_canvas">
                <h3>Display on Map</h3>

              
            </div>
        </div>

    </div>
    </div>
    </div>
    </div>

</body>

</html>