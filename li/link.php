<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Links</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script defer src="../js/all.js"></script>
    <!--load all styles -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .wrapper {
            width: 80%;
            margin: 0 auto;
        }

        table tr td:last-child {
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Links Details</h2>
                        <a href="linkcreate.php" class="btn btn-success pull-right "><i class="fa fa-plus"></i> Add New link</a>
                        <a href="../us/index.php" class="btn btn-secondary pull-right "><i class="fas fa-link"></i> Back to users </a>
                    </div>
                    <div class="container">

                        <table class="table ">
                            <thead class="table-dark">
                                <tr>
                                    <th> date </th>
                                    <th> link </th>
                                    <th> Notes </th>
                                    <th> action </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php require('linksfunctions.php');
                                $rows = getlinks();
                                foreach ($rows as $row) : ?>
                                    <tr>
                                        <td> <?php echo $row["date"];
                                                $url = str_replace('https://www.youtube.com/watch?v=', '', $row["link"]); ?> </td>
                                        <td> <a href="<?php echo $row["link"] ?>" target="_blank"><?php echo $row["link"] ?></a> </td>

                                        <td> <?php echo $row["notes"] ?> </td>
                                        <td>
                                            <a href="javascript:CopyToClipboard('<?php echo ($url) ?>')" class="btn btn-sm btn-outline-primary"> <i class="far fa-copy"></i></a>
                                            <a href="linkread.php?date=<?php echo $row["date"] ?>" class="btn btn-sm btn-outline-primary"><i class="far fa-eye"></i></a>
                                            <a href="linkupdate.php?date=<?php echo $row["date"] ?>" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i></a>
                                            <a href="linkdelete.php?date=<?php echo $row["date"] ?>" class="btn btn-sm btn-outline-danger"><i class="far fa-trash-alt"></i></a>

                                        </td>
                                    </tr>
                                <?php endforeach;; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>