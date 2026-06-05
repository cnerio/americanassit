<?php
require APPROOT . '/views/inc/header.php';
$id_user = $_SESSION['user_id'] ?? 0;
$sessionUserId = $_SESSION['user_id'] ?? 0;
$initialUsers = isset($data['users']) && is_array($data['users']) ? $data['users'] : [];
?>
<script src="https://cdn.tailwindcss.com"></script>
<style>
    input.error,
    select.error {
        background: #fef2f2;
        border: 1px solid #fca5a5;
        color: #7f1d1d;
    }

    label.error {
        color: #b91c1c;
        display: inline-block;
        font-size: 12px;
        margin-top: 6px;
    }

    .admin-input {
        width: 100%;
        border: 1px solid #cbd5e1;
        border-radius: 0.5rem;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        color: #0f172a;
        background: #fff;
    }

    .admin-input:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(125, 211, 252, 0.3);
        outline: none;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        border-radius: 9999px;
        padding: 2px 10px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active {
        background: #dcfce7;
        color: #166534;
    }

    .status-inactive {
        background: #fee2e2;
        color: #991b1b;
    }
</style>

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 w-full max-w-[95%] items-center justify-between">
        <a href="<?php echo URLROOT; ?>/records/index" class="flex items-center gap-3" aria-label="American Assist Users Home">
            <img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-11 w-auto">
            <span class="hidden text-sm font-semibold tracking-wide text-slate-700 sm:inline"><< Records Dashboard</span>
        </a>

        <a
            href="<?php echo URLROOT; ?>/users/logout"
            class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300"
        >
            Logout
        </a>
    </div>
</header>

<section class="relative mt-20 min-h-screen bg-slate-50 py-10">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -top-24 right-4 h-72 w-72 rounded-full bg-cyan-200/50 blur-3xl"></div>
        <div class="absolute bottom-0 left-4 h-72 w-72 rounded-full bg-blue-200/40 blur-3xl"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[95%]">
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <h2 class="text-xl font-bold text-slate-900">Users</h2>
                        <p class="text-sm text-slate-500">Manage staff access and permissions</p>
                    </div>

                    <button type="button" id="adduser" data-bs-toggle="modal" data-bs-target="#ModalAddUsers" data-toggle="modal" data-target="#ModalAddUsers" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        <i class="fa fa-user-plus mr-2"></i> Add User
                    </button>
                </div>
            </div>

            <div class="p-5 sm:p-6">
                <div id="records_content" class="overflow-x-auto rounded-xl border border-slate-200 bg-white">
                    <table class="min-w-full divide-y divide-slate-200 text-sm" style="font-size:12px">
                        <thead class="bg-slate-100 text-slate-700">
                            <tr>
                                <th class="px-3 py-3 text-left font-semibold" width="30">#</th>
                                <th class="px-3 py-3 text-left font-semibold">User Name</th>
                                <th class="px-3 py-3 text-left font-semibold">Email</th>
                                <th class="px-3 py-3 text-left font-semibold">Rol</th>
                                <th class="px-3 py-3 text-left font-semibold">Status</th>
                                <th class="px-3 py-3 text-right font-semibold">Actions</th>
                            </tr>
                            <tr class="bg-white">
                                <td class="px-2 py-2">
                                    <input type="hidden" id="user_id" value="<?php echo (int)$sessionUserId; ?>">
                                </td>
                                <td class="px-2 py-2"><input id="name" type="text" class="admin-input grid-filter" placeholder="Name"></td>
                                <td class="px-2 py-2"><input id="email" type="text" class="admin-input grid-filter" placeholder="Email"></td>
                                <td class="px-2 py-2">
                                    <select id="rol" type="text" class="admin-input grid-filter">
                                        <option value="">All roles</option>
                                        <option value="00">Regular User</option>
                                        <option value="1">Admin User</option>
                                    </select>
                                </td>
                                <td class="px-2 py-2">
                                    <select id="active" type="text" class="admin-input grid-filter">
                                        <option value="">All statuses</option>
                                        <option value="00">Inactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                </td>
                                <td class="px-2 py-2 text-right">
                                    <button class="inline-flex items-center rounded-lg border border-red-300 px-3 py-2 text-xs font-semibold text-red-700 transition hover:bg-red-50" type="button" id="clean">
                                        <i class="fa fa-filter mr-1"></i> Clear
                                    </button>
                                </td>
                            </tr>
                        </thead>
                        <tbody id="gridBody" class="divide-y divide-slate-100 bg-white text-slate-700">
                            <?php if(empty($initialUsers)): ?>
                                <tr>
                                    <td colspan="6" class="px-3 py-4 text-center text-slate-500">No records found</td>
                                </tr>
                            <?php else: ?>
                                <?php $rowNum = 1; ?>
                                <?php foreach($initialUsers as $u): ?>
                                    <tr class="hover:bg-slate-50">
                                        <td class="px-3 py-2"><?php echo $rowNum++; ?></td>
                                        <td class="px-3 py-2"><?php echo htmlspecialchars($u['name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="px-3 py-2"><?php echo htmlspecialchars($u['email'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td class="px-3 py-2"><?php echo ((int)($u['rol'] ?? 0) === 1) ? 'Admin User' : 'Regular User'; ?></td>
                                        <td class="px-3 py-2">
                                            <?php if((int)($u['active'] ?? 0) === 1): ?>
                                                <span class="status-badge status-active">Active</span>
                                            <?php else: ?>
                                                <span class="status-badge status-inactive">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-3 py-2 text-right">
                                            <div class="inline-flex items-center gap-2">
                                                <button class="inline-flex items-center rounded-lg border border-slate-300 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-100 editUser" data-user="<?php echo (int)($u['id'] ?? 0); ?>" data-bs-toggle="modal" data-bs-target="#EditUserModal"><i class="fa fa-pencil mr-1"></i>Edit</button>
                                                <button data-user="<?php echo (int)($u['id'] ?? 0); ?>" data-bs-toggle="modal" data-bs-target="#DeleteUsersModal" class="inline-flex items-center rounded-lg border border-rose-300 px-2.5 py-1.5 text-xs font-semibold text-rose-700 transition hover:bg-rose-50 deleteUser" type="button"><i class="fa fa-close mr-1"></i>Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="flex flex-wrap items-center justify-between gap-3 border-t border-slate-200 px-4 py-3">
                        <div id="toShow" class="text-sm text-slate-600"><?php echo !empty($initialUsers) ? 'Showing 1 to ' . count($initialUsers) . ' of ' . count($initialUsers) : ''; ?></div>
                        <nav id="pagination" class="pagination-wrap"></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade admin-modal" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="EditUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-b border-slate-200">
                    <h5 class="modal-title text-lg font-semibold text-slate-900" id="EditUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="formEdit_users">
                    <div class="modal-body space-y-4">
                        <div class="form-group">
                            <label for="editname" class="mb-1 block text-sm font-semibold text-slate-700">Name<sub>*</sub></label>
                            <input type="text" name="editname" id="editname" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="editemail" class="mb-1 block text-sm font-semibold text-slate-700">Email<sub>*</sub></label>
                            <input type="text" id="editemail" name="editemail" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="editrol" class="mb-1 block text-sm font-semibold text-slate-700">Rol<sub>*</sub></label>
                            <select name="editrol" id="editrol" class="admin-input">
                                <option value="">select..</option>
                                <option value="0">Regular User</option>
                                <option value="1">Admin User</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Reset Password</label>
                            <div class="flex items-center gap-4 text-sm text-slate-700">
                                <label class="inline-flex items-center gap-2">
                                    <input type="radio" name="resetPass" value="N" checked id="radio"> No
                                </label>
                                <label class="inline-flex items-center gap-2">
                                    <input type="radio" name="resetPass" value="Y" id="radio2"> Yes
                                </label>
                            </div>
                        </div>

                        <div id="passArea" style="display: none;">
                            <div class="form-group">
                                <label class="mb-1 mt-3 block text-sm font-semibold text-slate-700">New Password <span class="required">*</span></label>
                                <input type="password" name="editpass" id="editpass" class="admin-input">
                            </div>
                            <div class="form-group">
                                <label for="editconfirmpass" class="mb-1 mt-3 block text-sm font-semibold text-slate-700">Confirm Password<sub>*</sub></label>
                                <input type="password" id="editconfirmpass" name="editconfirmpass" class="admin-input">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-t border-slate-200">
                        <button type="button" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                        <input type="hidden" id="id_user" name="id_user">
                        <input type="hidden" id="acttion" name="acttion" value="editusers">
                        <button type="button" id="updateUser" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">Update</button>
                    </div>
                    <div style="padding: 13px;" id="updateResult"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade admin-modal" id="ModalAddUsers" tabindex="-1" role="dialog" aria-labelledby="ModalAddUsersLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-b border-slate-200">
                    <h5 class="modal-title text-lg font-semibold text-slate-900" id="ModalAddUsersLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <form id="formUserAdd">
                    <div class="modal-body space-y-4">
                        <div class="form-group">
                            <label for="addname" class="mb-1 block text-sm font-semibold text-slate-700">Name<sub>*</sub></label>
                            <input type="text" name="addname" id="addname" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="addemail" class="mb-1 block text-sm font-semibold text-slate-700">Email<sub>*</sub></label>
                            <input type="email" name="addemail" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="addpassword" class="mb-1 block text-sm font-semibold text-slate-700">Password<sub>*</sub></label>
                            <input type="password" id="addpassword" name="addpassword" class="admin-input">
                        </div>

                        <div class="form-group">
                            <label for="addconfirm_password" class="mb-1 block text-sm font-semibold text-slate-700">Confirm Password<sub>*</sub></label>
                            <input type="password" id="addconfirm_password" name="addconfirm_password" class="admin-input">
                        </div>
                        <div class="form-group">
                            <label for="addrol" class="mb-1 block text-sm font-semibold text-slate-700">Rol<sub>*</sub></label>
                            <select name="addrol" id="addrol" class="admin-input">
                                <option value="">select..</option>
                                <option value="0">Regular User</option>
                                <option value="1">Admin User</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer border-t border-slate-200">
                        <button type="button" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                        <input type="hidden" value="ADD" name="action">
                        <button type="button" id="savenew" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">Save</button>
                    </div>
                    <div style="padding: 13px;" id="msjresusersAdd"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade admin-modal" id="DeleteUsersModal" tabindex="-1" role="dialog" aria-labelledby="DeleteUsersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header border-b border-slate-200">
                    <h5 class="modal-title text-lg font-semibold text-slate-900" id="DeleteUsersModalLabel">Delete User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteUsersUp">
                    <div class="modal-body text-sm text-slate-700">
                        Do you want to delete the user <b id="nameDeleteUser"></b>?
                        <input type="hidden" name="idusersDelete" id="idusersDelete">
                        <input type="hidden" name="action" value="deleteuserUp">
                        <input type="hidden" id="idlog" name="idlog" value='<?php echo (int)$id_user; ?>'>
                    </div>
                    <div class="modal-footer border-t border-slate-200">
                        <button type="button" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                        <button type="button" id="deleteok" class="inline-flex items-center rounded-lg bg-rose-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-rose-500">Delete</button>
                    </div>
                    <div style="padding: 13px;" id="msjresusersDelete"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="border-t border-slate-200 bg-white py-5">
    <div class="mx-auto flex w-full max-w-[95%] flex-col items-center justify-between gap-2 text-xs text-slate-500 sm:flex-row">
        <p>&copy; <?php echo date('Y'); ?> American Assist</p>
        <p>Users Management Portal</p>
    </div>
</footer>

<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
<script>
    const urlroot = "<?php echo URLROOT; ?>/users";
    const iduser = "<?php echo (int)$sessionUserId; ?>";

    function showModalById(modalId) {
        var modalEl = document.getElementById(modalId);
        if (!modalEl) {
            return;
        }

        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            if (typeof bootstrap.Modal.getOrCreateInstance === 'function') {
                bootstrap.Modal.getOrCreateInstance(modalEl).show();
            } else {
                (new bootstrap.Modal(modalEl)).show();
            }
            return;
        }

        if (window.jQuery && typeof $(modalEl).modal === 'function') {
            $(modalEl).modal('show');
        }
    }

    function hideModalById(modalId) {
        var modalEl = document.getElementById(modalId);
        if (!modalEl) {
            return;
        }

        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
            if (typeof bootstrap.Modal.getOrCreateInstance === 'function') {
                bootstrap.Modal.getOrCreateInstance(modalEl).hide();
            } else {
                var bsModal = bootstrap.Modal.getInstance ? bootstrap.Modal.getInstance(modalEl) : null;
                if (bsModal) {
                    bsModal.hide();
                } else {
                    $(modalEl).modal('hide');
                }
            }
            return;
        }

        if (window.jQuery && typeof $(modalEl).modal === 'function') {
            $(modalEl).modal('hide');
        }
    }

    function load(page, where = '', example_length, camposAscDesc, firstload = '') {
        $.ajax({
            url: urlroot + '/read',
            type: 'POST',
            data: {
                action: "ajax",
                page: page,
                search: where,
                length: example_length,
                camposAscDesc: camposAscDesc,
                firstload: firstload
            },
            beforeSend: function() {
                $("#gridBody").empty();
                $("#gridBody").html('<tr id="loading"><td colspan="6" align="center"><img src="https://secure-order-forms.com/surgepays/SMSReports/img/Iphone-spinner-2.gif" class="img-fluid m-3" alt=""></td></tr>');
            },
            success: function(data) {
                $("#gridBody").empty();
                const result = document.getElementById('gridBody');
                var resultObj = JSON.parse(data);
                var fields = Array.isArray(resultObj.fields) ? resultObj.fields : [];

                if (fields.length < 1) {
                    result.innerHTML = '<tr><td colspan="6" class="px-3 py-4 text-center text-slate-500">No records found</td></tr>';
                    $("#toShow").html('');
                    $("#pagination").html('');
                    return;
                }

                var row;
                var cell, cell1, cell2, cell3, cell4, cell5;
                var cnum = 0;
                var i = 0;
                var c = 1;

                $.each(fields, function(k, v) {
                    cnum = resultObj.offset + c;
                    row = result.insertRow(i);
                    row.className = 'hover:bg-slate-50';

                    cell = row.insertCell(0);
                    cell1 = row.insertCell(1);
                    cell2 = row.insertCell(2);
                    cell3 = row.insertCell(3);
                    cell4 = row.insertCell(4);
                    cell5 = row.insertCell(5);

                    cell.className = 'px-3 py-2';
                    cell1.className = 'px-3 py-2';
                    cell2.className = 'px-3 py-2';
                    cell3.className = 'px-3 py-2';
                    cell4.className = 'px-3 py-2';
                    cell5.className = 'px-3 py-2 text-right';

                    cell.innerHTML = cnum;
                    cell1.innerHTML = v.name;
                    cell2.innerHTML = v.email;
                    cell3.innerHTML = (v.rol == 1) ? "Admin User" : "Regular User";
                    cell4.innerHTML = (v.active == 1)
                        ? '<span class="status-badge status-active">Active</span>'
                        : '<span class="status-badge status-inactive">Inactive</span>';
                    cell5.innerHTML = '<div class="inline-flex items-center gap-2"><button class="inline-flex items-center rounded-lg border border-slate-300 px-2.5 py-1.5 text-xs font-semibold text-slate-700 transition hover:bg-slate-100 editUser" data-user="' + v.id + '" data-bs-toggle="modal" data-bs-target="#EditUserModal"><i class="fa fa-pencil mr-1"></i>Edit</button><button data-user="' + v.id + '" data-bs-toggle="modal" data-bs-target="#DeleteUsersModal" class="inline-flex items-center rounded-lg border border-rose-300 px-2.5 py-1.5 text-xs font-semibold text-rose-700 transition hover:bg-rose-50 deleteUser" type="button"><i class="fa fa-close mr-1"></i>Delete</button></div>';

                    i++;
                    c++;
                });

                $("#toShow").html('<p>Showing ' + resultObj.offsetToShow + ' to ' + cnum + ' of ' + resultObj.numrows + '</p>');
                $("#pagination").html(resultObj.pagination);

                if (where != "") {
                    document.getElementById("name").value = where[0];
                    document.getElementById("email").value = where[1];
                    document.getElementById("rol").value = where[2];
                    document.getElementById("active").value = where[3];
                }
            }
        });
    }

    function camposValue() {
        var username = $("#name").val();
        var email = $("#email").val();
        var rol = $("#rol option:selected").val();
        var active = $("#active option:selected").val();

        return [
            username,
            email,
            rol,
            active
        ];
    }

    $(".grid-filter").change(function() {
        var myArray = camposValue();
        var camposAscDesc = '';
        var example_length = 10;
        load(1, myArray, example_length, camposAscDesc, '');
    });

    $(document).ready(function() {
        load(1, "", 10, "", "YES");

        $("#adduser").off('click').on('click', function(e) {
            e.preventDefault();
            showModalById('ModalAddUsers');
        });
    });

    $('#gridBody').on('click', '.editUser', function() {
        var userId = $(this).attr('data-user');
        showModalById('EditUserModal');
        $('#updateResult').html('');
        $('input[name="resetPass"][value="N"]').prop('checked', true);
        $('#passArea').hide();

        $.post(urlroot + '/getUser', {
            id: userId
        }, function(response) {
            var resObj = JSON.parse(response);
            $("#editname").val(resObj.name);
            $("#editemail").val(resObj.email);
            $("#editrol").val(resObj.rol);
            $("#id_user").val(resObj.id);
        });
    });

    $("#gridBody").on('click', '.deleteUser', function() {
        var userId = $(this).attr('data-user');
        showModalById('DeleteUsersModal');
        $.post(urlroot + '/getUser', {
            id: userId
        }, function(response) {
            var resObj = JSON.parse(response);
            $("#idusersDelete").val(resObj.id);
            $("#nameDeleteUser").html(resObj.name);
        });
    });

    $("#savenew").on('click', function(e) {
        e.preventDefault();

        if ($('#formUserAdd').valid()) {
            $.ajax({
                url: urlroot + "/adduser",
                type: 'post',
                data: $("#formUserAdd").serialize(),
                success: function(response) {
                    var myObj = JSON.parse(response);
                    if (myObj.status == "success") {
                        $("#msjresusersAdd").html('<div class="alert alert-success" role="alert">' + myObj.msg + '</div>');
                        load(1, "", 10, "", "YES");
                        setTimeout(function() {
                            hideModalById('ModalAddUsers');
                            $('#formUserAdd')[0].reset();
                            var validator = $('#formUserAdd').validate();
                            validator.resetForm();
                            $('#msjresusersAdd').html('');
                        }, 500);
                    } else {
                        $("#msjresusersAdd").html('<div class="alert alert-danger" role="alert">' + myObj.msg + '</div>');
                    }
                }
            });
        }
    });

    $("#updateUser").on('click', function(e) {
        $("#updateResult").html('');
        e.preventDefault();

        if ($('#formEdit_users').valid()) {
            $.ajax({
                url: urlroot + "/updateuser",
                type: 'post',
                data: $("#formEdit_users").serialize(),
                success: function(response) {
                    var myObj = JSON.parse(response);
                    if (myObj.status == "success") {
                        $("#updateResult").html('<div class="alert alert-success" role="alert">' + myObj.msg + '</div>');
                        load(1, "", 10, "", "YES");
                        setTimeout(function() {
                            hideModalById('EditUserModal');
                            $('#formEdit_users')[0].reset();
                            $('input[name="resetPass"][value="N"]').prop('checked', true);
                            $('#passArea').hide();
                            var validator = $('#formEdit_users').validate();
                            validator.resetForm();
                            $('#updateResult').html('');
                        }, 500);
                    } else {
                        $("#updateResult").html('<div class="alert alert-danger" role="alert">' + myObj.msg + '</div>');
                    }
                }
            });
        }
    });

    $("#deleteok").on('click', function() {
        $("#msjresusersDelete").html('');
        var userId = $("#idusersDelete").val();
        $.post(urlroot + '/removeUser', {
            id: userId
        }, function(response) {
            var myObj = JSON.parse(response);
            if (myObj.status == "success") {
                $("#msjresusersDelete").html('<div class="alert alert-success" role="alert">' + myObj.msg + '</div>');
                load(1, "", 10, "", "YES");
            } else {
                $("#msjresusersDelete").html('<div class="alert alert-danger" role="alert">' + myObj.msg + '</div>');
            }
        });
    });

    $('#formUserAdd').validate({
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
        rules: {
            addname: "required",
            addemail: {
                required: true,
                email: true
            },
            addpassword: {
                required: true,
                minlength: 6
            },
            addconfirm_password: {
                required: true,
                minlength: 6,
                equalTo: "#addpassword"
            },
            addrol: "required"
        }
    });

    $('#formEdit_users').validate({
        errorPlacement: function errorPlacement(error, element) {
            element.after(error);
        },
        rules: {
            editname: "required",
            editemail: {
                required: true,
                email: true
            },
            editpass: {
                required: {
                    depends: function() {
                        return $('input[name="resetPass"]:checked').val() === 'Y';
                    }
                },
                minlength: 6
            },
            editconfirmpass: {
                required: {
                    depends: function() {
                        return $('input[name="resetPass"]:checked').val() === 'Y';
                    }
                },
                minlength: 6,
                equalTo: "#editpass"
            },
            editrol: "required"
        }
    });

    $('input[name="resetPass"]').on('change', function() {
        $('#passArea').toggle($(this).val() === 'Y');
        if ($(this).val() !== 'Y') {
            $('#editpass').val('');
            $('#editconfirmpass').val('');
        }
        $('#formEdit_users').valid();
    });

    $('#ModalAddUsers').on('hidden.bs.modal', function() {
        $('#formUserAdd')[0].reset();
        var validator = $("#formUserAdd").validate();
        validator.resetForm();
        $("#msjresusersAdd").html('');
    });

    $('#EditUserModal').on('hidden.bs.modal', function() {
        $('#formEdit_users')[0].reset();
        var validator = $("#formEdit_users").validate();
        validator.resetForm();
        $("#updateResult").html('');
    });

    $("#DeleteUsersModal").on('hidden.bs.modal', function() {
        $("#idusersDelete").val('');
        $("#nameDeleteUser").html('');
    });

    $("#clean").on('click', function() {
        $(".grid-filter").val('');
        var myArray = camposValue();
        var camposAscDesc = '';
        var example_length = 10;
        load(1, myArray, example_length, camposAscDesc);
    });
</script>
