
<form method="POST" accept-charset="utf-8">
	<div class="form-group">
        <label for="name">Work name:</label>
        <input type="text" class="form-control" name="name">
    </div>

    <div class="form-group">
        <label for="starting_date">Starting date: </label>
        <input type="date" name="starting_date" id="starting_date" class="form-control" required="true">
    </div>

    <div class="form-group">
        <label for="ending_date">Ending date: </label>
        <input type="date" name="ending_date" id="ending_date" class="form-control" required="true">
    </div>
	Status: <select name="status" class="form-control" required="true">
		<option value="1">Planning</option>
		<option value="2">Doing</option>
		<option value="3">Complete</option>
	</select>
	<button type="submit" name="submit" class="btn btn-primary">Add</button>
</form>
