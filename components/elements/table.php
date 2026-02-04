<?php
  // Default table data if not provided
  if (!isset($table_title)) {
    $table_title = 'Table Title';
  }

  if (!isset($table_headers)) {
    $table_headers = ['Column 1', 'Column 2', 'Column 3', 'Column 4', 'Column 5'];
  }

  if (!isset($table_rows)) {
    $table_rows = [
      ['Row 1 Col 1', 'Row 1 Col 2', 'Row 1 Col 3', 'Row 1 Col 4', 'Row 1 Col 5'],
      ['Row 2 Col 1', 'Row 2 Col 2', 'Row 2 Col 3', 'Row 2 Col 4', 'Row 2 Col 5'],
      ['Row 3 Col 1', 'Row 3 Col 2', 'Row 3 Col 3', 'Row 3 Col 4', 'Row 3 Col 5'],
      ['Row 4 Col 1', 'Row 4 Col 2', 'Row 4 Col 3', 'Row 4 Col 4', 'Row 4 Col 5'],
    ];
  }
?>

<link rel="stylesheet" href="../assets/css/components-table.css" />

<div class="table-component">
  <h3 class="title title--h3 table-component__title"><?php echo htmlspecialchars($table_title); ?></h3>
  <div class="table-component__divider"></div>
  <div class="table-component__wrapper">
    <table class="table-component__table">
      <thead class="table__header">
        <tr>
          <?php foreach ($table_headers as $header) : ?>
            <th><?php echo htmlspecialchars($header); ?></th>
          <?php endforeach; ?>
        </tr>
      </thead>
      <tbody class="table__body">
        <?php foreach ($table_rows as $row) : ?>
          <tr>
            <?php foreach ($row as $cell) : ?>
              <td><?php echo htmlspecialchars($cell); ?></td>
            <?php endforeach; ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>