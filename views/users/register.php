<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../style/css/style.css">
    <script src="../../style/js/bootstrap.min.js"></script>
</head>
<p id="add">
<h2>add user</h2>
</p>
<div id='main'>

    <?php if($result) : ?>
    <p class="alert alert-success">added usccefully</p>
    <?php else :?>
    <?php if(isset($errors) && is_array($errors)) : ?>
    <ul>
        <?php foreach($errors as $error) : ?>
        <li class="alert alert-danger"> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <?php endif; ?>


    <form action="#" method="post">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Your Name" id="name"
                value="<?php echo $name; ?>">
        </div>

        <div class="form-group">
            <label for="familyName">Family Name</label>
            <input type="text" class="form-control" name="familyName" placeholder="Enter Your Family Name"
                id="familyName" value="<?php echo $familyName; ?>">
        </div>

        <div class="form-group">
            <label for="phoneNumber">Phone Number </label>
            <input type="text" class="form-control" name="phoneNumber" placeholder="Enter Your Phone Number"
                id="phoneNumber" value="<?php echo $phoneNumber; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name='email' placeholder="Enter Your Email" class="form-control" id="exampleInputEmail1"
                value="<?php echo $email ?>">
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Submit</button>

    </form>
</div>

</html>