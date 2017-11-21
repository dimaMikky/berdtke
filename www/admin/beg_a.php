<!DOCTYPE html>
<html>
<head>
    <title>Админпанель</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">   <!--dateicker -->
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>                             <!--datepicker -->

    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- DatePicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Select bootstrup-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- DataTables-Select -->
    <script src="https://cdn.datatables.net/select/1.2.3/js/dataTables.select.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.3/css/select.dataTables.min.css">
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    <style type="text/css">
      body { padding-top: 70px; }
      .maincolor {	color: rgb(60, 160, 91); }
    </style>

</head>

<body>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a href="adm.php" class="navbar-brand">Табель</a>-->
    </div>
    <!-- Collection of nav links and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="<? echo ($curmenu ==1) ? 'active' : '' ;?>"><a href="news.php">Новини</a></li>';
        <li class="<? echo ($curmenu ==2) ? 'active' : '' ;?>"><a href="cols.php">Стрічки новин</a></li>';
        <li class="<? echo ($curmenu ==3) ? 'active' : '' ;?>"><a href="user.php">Користувачі</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-off"></span> Вихід</a></li>
      </ul>
    </div>
  </div>
</nav>
