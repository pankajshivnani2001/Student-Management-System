
/* function to delete a row with the given ID from the table.
   using a simple AJAX call when the user confirms the deletion process
   reload the page once the deletion is complete
*/
function deleteRow(id)
{
	var confirmation = confirm("Are you sure you want to delete this row?");
	if(confirmation)
	{
		$.post("http://localhost/PHP-task/assets/AJAX/deleteStudentRecord.php", {studentId : id}, function(data)
		{
			location.reload();
		});
	}
}


//function to take the user to the update handler page. Passing student ID via URL which can be accessed using GET
function openUpdatePage(id)
{
	window.open("updateHandler.php?studentId="+id, "_self");
}