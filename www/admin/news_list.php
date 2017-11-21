<div class="modal-body">
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Id</th>
        <th>Дата публікації</th>
        <th>Дата закінчення</th>
        <th>Головна</th>
        <th>Опис</th>
        <th>Заголовок</th>
        <th>Готовий файл</th>
      </tr>
    </thead>
    <tbody>
      <? while ($row=mysql_fetch_object($result)) { ?>

      <tr>
      <td><? echo $row->id; ?></td>
      <td><? echo $row->data; ?></td>
      <td><? echo $row->dataend; ?></td>
      <td><? echo ($row->main==0) ? '' : '<span class="glyphicon glyphicon-ok"></span>'; ?></td>
      <td><? echo $row->descr; ?></td>
      <td><? echo $row->head; ?></td>
      <td><? echo $row->file; ?></td>
      </tr>
      <? } ?>

    </tbody>
  </table>
</div>
