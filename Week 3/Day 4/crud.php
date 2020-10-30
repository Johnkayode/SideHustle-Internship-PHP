<?php include('server.php'); 

    if (isset($_GET['edit'])){
        $id = $_GET['edit'];
        $edit_state = True;
        $records = mysqli_query($con, "SELECT * FROM biodata WHERE id=$id");
        $rec = mysqli_fetch_array($records);
        $name = $rec['name'];
        $age = $rec['age'];
        $username = $rec['username'];
        $address = $rec['address'];
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My CRUD App</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>

    <?php if (isset($_SESSION['msg'])): ?>
        <div class="msg">
            <?php
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            ?>
        </div>

<?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Username</th>
                <th>Address</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        <tbody>
    
            <?php
            
                while ($row = mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td><?php  echo $row['name'];   ?></td>
                        <td><?php  echo $row['age'];   ?></td>
                        <td><?php  echo $row['username'];   ?></td>
                        <td><?php  echo $row['address'];   ?></td>
                        <td>
                            <a href='crud.php?edit=<?php echo $row['id']; ?>'  class='edit'>Edit</a>
                        </td>
                        <td>
                            <a href='server.php?del=<?php echo $row['id']; ?>' class='delete'>Delete</a>
                        </td>
                    </tr>   
                <?php } ?>
            
    </table>

    <form method='POST' action='server.php'>
        <input type='hidden' name='id' value='<?php echo $id; ?>'>
        <div class='input-group'>
            <label>Name</label>
            <input type='text' name='name'  value='<?php echo $name; ?>'>
        </div>
        <div class='input-group'>
            <label>Age</label>
            <input type='number' name='age'  value='<?php echo $age; ?>'>
        </div>
        <div class='input-group'>
            <label>Username</label> 
            <input type='text' name='username'  value='<?php echo $username; ?>'>
        </div>
        <div class='input-group'>
            <label>Address</label>
            <input type='text' name='address'  value='<?php echo $address; ?>'>
        </div>
        <div class='input-group'>
            <?php if($edit_state == false): ?>
                <button type='submit' name='save' class='btn'>Save</button>
            <?php else: ?>
                <button type='submit' name='update' class='btn'>Update</button>
            <?php endif ?>
        </div>
    </form>
</body>
</html>