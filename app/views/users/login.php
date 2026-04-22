<?php require APPROOT . '/views/inc/header.php'; ?>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        deep: '#0f172a',
                        sky: '#0ea5e9',
                        mist: '#e2e8f0'
                    }
                },
                boxShadow: {
                    soft: '0 20px 50px -20px rgba(15, 23, 42, 0.35)'
                }
            }
        }
    };
</script>

<section class="relative min-h-screen overflow-hidden bg-slate-50 py-16">
    <div class="pointer-events-none absolute inset-0">
        <div class="absolute -left-24 -top-24 h-72 w-72 rounded-full bg-brand-sky/20 blur-3xl"></div>
        <div class="absolute -right-28 bottom-0 h-80 w-80 rounded-full bg-cyan-300/20 blur-3xl"></div>
    </div>

    <div class="relative mx-auto flex min-h-[70vh] w-full max-w-md items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="w-full rounded-3xl bg-white p-6 shadow-soft ring-1 ring-slate-200 sm:p-8">
                <h2 class="text-2xl font-bold text-brand-deep">Log in</h2>
                <p class="mt-1 text-sm text-slate-500">Enter your email and password to continue.</p>

                <div class="mt-4">
                    <?php flash('register_success'); ?>
                </div>

                <form method="post" action="<?php echo URLROOT; ?>/users/loginProcess" class="mt-6 space-y-5" novalidate>
                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">Email</label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            autocomplete="email"
                            value="<?php echo $data['email']; ?>"
                            class="w-full rounded-xl border px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-brand-sky focus:ring-4 focus:ring-sky-100 <?php echo (!empty($data['email_err'])) ? 'border-red-400 bg-red-50' : 'border-slate-300'; ?>"
                            placeholder="name@company.com"
                        >
                        <?php if (!empty($data['email_err'])) : ?>
                            <p class="mt-2 text-sm font-medium text-red-600"><?php echo $data['email_err']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">Password</label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password"
                            class="w-full rounded-xl border px-4 py-3 text-slate-900 placeholder-slate-400 outline-none transition focus:border-brand-sky focus:ring-4 focus:ring-sky-100 <?php echo (!empty($data['password_err'])) ? 'border-red-400 bg-red-50' : 'border-slate-300'; ?>"
                            placeholder="Enter your password"
                        >
                        <?php if (!empty($data['password_err'])) : ?>
                            <p class="mt-2 text-sm font-medium text-red-600"><?php echo $data['password_err']; ?></p>
                        <?php endif; ?>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-xl bg-brand-deep px-4 py-3 text-sm font-semibold text-white transition hover:bg-slate-900 focus:outline-none focus:ring-4 focus:ring-slate-300"
                    >
                        Login
                    </button>
                </form>
        </div>
    </div>
</section>