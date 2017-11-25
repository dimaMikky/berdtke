<?php
  include('chlog.php');
  include("connect.php");
  include("../const.php");

  $curmenu = 1;
  $userid = $_SESSION['userid'] ;
	$addeditdel = (isset($_POST['addeditdel'])) ? $_POST['addeditdel'] : 0 ;
	$currid = (isset($_POST['currid'])) ? $_POST['currid'] : 0 ;
	$checkMain = (isset($_POST['checkMain'])) ? $_POST['checkMain'] : "0" ;
	$inpDate = (isset($_POST['inputDate'])) ? $_POST['inputDate'] : "" ;
  $inpDateE = (isset($_POST['inputDateE'])) ? $_POST['inputDateE'] : "" ;
	$inpDescr = (isset($_POST['inputDescr'])) ? $_POST['inputDescr'] : "" ;
  $inpHead = (isset($_POST['inputHead'])) ? $_POST['inputHead'] : "" ;
	$inpText = (isset($_POST['inputText'])) ? $_POST['inputText'] : "" ;
  $delFile = (isset($_POST['delFile'])) ? $_POST['delFile'] : "" ;
  //Новостная лента
  $lentaId = (isset($_COOKIE['lentaId'])) ? $_COOKIE['lentaId'] : 4 ; //Оголошення
  $lentaDescr = 'Список';
  if ($lentaId !== 0) {
    $resultList = mysql_query("SELECT * FROM cols WHERE ks='$OWNERKS' and id='$lentaId'") or die(mysql_error());
    $num_rows = mysql_num_rows($resultList); $row=mysql_fetch_object($resultList);
    $lentaId = ($num_rows == 1) ? $lentaId : 0;
    $lentaDescr = ($num_rows == 0) ? 'Список' : $row->descr;
  }

	switch  ($addeditdel) {
	case (1) :
		// Insert news
		if (!empty($inpDate) AND !empty($inpDescr)) {
      $inputFile = $_FILES["inputFile"]["name"];
      $inputFile = ( !empty($inputFile) AND move_uploaded_file($_FILES["inputFile"]["tmp_name"], '../images/'.$inputFile) ) ? $inputFile : "";
			$resinp = mysql_query("INSERT INTO news (data, dataend, descr, head, ks, lenta, file, text) VALUES ('$inpDate', '$inpDateE','$inpDescr', '$inpHead', '$OWNERKS', '$lentaId', '$inputFile', '$inpText')");
      header("Location: news.php");
     }
		else { echo 'Error - empty value :'.$inpDate.'+'.$inpDescr."<br>";}
		break ;
	case (2) :
    // Edit news
    if (!empty($inpDate) AND !empty($inpDescr)) {
      // Если главная
      if ($checkMain==1) {
        $res = mysql_query("SELECT main, lenta FROM news WHERE `Id`='$currid'");
        $row = mysql_fetch_object($res);
        if ($row->main == 0) $res = mysql_query("UPDATE news SET `Main`=0 WHERE ks='$OWNERKS' AND lenta='$row->lenta'");
      }
      $inputFile = -1; //Без изменений
      if ( !empty($_FILES["inputFile"]["name"]) ) {
        $inputFile = $_FILES["inputFile"]["name"];
        $inputFile = ( !empty($inputFile) AND move_uploaded_file($_FILES["inputFile"]["tmp_name"], '../images/'.$inputFile) ) ? $inputFile : -1;
      } elseif ($delFile == 1) {
        $resDel = mysql_query("SELECT file FROM news WHERE `id`='$currid'");
        if ($resDel) { $rowDel = mysql_fetch_object($resDel); $fileName = '../images/'.$rowDel->file;}
        $inputFile = ( (!$resDel) OR (!file_exists($fileName)) OR unlink($fileName) ) ? "" : -1;
      }
      if ($inputFile == -1) { $resedit = mysql_query("UPDATE  news SET data='$inpDate', dataend='$inpDateE', descr='$inpDescr', head='$inpHead', text='$inpText', main='$checkMain' WHERE `id`='$currid'"); }
        else { $resedit = mysql_query("UPDATE  news SET data='$inpDate', dataend='$inpDateE', descr='$inpDescr', head='$inpHead', text='$inpText', file='$inputFile', main='$checkMain' WHERE `id`='$currid'"); }
      header("Location: news.php");
		}
		break ;
	case (3) :
		// Del news full
		$resDel = mysql_query("SELECT file FROM news WHERE `Id`='$currid'");
    if ($resDel) {
      $rowDel = mysql_fetch_object($resDel);
      if ($rowDel->file !== '') {
        $fileName = '../images/'.$rowDel->file;
        if (file_exists($fileName)) unlink($fileName);
      }
		  $resdel = mysql_query("DELETE FROM news WHERE `Id`='$currid'");
      header("Location: news.php");
    }
		break ;
	case (6) :
		// CheckMain
		if ($checkMain=="1"){
			$resedit = mysql_query("UPDATE news SET `Main`=0 WHERE ks='$OWNERKS'");
			$resedit = mysql_query("UPDATE news SET `Main`=1 WHERE `Id`='$currid'");
		}
		else {
			$resedit = mysql_query("UPDATE news SET `Main`=0 WHERE `Id`='$currid'");
		};
		break;
	}

  $addeditdel = 0;
  include ('beg_a.php');
  if ($lentaId==0) {
    $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' ORDER BY main DESC, data DESC") or die(mysql_error());
  } else {
    $result = mysql_query("SELECT * FROM news WHERE ks='$OWNERKS' AND lenta='$lentaId' ORDER BY main DESC, data DESC") or die(mysql_error());
  }
  $num_rows = mysql_num_rows($result);
  $resultList = mysql_query("SELECT * FROM cols WHERE ks='$OWNERKS' ORDER BY DESCR") or die(mysql_error());
?>


<div>
  <!-- Навигация -->
  <ul class="nav nav-tabs" role="tablist" id='myTab'>
    <!--<li><a href="#tlist" aria-controls="tlist" role="tab">Список</a></li>-->
    <li class="dropdown">
              <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown"><?echo $lentaDescr; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                <? while ($row=mysql_fetch_object($resultList)) { ?>
                  <li><a href="#tlist" tabindex="-1" data-toggle="tab" class="lenta" data-id="<?echo $row->id;?>"><?echo $row->descr;?></a></li>
                <? } ?>
                <li><a href="#tlist" tabindex="-1" data-toggle="tab" class="lenta" data-id="0">Список</a></li>
              </ul>
            </li>
    <li <? if ($lentaId==0) echo 'class="disabled"' ?>><a id="add">Додати</a></li>
    <li <? if ($num_rows==0) echo 'class="disabled"' ?>><a id="edit">Редагувати</a></li>
    <li <? if ($num_rows==0) echo 'class="disabled"' ?>><a id="del">Видалити</a></li>
    <li><a href="#thelp" data-toggle="tab">Допомога</a></li>
  </ul>
  <!-- Содержимое вкладок -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane" id="tlist"><? include('news_list.php') ?></div>
    <div role="tabpanel" class="tab-pane" id="tadd">...</div>
    <div role="tabpanel" class="tab-pane" id="tedit">...</div>
    <div role="tabpanel" class="tab-pane" id="tdel">...</div>
    <div role="tabpanel" class="tab-pane" id="thelp"><? include('news_help.php') ?></div>
  </div>
</div>

<!-- Диалоговое окно редактирования -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm" style="width:70%">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" id="crossclose" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h4 id="myModalLabel">Новина</h4>
	</div>
<div class="modal-body">
<form enctype="multipart/form-data" name="form" class="form-horizontal" role="form" action="" method="post">
  <input type="hidden" name="currid" id="currid" value="0">
  <input type="hidden" name="addeditdel" id="addeditdel" value="0">
  <input type="hidden" name="checkMain" id="checkMain" value="0">
  <input type="hidden" name="delFile" id="delFile" value="0">

  <div class="form-group">  <!-- -->
    <label for="inputDate" class="col-sm-2 control-label">Дата публікації</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputDate" name="inputDate" placeholder="Дата" style="width: 100%" required>
    </div>
    <label for="inputDescr" class="col-sm-1 control-label">Опис</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputDescr" name="inputDescr" placeholder="Опис" style="width: 100%" required>
    </div>
  </div>
  <div class="form-group">  <!-- -->
    <label for="inputDateE" class="col-sm-2 control-label">Закрити публікацію</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="inputDateE" name="inputDateE" placeholder="Дата" style="width: 100%" required>
    </div>
    <label for="inputHead" class="col-sm-1 control-label">Заголовок</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" id="inputHead" name="inputHead" placeholder="Заголовок" style="width: 100%" required>
    </div>

  </div>
  <div class="form-group"> <!-- -->
    <label for="inputFile" class="col-sm-2 control-label">Готовий документ</label>
    <div class="col-sm-7" id="manFile">
      <!--Вставляется JS -->
    </div>
    <div class="col-sm-3">
      <div class="checkbox text-right">
        <label><input type="checkbox" value="" id="checkFlag" name="checkFlag">Головна новина</label>
      </div>
    </div>
  </div>
  <textarea id="inputText" name="inputText"></textarea>

  <div class="modal-footer">
    <button type="button" class="btn btn-primary" id="btnsave">Прийняти</button>
    <button type="button" class="btn btn-default" id="btnclose" data-dismiss="modal" aria-hidden="true">Відмова</button>
  </div>
</form>
</div>
</div>
</div>
</div>

<!--Конец-->
<? include ('end.php'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
  CKEDITOR.editorConfig = function( config ) {
    CKEDITOR.config.startupMode = 'source';             // не работает !!!
  };
  CKEDITOR.config.allowedContent = true;                // Сохраняем
  CKEDITOR.config.extraAllowedContent = 'span{class}';  // дополнительный HTML код
  //CKEDITOR.config.extraPlugins = 'SimpleLink';			// Подключаем плагин ссылок
  CKEDITOR.replace( 'inputText' );

  //Плагин Даты
  $.datepicker.setDefaults($.extend($.datepicker.regional["ru"]));
	$('#inputDate').datepicker({ dateFormat: "yy-mm-dd", firstDay: "1",
      monthNames : {0:"Січень",1:"Лютий",2:"Березень",3:"Квітень",4:"Травень",5:"Червень",6:"Липень",7:"Серпень",8:"Вересень",9:"Жовтень",10:"Листопад",11:"Грудень"},
	    dayNamesMin : {0:"Нд",1:"Пн",2:"Вт",3:"Ср",4:"Чт",5:"Пт",6:"Сб"}
  });
  $('#inputDateE').datepicker({ dateFormat: "yy-mm-dd", firstDay: "1",
      monthNames : {0:"Січень",1:"Лютий",2:"Березень",3:"Квітень",4:"Травень",5:"Червень",6:"Липень",7:"Серпень",8:"Вересень",9:"Жовтень",10:"Листопад",11:"Грудень"},
	    dayNamesMin : {0:"Нд",1:"Пн",2:"Вт",3:"Ср",4:"Чт",5:"Пт",6:"Сб"}
  });
  //Показываем первую вкладку, Инициализируем, Позиционируем на первую строчку
  $('[href="#tlist"]').tab('show');
  var table = $('#example').DataTable({
    "iDisplayLength": 17,
      "aLengthMenu": [10, 17, 25, 50, 100],
    "paging":   true,
    "ordering": true,
    "info":     true,
    "order": [[ 1, "desc" ]],
    "select": 'single',
    "sPaginationType": "numbers",
    "columns": [
      { "width": "5%" },
      { "width": "5%" },
      { "width": "5%" },
      { "width": "5%" },
      null,
      { "width": "15%" },
      { "width": "5%" },
    ],
    "language": {
      "search": "Пошук:",
      "select": {
              rows: {
                  _: "Selected %d rows",
                  1: ""
              }
          },		
      "paginate": {
        "first":      "First",
        "last":       "Last",
        "next":       "Слідуюча",
        "previous":   "Попередня"
      },
      "lengthMenu": "Показувати _MENU_ рядків на сторінці",
      "zeroRecords": "Nothing found - sorry",
      "info": "",
      "infoEmpty": "No records available",
      "infoFiltered": "(filtered from _MAX_ total records)"
      }	
    });
  table.row(':eq(0)', { page: 'current' }).select(); // Позиционируемся на первую строчку

  function get_cookie ( cookie_name )
  {
    var results = document.cookie.match ( '(^|;) ?' + cookie_name + '=([^;]*)(;|$)' );
    if ( results ) {return ( unescape ( results[2] ) );} else {return null;}
  }
  //Пометка файла на удаление файла
  $("body").on("click", "#deleteFile", function () {
    $(this).toggleClass('btn-default');
    $(this).toggleClass('btn-danger');
    if ($(this).hasClass('btn-danger')) {  $(this).html('<span class="glyphicon glyphicon-ok"></span> Видалити');}
      else { $(this).html('Видалити'); }
	});

  // Скачивание файла
  $("body").on("click", "#downloadFile", function (e) {
    var row = table.rows( { selected: true } );
      $.post("getdata.php",
          {name: "NewsForId",id: row.data()[0][0]},
          function(data){
            var obj = JSON.parse(data);
           e.preventDefault();
           window.open("../images/"+obj.file);
          })
           
  });



  //Отработка вкладок (пока не юзаем)
  $("#myTab a").click(function(e){
    e.preventDefault();
    console.log($(this).html());
    if ($(this).html()=='Допомога') $(this).tab('show');
  });
  //Отработка списка (пока не юзаем)
  $('#example tbody').on('click', 'tr', function () {
    var data = table.row( this ).data();
    //alert( 'You clicked on '+data[0]+'\'s row' );
  });
  //Переключение ленты
  $('.lenta').on("click",function(){
    $("#myTabDrop1").html($(this).html()+' <b class="caret"></b>');
    $.cookie('lentaId',$(this).data('id'));
    console.log('COOKIE: lentaId = '+$.cookie('lentaId'));
    $('#addeditdel').val(0);
    $('#currid').val(0);
    document.form.submit();
  });

  //Form Add
	$('#add').on("click",function(){
    var lentaId = get_cookie('lentaId')
    if (!(lentaId==null || lentaId==0)) {
      $('#addeditdel').val(1);
      $('#currid').val(0);
      var date = new Date();
      $('#inputDate').datepicker( "setDate", date.getFullYear() + '-' + ('0' + (date.getMonth() + 1)).slice(-2) + '-' + ('0' + date.getDate()).slice(-2) );
      $('#inputDescr').val("");
      $('.checkFlag').attr('checked', false);
      $("#manFile").empty();
      $('<span class="btn btn-success btn-file" id="selectFile"><input type="file" name="inputFile" id="inputFile" /></span>').appendTo('#manFile');
		  $('#myModal').modal("show");
    }
  });

  //Form Activate
  $('#myModal').on('shown.bs.modal', function () {
    $('#inputDescr').focus()
  })

  //Form Save
  $('#btnsave').on('click', function () {
    if (document.form.inputDescr.value == "") {document.form.inputDescr.focus(); return false; }
    if (document.form.inputDate.value == "") {document.form.inputDate.focus(); return false; }
    document.form.delFile.value = ($('#deleteFile').hasClass('btn-danger')) ? 1 : 0 ;  // Удаление файла
    document.form.checkMain.value = ($('#checkFlag').is(":checked")) ? 1 : 0; // Головна новина
    console.log('SAVE');
    var fileAdd = "";
    if ( (document.form.inputFile != undefined) && (document.form.inputFile.files.length !=0) ) {
      var fileAdd = document.form.inputFile.files[0].name;
    }
    if (fileAdd == "") {
      document.form.submit();
    } else {
      $.ajax({
        type: "POST",
        url: 'getdata.php',
        data: "name=ExistFile&file="+fileAdd,
        async: false,
        success: function(data){
          if (data=='1') {
            alert('Файл з ім`ям '+fileAdd+' вже існує в базі новин !');
          } else {
            document.form.submit();
          }
        }
      });
    }
  })

  //Form Edit
  $('#edit').on("click",function(){
    var row = table.rows( { selected: true } );
    if (row.count() == 1) {
      $('#addeditdel').val(2);
      $('#currid').val(row.data()[0][0]);
      $('#inputDate').datepicker( "setDate", row.data()[0][1] );
      $('#inputDateE').val(row.data()[0][2]);
      $('#inputDescr').val(row.data()[0][4]);
      $('#inputHead').val(row.data()[0][5]);
      $("#manFile").empty();
      //
      $.post("getdata.php",
          {name: "NewsForId",id: row.data()[0][0]},
          function(data, status){
            //alert("Data: " + data + "\nStatus: " + status);
            var obj = JSON.parse(data);
            $('#checkFlag').attr('checked', (obj.main==1));
            $('#inputText').val(obj.text);
            CKEDITOR.instances['inputText'].setData(obj.text);
            // Check the active editing mode.
            if (CKEDITOR.instances['inputText'].mode == 'wysiwyg') {
                CKEDITOR.instances['inputText'].insertHtml(obj.text);
            } else {
                CKEDITOR.instances['inputText'].setMode('wysiwyg', function() {
                  CKEDITOR.instances['inputText'].insertHtml(value);
                  CKEDITOR.instances['inputText'].setMode('source');
                });
            }
            if (obj.file=='') {
              $('<span class="btn btn-success btn-file" id="selectFile"><input type="file" name="inputFile" id="inputFile" /></span>').appendTo('#manFile');
            } else {
              console.log('deleteFile.appendTo');
            $('<div class="btn-group">'+
                '<button type="button" class="btn btn-default disabled" id="loadFile">'+obj.file+'</button>'+
                '<button type="button" class="btn btn-default" id="deleteFile">Видалити</button>'+
                '<button type="button" class="btn btn-default" id="downloadFile">Завантажити</button></div>').appendTo('#manFile');               
            }
          }
      );
		  $('#myModal').modal("show");
    }
  });

  //Form Del
	$('#del').on("click",function(){
    var row = table.rows( { selected: true } );
    if ( (row.count() == 1) && (confirm("Видалити "+row.data()[0][2]+" ?")) ) {
      $('#addeditdel').val(3);
      $('#currid').val(row.data()[0][0]);
      document.form.submit();
    }
	});

	//Close	modal
	$('#btnclose').on("click",function(){
		document.form.addeditdel.value = 0;
		});
	$('#crossclose').on("click",function(){
		document.form.addeditdel.value = 0;
		});
});
</script>
