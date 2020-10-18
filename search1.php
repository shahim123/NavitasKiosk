<?php
include('partials/_dbconnect.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Search1</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;

        }

        .filter {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 1;
            opacity: .7;
            background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .5)), url(./images//img09.jpg) no-repeat center center /cover;

        }

        table {
            position: absolute;
            z-index: 2;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 500px;
            border-collapse: collapse;
            border-spacing: 0;
            border-radius: 12px 12px 0 0;
            overflow: hidden;
            box-shadow: 0 12px 5px grey;
            background: #fafafa;
            text-align: center;

        }

        th {
            background: #8c8c8c;
            padding: 12px 15px;
            color: #fafafa;
            text-transform: uppercase;
            font-family: 'Roboto', 'sans-serif';

        }

        .search-box #search {
            position: absolute;
            top: 25%;
            left: 50%;
            z-index: 1000;
            transform: translate(-30%, -30%);
            background: #f3f3f3;
            height: 40px;
            border-radius: 40px;
            padding: 10px;

        }

        h3 {
            margin-top: 100px;
            text-align: center;
            color: black;
        }

        div.container4 {
            height: 10em;
            position: relative
        }

        div.container4 h2 {
            margin: 0;
            text-decoration: underline;
            position: absolute;
            color: white;

            top: 40%;
            left: 50%;
            margin-right: -50%;
            transform: translate(-50%, -50%)
        }
    </style>
</head>

<body>

    <?php
    include('partials/_dbconnect.php'); //DB CONNECTION
    ?>

    <div class="filter">

        <div class=container4>
            <h2>Here are your Search Results</h2>
        </div>

    </div>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Room Number</th>
                <th>Locations</th>
                <th>Location Image</th>
            </tr>

            <?php
            //Script to filter our search and selecting the imagees comlumn from out database!
            if (isset($_POST['submit-search'])) {
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                $sql = "SELECT * FROM search WHERE room_no LIKE '%$search%' OR Locations LIKE '%$search%'";
                $result = mysqli_query($conn, $sql);
                $queryResults = mysqli_num_rows($result);


                //Fetching data if any rows are present! 
                if ($queryResults > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>
                        <tr>

                            <td><?php echo $row['s_no']; ?></td>
                            <td><?php echo $row['room_no']; ?></td>
                            <td><?php echo $row['Locations']; ?></td>
                            <td><?php echo '<img src = "data:image;base64,' . base64_encode($row['images']) . '" alt="Image" style ="width:600px;height:400px">'; ?></td>
                        </tr>
            <?php
                    }
                    echo "</table>";
                } else {
                    echo "0 result";
                }
            }
            ?>
        </thead>


    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>