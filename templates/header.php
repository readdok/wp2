<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <title>Bootstrap, MY TEST BLOG</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="bootstrap/js/jquery-1.7.2.min.js"></script>
    <script src="bootstrap/js/bootstap.min.js"></script>
	
	<script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/samples/sample.js"></script>
    <link rel="stylesheet" href="/ckeditor/samples/sample.css">
</head>

<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="?">MY TEST BLOG</a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="?">Главная</a></li>
                    <?php if (IS_ADMIN): ?>
                        <li><a href="?act=logout">Admin (Выйти)</a></li>
                    <?php else: ?>
                        <li><a href="?act=login">Войти</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">

