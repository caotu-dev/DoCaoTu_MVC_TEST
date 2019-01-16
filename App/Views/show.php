
<div class="container">
  <h2>Work list</h2>
  <p>View list of work</p>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Starting date</th>
        <th>Working date</th>
        <th>Status</th>
        <th>Function</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($items)) {
		      foreach ($items as $item) {?>
		      <tr>
		        <td><?php echo $item['name']; ?></td>
		        <td><?php echo $item['starting_date']; ?></td>
		        <td><?php echo $item['ending_date']; ?></td>
		        <td><?php echo $item['status']; ?></td>
		        <td>
		        	<a href="?page=work&&action=edit&&id=<?php echo $item['id']; ?>" title="">edit</a>
		        	<a href="?page=work&&action=delete&&id=<?php echo $item['id']; ?>" title="">delete</a>
		        </td>
		      </tr>
      <?php } } ?>
    </tbody>
  </table>
</div>