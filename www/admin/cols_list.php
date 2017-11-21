<div class="modal-body">
  <table id="example" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Id</th>
        <th>Найменування</th>
      </tr>
    </thead>
    <tbody>
      <? while ($row=mysql_fetch_object($result)) { ?>

      <tr newsid="<? echo $row->newsid; ?>">
      <td><? echo $row->id; ?></td>
      <td><? echo $row->descr; ?></td>
      </tr>
      <? } ?>

    </tbody>
  </table>
</div>
