<!DOCTYPE html>
<head>
    <!-- robot speak -->
    <meta charset="utf-8">
    <title><?=$title;?></title>

    <link rel="icon" href="<?=base_url();?>assets/img/icons/favicon-32.png" type="image/png"><!-- default favicon -->

    <!-- crayons and paint -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

    <!-- magical wizardry -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function send(id)
        {
            // Отсылаем параметры
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>like/",
                data: "id="+id,
                // Выводим то что вернул PHP
                success: function(html) {
                    //предварительно очищаем нужный элемент страницы
                    $("#answ"+id).empty();
                    //и выводим ответ php скрипта
                    $("#answ"+id).append(html);
                }
            });
        }

        function like_repo(id)
        {
            // Отсылаем параметры
            $.ajax({
                type: "POST",
                url: "<?=base_url();?>search/like/",
                data: "id="+id,
                // Выводим то что вернул PHP
                success: function(html) {
                    //предварительно очищаем нужный элемент страницы
                    $("#answ"+id).empty();
                    //и выводим ответ php скрипта
                    $("#answ"+id).append(html);
                }
            });
        }
    </script>
</head>
<body class="subpage">
<!-- Menu -->
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="<?php echo base_url(); ?>"><i class="icon-github-sign"></i> GitHub API Library for CodeIgniter</a>
            <div class="nav-collapse pull-right">
                <ul class="nav">
                    <li>
                        <form id="demo-b" method="post" action="<?=base_url();?>search/">
                            <input type="search" name="search" placeholder="Искать" value="">
                        </form>
                    </li>
                    <li><?php echo anchor(base_url(), 'Home'); ?></li>
                    <?php if ($this->github->get_access_token()) : ?>
                    <li><?php echo anchor('secure/logout', '<i class="icon-lock"></i>Logout'); ?></li>
                    <?php endif; ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>