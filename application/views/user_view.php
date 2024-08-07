<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX CRUD OPERATION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="navbar bg-dark text-white d-flex justify-content-center p-3">
        <h4>Crud Application</h4>
    </div>
    <div class="container-fluid my-3">
        <div>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Add New Users
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                            <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                                    placeholder="Enter Your email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" maxlength="10" class="form-control" id="phone"
                                    placeholder="Enter Your Phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter Your Address">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btnsave">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="user_edit" id="user_edit" class="form-control">
                            <div class="form-group">
                                <label for="name_edit">Name</label>
                                <input type="text" class="form-control" id="name_edit" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="email_edit">Email address</label>
                                <input type="email" class="form-control" id="email_edit" aria-describedby="emailHelp"
                                    placeholder="Enter Your email">
                            </div>
                            <div class="form-group">
                                <label for="phone_edit">Phone</label>
                                <input type="text" class="form-control" id="phone_edit" placeholder="Enter Your Phone">
                            </div>
                            <div class="form-group">
                                <label for="address_edit">Address</label>
                                <input type="text" class="form-control" id="address_edit"
                                    placeholder="Enter Your Address">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="btn_update">Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Users</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <strong>Are You Sure to delete this User</strong>
                            <input type="hidden" name="id_delete" id="id_delete" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" id="btn_delete">Confirm to Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="mt-4">
            <table class="table table-sriped" id="userTable">
                <thead class="thead-dark ">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            show_user();


            function show_user() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo site_url('user/user_data') ?>",
                    dataType: "JSON",
                    success: function (data) {
                        var html = '';
                        for (var i = 0; i < data.length; i++) {
                            html += '<tr>' +
                                '<td>' + data[i].id + '</td>' +
                                '<td>' + data[i].name + '</td>' +
                                '<td>' + data[i].email + '</td>' +
                                '<td>' + data[i].phone + '</td>' +
                                '<td>' + data[i].address + '</td>' +
                                '<td>' +
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-user-id="' + data[i].id + '" data-name="' + data[i].name + '" data-email="' + data[i].email + '" data-phone="' + data[i].phone + '" data-address="' + data[i].address + '">Edit</a> ' +
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-user-id="' + data[i].id + '">Delete</a>' +
                                '</td>' +
                                '</tr>';
                        }
                        $('#show_data').html(html);
                    }
                });
            }


            $('#btnsave').on('click', function () {
                var user_name = $.trim($('#name').val());
                var user_email = $.trim($('#email').val());
                var user_phone = $.trim($('#phone').val());
                var user_address = $.trim($('#address').val());

                if (user_name !== '' && user_email !== '' && user_phone !== '' && user_address !== '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('user/save'); ?>",
                        data: {
                            name: user_name,
                            email: user_email,
                            phone: user_phone,
                            address: user_address
                        },
                        success: function (data) {
                            data = JSON.parse(data)
                            if (data.status == "success") {
                                alert("User Details Inserted Successfully")
                            }
                            $('#name').val("");
                            $('#email').val("");
                            $('#phone').val("");
                            $('#address').val("");
                            $('#exampleModal').modal('hide');
                            window.location.reload();

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("An error occurred while saving data: " + textStatus + " " + errorThrown);
                        }
                    });
                } else {
                    alert("Please enter data in all the fields");
                }
            });


            $('#show_data').on('click', '.item_edit', function () {
                var user_id = $(this).data('user-id');
                var user_name = $(this).data('name');
                var user_email = $(this).data('email');
                var user_phone = $(this).data('phone');
                var user_address = $(this).data('address');

                $('#exampleModal11').modal('show');
                $('#user_edit').val(user_id);
                $('#name_edit').val(user_name);
                $('#email_edit').val(user_email);
                $('#phone_edit').val(user_phone);
                $('#address_edit').val(user_address);
            });

            $('#btn_update').on('click', function () {
                var user_id = $('#user_edit').val();
                var user_name = $('#name_edit').val();
                var user_email = $('#email_edit').val();
                var user_phone = $('#phone_edit').val();
                var user_address = $('#address_edit').val();

                if (user_name !== '' && user_email !== '' && user_phone !== '' && user_address !== '') {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('user/update') ?>",
                        data: {
                            id: user_id,
                            name: user_name,
                            email: user_email,
                            phone: user_phone,
                            address: user_address
                        },
                        dataType: "JSON",
                        success: function (data) {
                            $('#user_edit').val("");
                            $('#name_edit').val("");
                            $('#email_edit').val("");
                            $('#phone_edit').val("");
                            $('#address_edit').val("");
                            $('#exampleModal11').modal('hide');
                            show_user();
                        }
                    });
                } else {
                    alert("Please enter all data");
                }
            });

            $('#show_data').on('click', '.item_delete', function () {
                var user_id = $(this).data('user-id');
                $('#exampleModal12').modal('show');
                $('#id_delete').val(user_id);
            });

            $('#btn_delete').on('click', function () {
                var id = $('#id_delete').val();

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('user/delete') ?>",
                    dataType: "JSON",
                    data: { id: id },
                    success: function (data) {
                        $('#exampleModal12').modal('hide');
                        show_user();
                    }
                });
                return false;
            });

        });
    </script>

</body>

</html>