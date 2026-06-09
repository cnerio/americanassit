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

    #recordsTable th:last-child,
    #recordsTable td:last-child {
        position: sticky;
        right: 0;
        min-width: 110px;
        width: 110px;
        white-space: nowrap;
        text-align: center;
        background: #fff;
        box-shadow: -10px 0 12px -12px rgba(15, 23, 42, 0.7);
    }

    #recordsTable thead th:last-child {
        z-index: 4;
        background: #f8fafc;
    }

    #recordsTable tbody td:last-child {
        z-index: 3;
    }

    #recordsTable td:last-child .btn {
        padding-left: 8px;
        padding-right: 8px;
    }
</style>

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 w-full max-w-[95%] items-center justify-between">
        <a href="<?php echo URLROOT; ?>/records/index" class="flex items-center gap-3" aria-label="American Assist Records Home">
            <img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-11 w-auto">
            <span class="hidden text-sm font-semibold tracking-wide text-slate-700 sm:inline">Records Dashboard</span>
        </a>

        <div class="flex items-center gap-2">
            <?php if ((int)($_SESSION['rol'] ?? 0) === 1): ?>
                <a
                    href="<?php echo URLROOT; ?>/users/admin"
                    class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-300"
                >
                    Admin Users
                </a>
            <?php endif; ?>

            <a
                href="<?php echo URLROOT; ?>/users/logout"
                class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-slate-300"
            >
                Logout
            </a>
        </div>
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
                            <label for="programBenefitFilter" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-slate-500">Program Benefit</label>
                            <select id="programBenefitFilter" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                                <option value="">All Benefits</option>
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

    function escapeHtml(value) {
        return String(value == null ? '' : value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function initTable() {
        const tableEl = $('#recordsTable');
        const thead = tableEl.find('thead');
        thead.empty();

        const headerRow = $('<tr></tr>');
        recordsFields.forEach(function(colName) {
            headerRow.append('<th>' + escapeHtml(colName.replace(/_/g, ' ').toUpperCase()) + '</th>');
        });
        headerRow.append('<th>ACTIONS</th>');
        thead.append(headerRow);

        const columns = recordsFields.map(function(field) {
            return {
                data: field,
                render: function(data) {
                    return escapeHtml(data);
                }
            };
        });

        columns.push({
            data: 'customer_id',
            orderable: false,
            render: function(data) {
                if (!data) return '<span class="text-muted">N/A</span>';
                return '<a href="' + urlroot + '/edit/' + encodeURIComponent(String(data)) + '" class="btn btn-outline-dark btn-sm"><i class="fa fa-pencil"></i> Edit</a>';
            }
        });

        recordsTable = tableEl.DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: urlroot + '/getRecordsServerSide',
                type: 'POST',
                data: function(d) {
                    d.status_filter  = $('#statusFilter').val();
                    d.benefit_filter = $('#programBenefitFilter').val();
                    d.start_date     = $('#startDateFilter').val();
                    d.end_date       = $('#endDateFilter').val();
                    return d;
                }
            },
            columns: columns,
            pageLength: 10,
            lengthMenu: [10, 25, 50, 100],
            scrollX: true,
            order: [[recordsFields.indexOf('created_at'), 'desc']],
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export Excel',
                    title: 'lifeline_records',
                    exportOptions: { columns: ':not(:last-child)' }
                }
            ],
            language: {
                search: 'Quick Filter:',
                processing: 'Loading records...'
            }
        });

        $('#statusFilter, #programBenefitFilter, #startDateFilter, #endDateFilter').on('change', function() {
            recordsTable.ajax.reload();
        });

        $('#clearFilters').on('click', function() {
            $('#statusFilter').val('');
            $('#programBenefitFilter').val('');
            $('#startDateFilter').val('');
            $('#endDateFilter').val('');
            recordsTable.ajax.reload();
        });
    }

    function loadFilterOptions() {
        $.getJSON(urlroot + '/getFilterOptions', function(data) {
            const statusFilter = $('#statusFilter');
            (data.statuses || []).forEach(function(status) {
                statusFilter.append('<option value="' + escapeHtml(status) + '">' + escapeHtml(status) + '</option>');
            });
            const benefitFilter = $('#programBenefitFilter');
            (data.benefits || []).forEach(function(benefit) {
                benefitFilter.append('<option value="' + escapeHtml(benefit) + '">' + escapeHtml(benefit) + '</option>');
            });
        });
    }

    $(document).ready(function() {
        initTable();
        loadFilterOptions();
    });
</script>
