<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/style.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Roboto+Slab:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <!-- GOOGLE FONTS -->
</head>
<body>
    <header>
        <h1><a href="/">Log in</a></h1>
        <ul>
            <a href="#">
                <li>vk</li>
            </a>
            <a href="#">
                <li>fb</li>
            </a>
            <a href="#">
                <li>tg</li>
            </a>
        </ul>
        <a href="/main/exit" id="exit" style="display: none;">Exit</a>
    </header>
    <?php include 'application/views/'.$content_view; ?>
<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>