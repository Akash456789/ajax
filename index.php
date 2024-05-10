<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="myForm" method="post" enctype="multipart/form-data"> 
        Name : <input type="text" name="name"/><br/><br/>
        Email : <input type="text" name="email"/><br/><br/>
        Password : <input type="text" name="pass"/><br/><br/>
        Photo : <input type="file" name="photo"/><br/><br/>
        State : <select name="city">
            <option>Delhi</option>
            <option>Meerut</option>
            <option>Mumbai</option>
        </select><br><br>

        Gender: <input type="radio" name="gen" value="male"/>Male 
                <input type="radio" name="gen" value="female"/>Female <br><br>

        Language: <input type="checkbox" name="language[]" value="Hindi"/>Hindi
                <input type="checkbox" name="language[]" value="English"/>English
                <input type="checkbox" name="language[]" value="American"/>American
                <br><br>

        <button type="button" name="submit">Submit</button> 
        <a href="#" id="showData">show data</a>
    </form>

    <!-- Modal for update -->
    <div id="updateModal" style="display: none;">
        <input type="hidden" id="updateId" />
        Name : <input type="text" id="updateName"/><br/><br/>
        Email : <input type="text" id="updateEmail"/><br/><br/>
        Password : <input type="text" id="updatePass"/><br/><br/>
        <button id="updateBtn">Update</button>
    </div>

    <script>
        $(document).ready(function(){
            $('button[name="submit"]').on('click', function(){
                var form_data = new FormData($('#myForm')[0]);

                $.ajax({
                    url: "save.php",
                    type: "POST",
                    data: form_data,
                    contentType: false,
                    processData: false,
                    success: function(dataresult) {
                        alert(dataresult); 
                    },
                    error: function() {
                        alert("Error occurred while saving data.");
                    }
                });
            });

            // AJAX call to fetch data when clicking on "show data" link
            $('#showData').on('click', function(e){
                e.preventDefault(); // Prevent default action of link
                fetchData();
            });

            // Function to fetch data
            function fetchData() {
                $.ajax({
                    url: "fetch.php",
                    type: "GET",
                    success: function(data) {
                        $('#dataContainer').html(data); // Display fetched data in container
                    },
                    error: function() {
                        alert("Error occurred while fetching data.");
                    }
                });
            }

            // Handle update button click
            $(document).on('click', '.update-btn', function() {
                var id = $(this).data('id');
                var name = $(this).closest('tr').find('td:eq(0)').text();
                var email = $(this).closest('tr').find('td:eq(1)').text();
                var pass = $(this).closest('tr').find('td:eq(2)').text();
                
                $('#updateId').val(id);
                $('#updateName').val(name);
                $('#updateEmail').val(email);
                $('#updatePass').val(pass);
                
                $('#updateModal').show();
            });

            // Handle update button in modal click
            $('#updateBtn').on('click', function() {
                var id = $('#updateId').val();
                var name = $('#updateName').val();
                var email = $('#updateEmail').val();
                var pass = $('#updatePass').val();
                
                $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: { id: id, name: name, email: email, pass: pass },
                    success: function(dataresult) {
                        alert(dataresult);
                        $('#updateModal').hide();
                        fetchData(); // Reload the data after updating
                    },
                    error: function() {
                        alert("Error occurred while updating data.");
                    }
                });
            });

            // Handle delete button click
            $(document).on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                
                $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: { id: id },
                    success: function(dataresult) {
                        alert(dataresult);
                        fetchData(); // Reload the data after deleting
                    },
                    error: function() {
                        alert("Error occurred while deleting data.");
                    }
                });
            });
        });
    </script>
    <div id="dataContainer"></div>
</body>
</html>
