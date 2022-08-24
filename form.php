<?php
require_once 'index.php';
?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php if ($expression == true): ?>
    <h1>Users</h1>
    <form class="row g-3" method="post" action="index.php">
        <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Name</label>
            <input type="text" class="form-control" id="validationDefault01" name="name" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault02" class="form-label">Surname</label>
            <input type="text" class="form-control" id="validationDefault02" name="surname" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefault03" class="form-label">Age</label>
            <input type="text" class="form-control" id="validationDefault03" name="age" required>
        </div>
        <div class="col-md-4">
            <label for="validationDefaultUsername" class="form-label">Email</label>
            <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                <input type="email" class="form-control" id="validationDefaultUsername"
                       aria-describedby="inputGroupPrepend2"
                       name="email" required>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary" type="submit" name="go">Submit form</button>
            <button class="btn btn-primary" type="reset">Reset form</button>
        </div>
    </form>
    <div class="col-12">
        <form method="post" action="index.php"
        ">
        <select name="getUser">
            <option>Users ID</option>
            <?php
            $usersIdArr = $db->getUsersId();
            foreach ($usersIdArr as $key) {
                foreach ($key as $value) {
                    echo "<option value='$value'> ID $value</option>";
                }
            }
            ?>
        </select>
        <button class="btn btn-primary" type="submit" name="checkUserInfo">Check user info</button>
    </div>
    </form>
    <div class="col-12">
        <form method="post" action="index.php"
        ">
        <select name="deleteUsers[]" multiple size="5">
            <option>Users ID</option>
            <?php
            $usersIdArr = $db->getUsersId();
            foreach ($usersIdArr as $key) {
                foreach ($key as $value) {
                    echo "<option value='$value'> ID $value</option>";
                }
            }
            ?>
        </select>
        <button class="btn btn-primary" type="submit" name="checkUserInfo">Delete Users</button>
    </div>
    </form>
    <?php
    if (isset($_POST['getUser'])) {
        $getUser = $db->getUserInfo($_POST);
        foreach ($getUser as $key) {
            foreach ($key as $key => $value) {
                echo $key . '-' . $value;
                echo '<br>';
            }
        }
    }
    ?>


<?php else: ?>
    <form method="post" action="index.php" ">
    <div class="col-12">
        <button type="submit" name="create_table">Create Table</button>
    </div>
    </form>
<?php endif; ?>
</body>
</html>