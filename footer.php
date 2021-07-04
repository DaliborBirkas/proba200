<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<footer class=" container-fluid bg-dark text-center text-white text-lg-start">
    <!-- Copyright -->
    <div class="text-center ">
        © <?php
        $copyYear = 2021; // Set your website start date
        $curYear = date('Y'); // Keeps the second year updated
        echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
        ?> WWBASIFY E-commerce, All rights reserved.
    </div>
    <!-- Copyright -->
</footer>

</body>
</html>

