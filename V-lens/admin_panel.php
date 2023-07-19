<?php
session_start();

if (!isset($_SESSION['isAdmin']) || $_SESSION['isAdmin'] !== true) {
    header("location: index.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("location: index.php");
    exit();
}

if (isset($_POST['delete'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'v_lens_db');
    $ids = isset($_POST['delete_ids']) ? $_POST['delete_ids'] : [];
    foreach ($ids as $id) {
        $query = "DELETE FROM v_users WHERE id = $id";
        mysqli_query($conn, $query);
    }
}
?>




<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
</head>
<title>Admin Panel</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-panel {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: center;
        }
        
        tr:hover {
            background-color: gray;
        }

        th {
            background-color: #333;
            color: #fff;
        }

    

        input[type="submit"],
        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: red;
            color: black;
        }

        td.email {
            width: 200px;
            word-break: break-all;
        }
    </style>
<body>
    <div class="admin-panel">
        <form action="" method="POST">
            <input type="submit" value="Log Out" name="logout">
        </form>

        <h1>Welcome to Admin Panel</h1>
        <hr>
        <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected records?')">
            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th class="email">Email</th>
                        <th>DB ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'v_lens_db');
                    $query = "SELECT * FROM v_users";
                    $result = mysqli_query($conn, $query);
                    $num = 1;
                    while ($row = mysqli_fetch_array($result)) {
                        echo "
                    <tr>
                        <td><input type='checkbox' name='delete_ids[]' value='$row[0]'></td>
                        <td>$num</td>
                        <td>$row[3]</td>
                        <td class='email'>$row[4]</td>
                        <td>$row[0]</td>
                    </tr>                                                            
                ";
                        $num++;
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="delete">Delete Selected</button>
        </form>
    </div>

    <script>
        document.getElementById("select-all").addEventListener("change", function() {
            const checkboxes = document.getElementsByName("delete_ids[]");
            for (let i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>
</body>

</html>
