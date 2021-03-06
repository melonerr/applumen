<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API Document</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

<body style="margin: 3%">
    <center>
        <h2>API Document</h2>
    </center>
    <h3>Test</h3>
    <ul>
        <li class="pb-15">
            Get =>
            <a href="<?php echo $url; ?>test" target="_blank">
                <?php echo $url; ?>test
            </a>
        </li>
        <li class="pb-15">Get =>
            <a href="<?php echo $url; ?>test/1" target="_blank">
                <?php echo $url; ?>test/_id_
            </a>
        </li>
        <li class="pb-15">Get =>
            <a href="<?php echo $url; ?>test/_id_/_name_" target="_blank">
                <?php echo $url; ?>test/_id_/_name_
            </a>
        </li>
    </ul>
    <h3>Use Database</h3>
    <ul>
        <li class="pb-15">
            <p>
                All users
                <br>Get =>
                <a href="<?php echo $url; ?>users" target="_blank">
                    <?php echo $url; ?>users
                </a>
            </p>
        </li>
        <li class="pb-15">
            <p>
                Get Users by id
                <br>Get =>
                <a href="<?php echo $url; ?>users/1" target="_blank">
                    <?php echo $url; ?>users/_id_
                </a>
            </p>
        </li>
        <li class="pb-15">
            <p>
                Create Users
                <br>POST =>
                <a href="<?php echo $url; ?>create/users" target="_blank">
                    <?php echo $url; ?>create/users
                </a>
                <br>
                ส่งข้อมูลมาทุกอัน name, email, github, twitter, location, status
            </p>
        </li>
        <li class="pb-15">
            <p>
                Update Users by id
                <br>Put =>
                <a href="<?php echo $url; ?>update/users" target="_blank">
                    <?php echo $url; ?>update/users
                </a>

                <br>
                ส่งข้อมูลมาทุกอัน id, name, email, github, twitter, location, status
            </p>
        </li>
        <li class="pb-15">
            <p>
                Delete Users by id
                <br>Delete =>
                <a href="<?php echo $url; ?>delete/users" target="_blank">
                    <?php echo $url; ?>delete/users
                </a>
            </p>
        </li>
    </ul>
    <script src="js/index.js"></script>
</body>

</html>
