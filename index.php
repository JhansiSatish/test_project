<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>


    <!-- Modal -->
    <div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModa" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="completename">Name</label>
                        <input type="email" class="form-control" id="completename" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="completeemail">Email</label>
                        <input type="email" class="form-control" id="completeemail" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label for="completemobile">Mobile</label>
                        <input type="email" class="form-control" id="completemobile" placeholder="Enter Your Mobile Number">
                    </div>
                    <div class="form-group">
                        <label for="completeplace">Place</label>
                        <input type="email" class="form-control" id="completePlace" placeholder="Enter Your Place">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="adduser()">Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModa" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="updatename">Name</label>
                        <input type="email" class="form-control" id="updatename" placeholder="Enter Your Name">
                    </div>
                    <div class="form-group">
                        <label for="updateemail">Email</label>
                        <input type="email" class="form-control" id="updateemail" placeholder="Enter Your Email">
                    </div>
                    <div class="form-group">
                        <label for="updatemobile">Mobile</label>
                        <input type="email" class="form-control" id="updatemobile" placeholder="Enter Your Mobile Number">
                    </div>
                    <div class="form-group">
                        <label for="updatePlace">Place</label>
                        <input type="email" class="form-control" id="updatePlace" placeholder="Enter Your Place">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" onclick="updateuser()">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="hidden" id="hiddenid">
                </div>
            </div>
        </div>
    </div>
    <div class="continer">
        <h2 class="text-center"> PHP CRUD USING AJAX</h2>
        <button type="button" class="btn btn-primary my-3" data-toggle="modal" data-target="#completeModal">
            Add User New
        </button>
        <div id="displayDataTable"> </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            displayData();
        });

        function displayData() {
            var displayData = "true";
            $.ajax({
                url: " display.php",
                type: 'POST',
                data: {
                    displaySend: displayData
                },
                success: function(data, status) {
                    $('#displayDataTable').html(data)
                }
            })
        }

        function adduser() {

            var nameAdd = $('#completename').val();
            var emailAdd = $('#completeemail').val();
            var mobileAdd = $('#completemobile').val();
            var placeAdd = $('#completePlace').val();

            $.ajax({
                url: "insert.php",
                type: "POST",
                data: {
                    nameSend: nameAdd,
                    emailSend: emailAdd,
                    mobileSend: mobileAdd,
                    placeSend: placeAdd,
                },
                success: function(data, status) {

                    console.log(status);
                    $('#completeModal').modal('hide');
                    displayData();


                }

            })

        }

        function deleteUser(deleteid) {
            $.ajax({
                url: "delete.php",
                type: 'POSt',
                data: {
                    deleteSend: deleteid
                },
                success: function(data, status) {
                    displayData();
                }
            })
        }

        function updateUser(updateid) {
            $('#hiddenid').val("updateid");
            $.post("update.php", {
                updateid: updateid
            }, function(data, status) {
                var userid = JSON.parse(data);
                $('#updatename').val(userid.name);
                $('#updateemail').val(userid.email);
                $('#updatemobile').val(userid.mobile);
                $('#updatePlace').val(userid.place);


            });

            $('#updateModal').modal("show");


        }

        function updateuser() {
            var updatename = $('#updatename').val();
            var updateemail = $('#updateemail').val();
            var updatemobile = $('#updatemobile').val();
            var updatePlace = $('#updatePlce').val();
            var hiddendata = $('#hiddendata').val();
            $.post("update.php", {
                updatename: updatename,
                updateemail: updateemail,
                updatemobile: updatemobile,
                updatePlace: updatePlace,
                hiddendata: hiddendata






            }, function(data, status) {
                $('#updateModal').modal('hide');
                displayData();


            });


        }
    </script>
</body>

</html>