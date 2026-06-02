<?php require APPROOT . '/views/inc/header.php'; ?>

<script src="https://cdn.tailwindcss.com"></script>

<style>
    .dt-buttons .dt-button {
        background: #0f172a !important;
        border: 0 !important;
        color: #fff !important;
        border-radius: 8px !important;
        padding: 6px 12px !important;
        font-size: 13px !important;
    }

    .dataTables_wrapper .dataTables_filter input,
    .dataTables_wrapper .dataTables_length select {
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        padding: 6px 10px;
    }

    #recordsTable thead th {
        white-space: nowrap;
    }
</style>

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 w-full max-w-[95%] items-center justify-between">
        <a href="<?php echo URLROOT; ?>/records/index" class="flex items-center gap-3" aria-label="American Assist Records Home">
            <img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-11 w-auto">
            <span class="hidden text-sm font-semibold tracking-wide text-slate-700 sm:inline">Records Dashboard</span>
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
        <div class="absolute -top-24 right-0 h-72 w-72 rounded-full bg-cyan-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-blue-200/30 blur-3xl"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[95%]">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-200 px-5 py-4 sm:px-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <h2 class="text-xl font-bold text-slate-900">Lifeline Records</h2>

                    <div class="flex flex-wrap items-center gap-2">
                        <!-- <a href="<?php //echo URLROOT; ?>/shockwave/index" class="mt-5 inline-flex items-center rounded-lg bg-amber-500 px-3 py-2 text-sm font-semibold text-slate-950 transition hover:bg-amber-400">
                            <i class="fa fa-refresh mr-2"></i> Retry Shockwave Leads
                        </a> -->

                        <div>
                            <label for="statusFilter" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">Order Status</label>
                            <select id="statusFilter" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                                <option value="">All Statuses</option>
                            </select>
                        </div>

                        <div>
                            <label for="startDateFilter" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">Created From</label>
                            <input id="startDateFilter" type="date" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                        </div>

                        <div>
                            <label for="endDateFilter" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">Created To</label>
                            <input id="endDateFilter" type="date" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                        </div>

                        <button id="clearFilters" class="mt-5 inline-flex items-center rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            <i class="fa fa-filter mr-2"></i> Clear Filters
                        </button>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-6">
                <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white p-3">
                    <table id="recordsTable" class="display nowrap w-full text-sm" style="font-size:12px;">
                        <thead></thead>
                        <tbody></tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="border-t border-slate-200 bg-white py-5">
    <div class="mx-auto flex w-full max-w-[95%] flex-col items-center justify-between gap-2 text-xs text-slate-500 sm:flex-row">
        <p>&copy; <?php echo date('Y'); ?> American Assist</p>
        <p>Records Management Portal</p>
    </div>
</footer>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
    const urlroot = "<?php echo URLROOT; ?>/records";
    const recordsFields = [
        'id',
        'customer_id',
        'first_name',
        'second_name',
        'phone_number',
        'email',
        'dob',
        'city',
        'state',
        'zipcode',
        'order_id',
        'order_status',
        'program_benefit',
        'created_at'
    ];
    let recordsTable = null;
    let statusColumnIndex = -1;
    let createdAtColumnIndex = -1;
    let externalFilterFn = null;

    function escapeHtml(value) {
        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function buildActionButton(record) {
        const customerId = record.customer_id ? String(record.customer_id) : '';
        if (!customerId) {
            return '<span class="text-muted">N/A</span>';
        }

        return '<a href="' + urlroot + '/edit/' + encodeURIComponent(customerId) + '" class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"></i> Edit</a>';
    }

    function toDateOnlyValue(value) {
        if (!value) {
            return '';
        }

        const datePart = String(value).trim().split(' ')[0];
        return /^\d{4}-\d{2}-\d{2}$/.test(datePart) ? datePart : '';
    }

    function registerExternalFilters() {
        if (externalFilterFn) {
            const index = $.fn.dataTable.ext.search.indexOf(externalFilterFn);
            if (index > -1) {
                $.fn.dataTable.ext.search.splice(index, 1);
            }
        }

        externalFilterFn = function(settings, data) {
            if (!recordsTable || settings.nTable !== recordsTable.table().node()) {
                return true;
            }

            const selectedStatus = $('#statusFilter').val().trim().toLowerCase();
            const startDate = $('#startDateFilter').val();
            const endDate = $('#endDateFilter').val();

            if (statusColumnIndex > -1 && selectedStatus !== '') {
                const rowStatus = String(data[statusColumnIndex] || '').trim().toLowerCase();
                if (rowStatus !== selectedStatus) {
                    return false;
                }
            }

            if (createdAtColumnIndex > -1 && (startDate || endDate)) {
                const rowDate = toDateOnlyValue(data[createdAtColumnIndex]);
                if (!rowDate) {
                    return false;
                }

                if (startDate && rowDate < startDate) {
                    return false;
                }

                if (endDate && rowDate > endDate) {
                    return false;
                }
            }

            return true;
        };

        $.fn.dataTable.ext.search.push(externalFilterFn);
    }

    function fillStatusFilter(records) {
        const statusSet = new Set();

        records.forEach((record) => {
            const status = (record.order_status == null ? '' : String(record.order_status)).trim();
            if (status !== '') {
                statusSet.add(status);
            }
        });

        const statusFilter = $('#statusFilter');
        statusFilter.find('option:not(:first)').remove();

        Array.from(statusSet).sort((a, b) => a.localeCompare(b)).forEach((status) => {
            statusFilter.append('<option value="' + escapeHtml(status) + '">' + escapeHtml(status) + '</option>');
        });
    }

    function buildTable(records) {
        const tableEl = $('#recordsTable');
        const thead = tableEl.find('thead');
        const tbody = tableEl.find('tbody');
        const columns = recordsFields;

        thead.empty();
        tbody.empty();

        const headerRow = $('<tr></tr>');
        const filterRow = $('<tr></tr>');

        columns.forEach((colName) => {
            headerRow.append('<th>' + escapeHtml(colName.replace(/_/g, ' ').toUpperCase()) + '</th>');
            filterRow.append('<th><input type="text" class="form-control form-control-sm column-filter" data-column="' + escapeHtml(colName) + '" placeholder="Filter"></th>');
        });

        headerRow.append('<th>ACTIONS</th>');
        filterRow.append('<th></th>');

        thead.append(headerRow);
        thead.append(filterRow);

        if (!records || !records.length) {
            tbody.html('<tr><td class="text-center" colspan="' + (columns.length + 1) + '">No records found</td></tr>');
            fillStatusFilter([]);
            return;
        }

        const dataSet = records.map((record) => {
            const row = columns.map((colName) => escapeHtml(record[colName] == null ? '' : record[colName]));
            row.push(buildActionButton(record));
            return row;
        });

        statusColumnIndex = columns.indexOf('order_status');
        createdAtColumnIndex = columns.indexOf('created_at');
        const createdAtIndex = createdAtColumnIndex;

        fillStatusFilter(records);

        recordsTable = tableEl.DataTable({
            destroy: true,
            data: dataSet,
            orderCellsTop: true,
            pageLength: 25,
            lengthMenu: [10, 25, 50, 100],
            scrollX: true,
            order: [[createdAtIndex >= 0 ? createdAtIndex : 0, 'desc']],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export Excel',
                    title: 'lifeline_records',
                    exportOptions: {
                        columns: ':not(:last-child)'
                    }
                }
            ],
            language: {
                search: 'Quick Filter:'
            }
        });

        const tableContainer = $(recordsTable.table().container());

        tableContainer.off('keyup change', '.column-filter').on('keyup change', '.column-filter', function() {
            const columnIndex = $(this).closest('th').index();
            if (columnIndex < 0 || !recordsTable.column(columnIndex).length) {
                return;
            }

            if (recordsTable.column(columnIndex).search() !== this.value) {
                recordsTable.column(columnIndex).search(this.value).draw();
            }
        });

        registerExternalFilters();

        $('#statusFilter, #startDateFilter, #endDateFilter').off('change').on('change', function() {
            recordsTable.draw();
        });

        $('#clearFilters').off('click').on('click', function() {
            if (recordsTable) {
                $(recordsTable.table().container()).find('.column-filter').val('');
            }
            $('#statusFilter').val('');
            $('#startDateFilter').val('');
            $('#endDateFilter').val('');
            recordsTable.search('').columns().search('').draw();
        });
    }

    function loadRecords() {
        $.ajax({
            url: urlroot + '/getAllRecordsData',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                buildTable((response && response.data) ? response.data : []);
            },
            error: function() {
                buildTable([]);
            }
        });
    }

    $(document).ready(function() {
        loadRecords();
    });
</script>
