<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>

<?php
function e($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

$leads = isset($data['leads']) && is_array($data['leads']) ? $data['leads'] : [];
?>

<header class="fixed inset-x-0 top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
    <div class="mx-auto flex h-20 w-full max-w-[95%] items-center justify-between">
        <a href="<?php echo URLROOT; ?>/records/index" class="flex items-center gap-3" aria-label="American Assist Records Home">
            <img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-11 w-auto">
            <span class="hidden text-sm font-semibold tracking-wide text-slate-700 sm:inline">Shockwave Retry Queue</span>
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
        <div class="absolute -top-24 right-0 h-72 w-72 rounded-full bg-amber-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-sky-200/30 blur-3xl"></div>
    </div>

    <div class="relative mx-auto w-full max-w-[95%]">
        <div class="mb-6 flex flex-wrap items-end justify-between gap-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Shockwave Retry Queue</h1>
                <p class="mt-1 text-sm text-slate-600">Only leads with order status <span class="font-semibold">Unknown Error</span> or <span class="font-semibold">Unfinished</span> appear here.</p>
            </div>
            <div class="rounded-xl bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-700">
                Leads in queue: <span id="queueCount"><?php echo count($leads); ?></span>
            </div>
        </div>

        <div id="globalMessage" class="mb-4 hidden rounded-xl border px-4 py-3 text-sm font-medium"></div>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-100 text-left text-xs font-semibold uppercase tracking-wide text-slate-600">
                        <tr>
                            <th class="px-4 py-3">Customer ID</th>
                            <th class="px-4 py-3">Lead</th>
                            <th class="px-4 py-3">Contact</th>
                            <th class="px-4 py-3">Order Status</th>
                            <th class="px-4 py-3">Status Text</th>
                            <th class="px-4 py-3">Created</th>
                            <th class="px-4 py-3 text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody id="retryTableBody" class="divide-y divide-slate-200 bg-white">
                        <?php if (empty($leads)) : ?>
                            <tr>
                                <td colspan="7" class="px-4 py-10 text-center text-sm text-slate-500">No leads are waiting for Shockwave recreation.</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($leads as $lead) : ?>
                                <tr id="lead-<?php echo e($lead['customer_id']); ?>">
                                    <td class="px-4 py-4 font-semibold text-slate-900"><?php echo e($lead['customer_id']); ?></td>
                                    <td class="px-4 py-4 text-slate-700"><?php echo e(trim(($lead['first_name'] ?? '') . ' ' . ($lead['second_name'] ?? ''))); ?></td>
                                    <td class="px-4 py-4 text-slate-700">
                                        <div><?php echo e($lead['email'] ?? ''); ?></div>
                                        <div class="text-xs text-slate-500"><?php echo e($lead['phone_number'] ?? ''); ?></div>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="current-order-status inline-flex rounded-full bg-amber-100 px-2.5 py-1 text-xs font-semibold text-amber-800"><?php echo e($lead['order_status'] ?? ''); ?></span>
                                    </td>
                                    <td class="current-status-text px-4 py-4 text-slate-600"><?php echo e($lead['status_text'] ?? ''); ?></td>
                                    <td class="px-4 py-4 text-slate-600"><?php echo e($lead['created_at'] ?? ''); ?></td>
                                    <td class="px-4 py-4 text-right">
                                        <button type="button" class="retry-btn inline-flex items-center rounded-lg bg-slate-900 px-3 py-2 text-sm font-semibold text-white transition hover:bg-slate-700" data-customer-id="<?php echo e($lead['customer_id']); ?>">
                                            Recreate Order
                                        </button>
                                        <div class="row-message mt-2 text-xs text-slate-500"></div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    function showGlobalMessage(type, text) {
        const box = $('#globalMessage');
        box.removeClass('hidden border-emerald-200 bg-emerald-50 text-emerald-700 border-red-200 bg-red-50 text-red-700');
        if (type === 'success') {
            box.addClass('border-emerald-200 bg-emerald-50 text-emerald-700');
        } else {
            box.addClass('border-red-200 bg-red-50 text-red-700');
        }
        box.text(text);
    }

    function setRowMessage(row, text, isError) {
        const msg = row.find('.row-message');
        msg.removeClass('text-slate-500 text-red-600 text-emerald-600');
        msg.addClass(isError ? 'text-red-600' : 'text-emerald-600');
        msg.text(text);
    }

    function refreshQueueCount() {
        $('#queueCount').text($('#retryTableBody tr[id^="lead-"]').length);
    }

    $(document).on('click', '.retry-btn', function() {
        const button = $(this);
        const customerId = button.data('customer-id');
        const row = $('#lead-' + customerId);

        button.prop('disabled', true).text('Recreating...').addClass('opacity-60');
        setRowMessage(row, 'Submitting retry to Shockwave...', false);

        $.ajax({
            url: '<?php echo URLROOT; ?>/shockwave/recreate',
            type: 'POST',
            dataType: 'json',
            data: {
                customer_id: customerId
            }
        }).done(function(response) {
            const newStatus = response.order_status || 'New';
            row.find('.current-order-status').text(newStatus);
            row.find('.current-status-text').text((response.response && response.response.StatusText) ? response.response.StatusText : (response.message || ''));
            setRowMessage(row, response.message || 'Order recreated.', false);
            showGlobalMessage('success', response.message || 'Shockwave recreate completed.');

            if (newStatus !== 'Unknown Error' && newStatus !== 'Unfinished') {
                row.fadeOut(200, function() {
                    $(this).remove();
                    if (!$('#retryTableBody tr[id^="lead-"]').length) {
                        $('#retryTableBody').html('<tr><td colspan="7" class="px-4 py-10 text-center text-sm text-slate-500">No leads are waiting for Shockwave recreation.</td></tr>');
                    }
                    refreshQueueCount();
                });
            } else {
                button.prop('disabled', false).text('Recreate Order').removeClass('opacity-60');
            }
        }).fail(function(xhr) {
            let message = 'Unable to recreate this order.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
                message = xhr.responseJSON.message;
            }
            setRowMessage(row, message, true);
            showGlobalMessage('error', message);
            button.prop('disabled', false).text('Recreate Order').removeClass('opacity-60');
        });
    });
</script>