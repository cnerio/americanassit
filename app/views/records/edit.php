<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>

<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$statusOptions = [
    'New',
    'Complete',
    'Duplicate',
    'Do Not Serviceable',
    'Rejected TG5',
    'Address Issue',
    'Docs Received',
    'Waiting for Docs',
    'SOLIX PENDING',
    'TPIV',
    'DEAD',
    'Test',
    'Missing Consents'
];
?>

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 w-full max-w-[95%] items-center justify-between">
        <a href="<?php echo URLROOT; ?>/records/index" class="flex items-center gap-3" aria-label="American Assist Records Home">
            <img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-11 w-auto">
            <span class="hidden text-sm font-semibold tracking-wide text-slate-700 sm:inline">Records Dashboard</span>
        </a>

        <div class="flex items-center gap-2">
            <a href="<?php echo URLROOT; ?>/records/index" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                Back to Records
            </a>
            <a href="<?php echo URLROOT; ?>/users/logout" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
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

    <div class="relative mx-auto w-full max-w-5xl px-4">
        <div class="mb-4 flex flex-wrap items-center justify-between gap-2">
            <h1 class="text-2xl font-bold text-slate-900">Edit Customer</h1>
            <p class="text-sm font-medium text-slate-600">Customer ID: <?php echo e($data['customer_id']); ?></p>
        </div>

        <?php flash('record_message'); ?>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <form method="post" action="<?php echo URLROOT; ?>/records/updateEdit" class="space-y-6">
                <input type="hidden" name="id" value="<?php echo e($data['id']); ?>">
                <input type="hidden" name="customer_id" value="<?php echo e($data['customer_id']); ?>">

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="first_name" class="mb-1 block text-sm font-semibold text-slate-700">First Name</label>
                        <input id="first_name" name="first_name" type="text" value="<?php echo e($data['first_name']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100" required>
                    </div>
                    <div>
                        <label for="second_name" class="mb-1 block text-sm font-semibold text-slate-700">Last Name</label>
                        <input id="second_name" name="second_name" type="text" value="<?php echo e($data['second_name']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100" required>
                    </div>
                    <div>
                        <label for="email" class="mb-1 block text-sm font-semibold text-slate-700">Email</label>
                        <input id="email" name="email" type="email" value="<?php echo e($data['email']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="phone_number" class="mb-1 block text-sm font-semibold text-slate-700">Phone</label>
                        <input id="phone_number" name="phone_number" type="text" value="<?php echo e($data['phone_number']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="dob" class="mb-1 block text-sm font-semibold text-slate-700">DOB</label>
                        <input id="dob" name="dob" type="date" value="<?php echo e(substr((string)$data['dob'], 0, 10)); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="ssn" class="mb-1 block text-sm font-semibold text-slate-700">SSN (Last 4)</label>
                        <input id="ssn" name="ssn" type="text" maxlength="4" value="<?php echo e($data['ssn']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address1" class="mb-1 block text-sm font-semibold text-slate-700">Address 1</label>
                        <input id="address1" name="address1" type="text" value="<?php echo e($data['address1']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address2" class="mb-1 block text-sm font-semibold text-slate-700">Address 2</label>
                        <input id="address2" name="address2" type="text" value="<?php echo e($data['address2']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="city" class="mb-1 block text-sm font-semibold text-slate-700">City</label>
                        <input id="city" name="city" type="text" value="<?php echo e($data['city']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="state" class="mb-1 block text-sm font-semibold text-slate-700">State</label>
                        <?php
                        $usStates = [
                            'AL'=>'Alabama','AK'=>'Alaska','AZ'=>'Arizona','AR'=>'Arkansas','CA'=>'California',
                            'CO'=>'Colorado','CT'=>'Connecticut','DE'=>'Delaware','FL'=>'Florida','GA'=>'Georgia',
                            'HI'=>'Hawaii','ID'=>'Idaho','IL'=>'Illinois','IN'=>'Indiana','IA'=>'Iowa',
                            'KS'=>'Kansas','KY'=>'Kentucky','LA'=>'Louisiana','ME'=>'Maine','MD'=>'Maryland',
                            'MA'=>'Massachusetts','MI'=>'Michigan','MN'=>'Minnesota','MS'=>'Mississippi','MO'=>'Missouri',
                            'MT'=>'Montana','NE'=>'Nebraska','NV'=>'Nevada','NH'=>'New Hampshire','NJ'=>'New Jersey',
                            'NM'=>'New Mexico','NY'=>'New York','NC'=>'North Carolina','ND'=>'North Dakota','OH'=>'Ohio',
                            'OK'=>'Oklahoma','OR'=>'Oregon','PA'=>'Pennsylvania','RI'=>'Rhode Island','SC'=>'South Carolina',
                            'SD'=>'South Dakota','TN'=>'Tennessee','TX'=>'Texas','UT'=>'Utah','VT'=>'Vermont',
                            'VA'=>'Virginia','WA'=>'Washington','WV'=>'West Virginia','WI'=>'Wisconsin','WY'=>'Wyoming'
                        ];
                        $savedState = strtoupper(trim((string)$data['state']));
                        ?>
                        <select id="state" name="state" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                            <option value="">-- Select State --</option>
                            <?php foreach ($usStates as $abbr => $name): ?>
                                <option value="<?php echo $abbr; ?>" <?php echo ($savedState === $abbr) ? 'selected' : ''; ?>><?php echo $abbr; ?> – <?php echo $name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="zipcode" class="mb-1 block text-sm font-semibold text-slate-700">Zipcode</label>
                        <input id="zipcode" name="zipcode" type="text" value="<?php echo e($data['zipcode']); ?>" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                    </div>
                    <div>
                        <label for="order_status" class="mb-1 block text-sm font-semibold text-slate-700">Order Status</label>
                        <select id="order_status" name="order_status" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100">
                            <option value="">Please select</option>
                            <?php foreach ($statusOptions as $status) : ?>
                                <option value="<?php echo e($status); ?>" <?php echo ($data['order_status'] === $status) ? 'selected' : ''; ?>><?php echo e($status); ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 rounded-xl border border-slate-200 bg-slate-50 p-4 text-sm text-slate-600 sm:grid-cols-2">
                    <p><span class="font-semibold">Order ID:</span> <?php echo e($data['order_id']); ?></p>
                    <p><span class="font-semibold">Created At:</span> <?php echo e($data['created_at']); ?></p>
                    <p><span class="font-semibold">Shockwave Status:</span> <?php echo e($data['status_text'] ?: $data['status_text']); ?></p>
                    <p><span class="font-semibold">Program Benefit:</span> <?php echo e($data['program_name'] ?: $data['program_benefit']); ?></p>
                </div>

                <div class="flex flex-wrap items-center justify-between gap-2">
                    <button type="button" id="btnSendDocs"
                        class="inline-flex items-center gap-2 rounded-lg bg-amber-500 px-4 py-2 text-sm font-semibold text-white transition hover:bg-amber-600 disabled:opacity-60"
                        title="Send an email to the customer requesting required documents">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Send Docs Request Email
                    </button>
                    <span id="docsEmailMsg" class="hidden text-sm"></span>

                    <div class="flex items-center gap-2 ml-auto">
                        <a href="<?php echo URLROOT; ?>/records/index" class="inline-flex items-center rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-5 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="mt-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <h2 class="text-lg font-bold text-slate-900">Internal Notes</h2>
            <!-- <p class="mt-1 text-sm text-slate-500">Add internal comments and track who made each note.</p> -->

            <form id="noteForm" class="mt-4 space-y-3">
                <input type="hidden" id="noteCustomerId" value="<?php echo e($data['customer_id']); ?>">
                <input type="hidden" id="noteUserId" value="<?php echo e($_SESSION['user_id']); ?>">
                <input type="hidden" id="noteUserName" value="<?php echo e($_SESSION['name']); ?>">

                <textarea
                    id="internalNote"
                    rows="4"
                    placeholder="Write a note..."
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm text-slate-800 outline-none focus:border-sky-400 focus:ring-2 focus:ring-sky-100"
                ></textarea>

                <div class="flex items-center justify-between gap-2">
                    <p id="notesMessage" class="text-sm text-slate-500"></p>
                    <button type="submit" class="inline-flex items-center rounded-lg bg-slate-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700">
                        Save Note
                    </button>
                </div>
            </form>

            <div id="notesList" class="mt-5 space-y-3"></div>
        </div>
    </div>
</section>

<footer class="border-t border-slate-200 bg-white py-5">
    <div class="mx-auto flex w-full max-w-[95%] flex-col items-center justify-between gap-2 text-xs text-slate-500 sm:flex-row">
        <p>&copy; <?php echo date('Y'); ?> American Assist</p>
        <p>Records Management Portal</p>
    </div>
</footer>

<script src="<?php echo URLROOT; ?>/js/jquery.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery.mask.js"></script>
<script>
    const recordsUrl = "<?php echo URLROOT; ?>/records";

    function escapeHtml(value) {
        return String(value)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function renderNotes(notes) {
        const list = $('#notesList');
        list.empty();

        if (!Array.isArray(notes) || notes.length === 0) {
            list.html('<div class="rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-500">No notes yet.</div>');
            return;
        }

        notes.forEach(function(note) {
            const message = escapeHtml(note.message_send || '');
            const userName = escapeHtml(note.user_name || 'Unknown user');
            const stamp = escapeHtml(note.date_note || note.created_at || '');

            const item = `
                <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <div class="mb-2 flex flex-wrap items-center justify-between gap-2 text-xs text-slate-500">
                        <span class="font-semibold text-slate-700">${userName}</span>
                        <span>${stamp}</span>
                    </div>
                    <p class="text-sm text-slate-700 whitespace-pre-wrap">${message}</p>
                </div>
            `;
            list.append(item);
        });
    }

    function loadNotes() {
        const customerId = $('#noteCustomerId').val();
        $.post(recordsUrl + '/getNotes', { customer_id: customerId }, function(response) {
            let parsed = response;
            if (typeof response === 'string') {
                try {
                    parsed = JSON.parse(response);
                } catch (e) {
                    parsed = [];
                }
            }
            renderNotes(parsed);
        }).fail(function() {
            renderNotes([]);
        });
    }

    $(document).ready(function() {
        $('#phone_number').mask('(000) 000-0000');
        $('#ssn').mask('0000');
        $('#zipcode').mask('00000');

        loadNotes();

        // Send Documents Request Email
        $('#btnSendDocs').on('click', function() {
            const email = $('#email').val().trim();
            if (!email) {
                $('#docsEmailMsg').removeClass().addClass('text-sm text-red-600').text('Customer email is required to send notification.').removeClass('hidden');
                return;
            }

            if (!confirm('Send a documents request email to ' + email + '?')) return;

            const $btn = $(this);
            $btn.prop('disabled', true).text('Sending…');
            $('#docsEmailMsg').addClass('hidden');

            const payload = {
                customer_id: $('input[name="customer_id"]').val(),
                email:       email,
                firstname:   $('#first_name').val().trim(),
                lastname:    $('#second_name').val().trim()
            };

            $.post(recordsUrl + '/notifyDocuments', payload, function(response) {
                let parsed = response;
                if (typeof response === 'string') {
                    try { parsed = JSON.parse(response); } catch(e) { parsed = { response: 'ERROR' }; }
                }
                if (parsed.response === 'OK') {
                    $('#docsEmailMsg').removeClass().addClass('text-sm text-emerald-600').text('Email sent! Status set to "Waiting for Docs".').removeClass('hidden');
                    // Reflect status change in the dropdown
                    $('#order_status').val('Waiting for Docs');
                } else {
                    $('#docsEmailMsg').removeClass().addClass('text-sm text-red-600').text('Failed to send email. Check the customer email and try again.').removeClass('hidden');
                }
            }).fail(function() {
                $('#docsEmailMsg').removeClass().addClass('text-sm text-red-600').text('Request failed. Please try again.').removeClass('hidden');
            }).always(function() {
                $btn.prop('disabled', false).html(
                    '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg> Send Docs Request Email'
                );
            });
        });

        $('#noteForm').on('submit', function(e) {
            e.preventDefault();

            const noteText = $('#internalNote').val().trim();
            if (noteText === '') {
                $('#notesMessage').removeClass().addClass('text-sm text-red-600').text('Please write a note before saving.');
                return;
            }

            const payload = {
                customer_id: $('#noteCustomerId').val(),
                internal: noteText,
                id_user: $('#noteUserId').val(),
                user_name: $('#noteUserName').val()
            };

            $.post(recordsUrl + '/saveNote', payload, function(response) {
                let parsed = response;
                if (typeof response === 'string') {
                    try {
                        parsed = JSON.parse(response);
                    } catch (e) {
                        parsed = { response: 'ERROR' };
                    }
                }

                if (parsed.response === 'OK') {
                    $('#internalNote').val('');
                    $('#notesMessage').removeClass().addClass('text-sm text-emerald-600').text('Note saved successfully.');
                    loadNotes();
                    return;
                }

                $('#notesMessage').removeClass().addClass('text-sm text-red-600').text(parsed.response || 'Unable to save note.');
            }).fail(function() {
                $('#notesMessage').removeClass().addClass('text-sm text-red-600').text('Unable to save note right now.');
            });
        });
    });
</script>
