<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
}

if (empty($_SESSION['landing_csrf_token'])) {
	$_SESSION['landing_csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="facebook-domain-verification" content="dgiw69737edylbyo315x5iehz86uuy" />
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>American Assistance | Free Government Phone Services</title>
	<meta name="description" content="Apply for Lifeline  plans with free wireless service, unlimited talk and text, and high-speed data." />

	<script src="https://cdn.tailwindcss.com"></script>
	<script>
		tailwind.config = {
			theme: {
				extend: {
					colors: {
						brand: {
							navy: "#003366",
							red: "#D12027",
							light: "#F4F4F4"
						}
					},
					fontFamily: {
						sans: ["Roboto", "ui-sans-serif", "system-ui", "sans-serif"]
					}
				}
			}
		};
	</script>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet" />
	<!-- <link rel="icon" type="image/svg+xml" href="<?php// echo URLROOT; ?>/public/img/favicon.svg"> -->
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo URLROOT; ?>/public/img/favicon.png">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WF77KG4R');</script>
<!-- End Google Tag Manager -->

</head>
<body class="bg-white text-slate-800 antialiased">
	<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:z-50 focus:rounded-md focus:bg-white focus:px-3 focus:py-2 focus:text-brand-navy focus:shadow">
		Skip to main content
	</a>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WF77KG4R"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
		<div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
			<a href="#" class="flex items-center gap-3" aria-label="American Assistance Home">
				<!-- <div class="flex h-11 items-center justify-center rounded-md bg-brand-navy text-sm font-bold tracking-wide text-white">
					
				</div> -->
				<img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assistance" class="h-10 w-auto sm:h-11" />
			</a>

			<nav class="hidden md:flex md:items-center md:justify-center md:gap-8" aria-label="Primary navigation">
				<a href="#" class="text-sm font-medium text-slate-700 transition hover:text-brand-navy">Home</a>
				<a href="#about" class="text-sm font-medium text-slate-700 transition hover:text-brand-navy">About Us</a>
				<a href="#plans" class="text-sm font-medium text-slate-700 transition hover:text-brand-navy">Plans</a>
				<a href="#contact" class="text-sm font-medium text-slate-700 transition hover:text-brand-navy">Contact</a>
			</nav>

			<div class="hidden md:block">
				<a href="#eligibility" class="inline-flex items-center rounded-md bg-brand-red px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-offset-2">
					Apply Now
				</a>
			</div>

			<button
				id="menu-toggle"
				class="inline-flex items-center justify-center rounded-md border border-slate-300 p-2 text-brand-navy transition hover:bg-brand-light focus:outline-none focus:ring-2 focus:ring-brand-navy md:hidden"
				aria-controls="mobile-menu"
				aria-expanded="false"
				aria-label="Toggle menu"
			>
				<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
				</svg>
			</button>
		</div>

		<div id="mobile-menu" class="hidden border-t border-slate-200 bg-white px-4 py-4 md:hidden">
			<nav class="space-y-3" aria-label="Mobile navigation">
				<a href="#" class="block rounded-md px-3 py-2 font-medium text-slate-700 hover:bg-brand-light hover:text-brand-navy">Home</a>
				<a href="#about" class="block rounded-md px-3 py-2 font-medium text-slate-700 hover:bg-brand-light hover:text-brand-navy">About Us</a>
				<a href="#plans" class="block rounded-md px-3 py-2 font-medium text-slate-700 hover:bg-brand-light hover:text-brand-navy">Plans</a>
				<a href="#contact" class="block rounded-md px-3 py-2 font-medium text-slate-700 hover:bg-brand-light hover:text-brand-navy">Contact</a>
				<a href="#eligibility" class="mt-2 block rounded-md bg-brand-red px-3 py-2 text-center font-semibold text-white hover:bg-red-700">Apply Now</a>
			</nav>
		</div>
	</header>

	<main id="main-content">
		<section class="relative isolate">
			<img
				src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1920&q=80"
				alt="Smiling family using mobile phone services"
				class="h-[70vh] min-h-[500px] w-full object-cover"
			/>
			<div class="absolute inset-0 bg-gradient-to-r from-brand-navy/85 via-brand-navy/65 to-brand-navy/30"></div>
			<div class="absolute inset-0">
				<div class="mx-auto flex h-full max-w-7xl items-center px-4 sm:px-6 lg:px-8">
					<div class="max-w-2xl text-white">
						<p class="mb-4 inline-flex rounded-full bg-white/15 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white ring-1 ring-white/30">
							Lifeline
						</p>
						<h1 class="text-3xl font-black leading-tight sm:text-4xl lg:text-5xl">
							Free Government Phone Services for Eligible&nbsp;Households
						</h1>
						<p class="mt-4 text-base text-slate-100 sm:text-lg">
							Stay connected with dependable wireless coverage, unlimited talk and text, and data plans designed for your everyday&nbsp;needs.
						</p>
						<div class="mt-8">
							<a href="#eligibility" class="inline-flex items-center rounded-md bg-brand-red px-6 py-3 text-base font-semibold text-white shadow-lg transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-offset-2 focus:ring-offset-brand-navy">
								Check Eligibility
							</a>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="eligibility" class="bg-brand-light py-14 sm:py-16">
			<div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
				<div class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
					<h2 class="text-center text-2xl font-bold text-brand-navy sm:text-3xl">Start Your Enrollment</h2>
					<p class="mt-2 text-center text-slate-600">Complete this form to check eligibility and begin your free government phone service&nbsp;application.</p>
					<form id="enrollment-form" class="mt-6 space-y-6" action="<?php echo URLROOT; ?>/enrolls/submitLanding" method="post" aria-label="Enrollment form" novalidate>
						<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['landing_csrf_token'], ENT_QUOTES, 'UTF-8'); ?>" />
						<input type="text" name="verification_code" value="" autocomplete="off" tabindex="-1" aria-hidden="true" class="hidden" />
						<div>
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Applicant Information</h3>
							<p class="mt-2 text-xs text-gray-500">The information you provide will be used to determine your eligibility and may be transmitted to federal or state systems, including the National Verifier.</p>
							<div class="mt-3 grid gap-4 sm:grid-cols-2">
								<div>
									<label for="first_name" class="mb-2 block text-sm font-medium text-slate-700">First Name</label>
									<input id="first_name" name="first_name" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div>
									<label for="last_name" class="mb-2 block text-sm font-medium text-slate-700">Last Name</label>
									<input id="last_name" name="last_name" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div class="sm:col-span-2">
									<label class="mb-2 block text-sm font-medium text-slate-700">Date of Birth</label>
									<div class="grid grid-cols-3 gap-3">
										<input id="dobM" name="dobM" type="text" inputmode="numeric" maxlength="2" placeholder="MM" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
										<input id="dobD" name="dobD" type="text" inputmode="numeric" maxlength="2" placeholder="DD" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
										<input id="dobY" name="dobY" type="text" inputmode="numeric" maxlength="4" placeholder="YYYY" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
									</div>
								</div>
								<div>
									<label for="phone" class="mb-2 block text-sm font-medium text-slate-700">Phone Number</label>
									<input id="phone" name="phone" type="tel" inputmode="numeric" maxlength="14" placeholder="e.g. (555) 123-4567" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div>
									<label for="ssn" class="mb-2 block text-sm font-medium text-slate-700">Last 4 of SSN</label>
									<input id="ssn" name="ssn" type="text" inputmode="numeric" pattern="[0-9]{4}" maxlength="4" placeholder="e.g. 1234" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div class="sm:col-span-2">
									<label for="email" class="mb-2 block text-sm font-medium text-slate-700">Email Address</label>
									<input id="email" name="email" type="email" placeholder="name@example.com" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required <?php if(isset($data) && isset($data['lead']['email'])){echo ($data['lead']['email'])?"value='".$data['lead']['email']."' readonly":"";} ?>/>
								</div>
							</div>
						</div>

						<div>
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Service Address</h3>
							<div class="mt-3 grid gap-4 sm:grid-cols-2">
								<div class="sm:col-span-2">
									<label for="address1" class="mb-2 block text-sm font-medium text-slate-700">Street Address</label>
									<input id="address1" name="address1" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div class="sm:col-span-2">
									<label for="address2" class="mb-2 block text-sm font-medium text-slate-700">Apt, Suite, Unit (Optional)</label>
									<input id="address2" name="address2" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" />
								</div>
								<div>
									<label for="city" class="mb-2 block text-sm font-medium text-slate-700">City</label>
									<input id="city" name="city" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required <?php if(isset($data) && isset($data['lead']['city'])){echo ($data['lead']['city'])?"value='".$data['lead']['city']."' readonly":"";} ?>/>
								</div>
								<div>
									<label for="state" class="mb-2 block text-sm font-medium text-slate-700">State</label>
									<select id="state" name="state" class="w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required>
										<option value="">Select State</option>
										<option value="AL" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="AL")?"selected":"";}?>>Alabama</option>
										<option value="AK" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="AK")?"selected":"";}?>>Alaska</option>
										<option value="AZ" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="AZ")?"selected":"";}?>>Arizona</option>
										<option value="AR" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="AR")?"selected":"";}?>>Arkansas</option>
										<option value="CA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="CA")?"selected":"";}?>>California</option>
										<option value="CO" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="CO")?"selected":"";}?>>Colorado</option>
										<option value="CT" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="CT")?"selected":"";}?>>Connecticut</option>
										<option value="DE" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="DE")?"selected":"";}?>>Delaware</option>
										<option value="DC" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="DC")?"selected":"";}?>>District of Columbia</option>
										<option value="FL" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="FL")?"selected":"";}?>>Florida</option>
										<option value="GA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="GA")?"selected":"";}?>>Georgia</option>
										<option value="HI" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="HI")?"selected":"";}?>>Hawaii</option>
										<option value="ID" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="ID")?"selected":"";}?>>Idaho</option>
										<option value="IL" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="IL")?"selected":"";}?>>Illinois</option>
										<option value="IN" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="IN")?"selected":"";}?>>Indiana</option>
										<option value="IA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="IA")?"selected":"";}?>>Iowa</option>
										<option value="KS" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="KS")?"selected":"";}?>>Kansas</option>
										<option value="KY" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="KY")?"selected":"";}?>>Kentucky</option>
										<option value="LA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="LA")?"selected":"";}?>>Louisiana</option>
										<option value="ME" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="ME")?"selected":"";}?>>Maine</option>
										<option value="MD" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MD")?"selected":"";}?>>Maryland</option>
										<option value="MA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MA")?"selected":"";}?>>Massachusetts</option>
										<option value="MI" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MI")?"selected":"";}?>>Michigan</option>
										<option value="MN" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MN")?"selected":"";}?>>Minnesota</option>
										<option value="MS" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MS")?"selected":"";}?>>Mississippi</option>
										<option value="MO" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MO")?"selected":"";}?>>Missouri</option>
										<option value="MT" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="MT")?"selected":"";}?>>Montana</option>
										<option value="NE" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NE")?"selected":"";}?>>Nebraska</option>
										<option value="NV" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NV")?"selected":"";}?>>Nevada</option>
										<option value="NH" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NH")?"selected":"";}?>>New Hampshire</option>
										<option value="NJ" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NJ")?"selected":"";}?>>New Jersey</option>
										<option value="NM" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NM")?"selected":"";}?>>New Mexico</option>
										<option value="NY" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NY")?"selected":"";}?>>New York</option>
										<option value="NC" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="NC")?"selected":"";}?>>North Carolina</option>
										<option value="ND" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="ND")?"selected":"";}?>>North Dakota</option>
										<option value="OH" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="OH")?"selected":"";}?>>Ohio</option>
										<option value="OK" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="OK")?"selected":"";}?>>Oklahoma</option>
										<option value="OR" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="OR")?"selected":"";}?>>Oregon</option>
										<option value="PA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="PA")?"selected":"";}?>>Pennsylvania</option>
										<option value="PR" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="PR")?"selected":"";}?>>Puerto Rico</option>
										<option value="RI" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="RI")?"selected":"";}?>>Rhode Island</option>
										<option value="SC" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="SC")?"selected":"";}?>>South Carolina</option>
										<option value="SD" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="SD")?"selected":"";}?>>South Dakota</option>
										<option value="TN" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="TN")?"selected":"";}?>>Tennessee</option>
										<option value="TX" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="TX")?"selected":"";}?>>Texas</option>
										<option value="UT" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="UT")?"selected":"";}?>>Utah</option>
										<option value="VT" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="VT")?"selected":"";}?>>Vermont</option>
										<option value="VA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="VA")?"selected":"";}?>>Virginia</option>
										<option value="WA" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="WA")?"selected":"";}?>>Washington</option>
										<option value="WV" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="WV")?"selected":"";}?>>West Virginia</option>
										<option value="WI" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="WI")?"selected":"";}?>>Wisconsin</option>
										<option value="WY" <?php if(isset($data) && isset($data['lead']['state'])){echo($data['lead']['state']=="WY")?"selected":"";}?>>Wyoming</option>
									</select>
								</div>
								<div class="sm:col-span-2">
									<label for="zipcode" class="mb-2 block text-sm font-medium text-slate-700">ZIP Code</label>
									<input id="zipcode" name="zipcode" type="text" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="e.g. 90001" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required <?php if(isset($data) && isset($data['lead']['zipcode'])){echo ($data['lead']['zipcode'])?"value='".$data['lead']['zipcode']."' readonly":"";} ?>/>
								</div>

								<div class="sm:col-span-2">
									<label class="flex items-start gap-2 rounded-md border border-slate-200 bg-slate-50 px-3 py-3 text-sm text-slate-700">
										<input id="shipping_different" name="shipping_different" type="checkbox" class="mt-0.5 h-4 w-4" />
										<span>My shipping address is different from my residence/service address.</span>
									</label>
								</div>
							</div>

							<div id="shipping-fields" class="mt-5 hidden grid gap-4 rounded-lg border border-slate-200 bg-slate-50 p-4 sm:grid-cols-2">
								<div class="sm:col-span-2">
									<h4 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Shipping Address</h4>
								</div>
								<div class="sm:col-span-2">
									<label for="shipping_address1" class="mb-2 block text-sm font-medium text-slate-700">Street Address</label>
									<input id="shipping_address1" name="shipping_address1" type="text" class="shipping-input w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" />
								</div>
								<div class="sm:col-span-2">
									<label for="shipping_address2" class="mb-2 block text-sm font-medium text-slate-700">Apt, Suite, Unit (Optional)</label>
									<input id="shipping_address2" name="shipping_address2" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" />
								</div>
								<div>
									<label for="shipping_city" class="mb-2 block text-sm font-medium text-slate-700">City</label>
									<input id="shipping_city" name="shipping_city" type="text" class="shipping-input w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" />
								</div>
								<div>
									<label for="shipping_state" class="mb-2 block text-sm font-medium text-slate-700">State</label>
									<select id="shipping_state" name="shipping_state" class="shipping-input w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30">
										<option value="">Select State</option>
										<option value="AL">Alabama</option>
										<option value="AK">Alaska</option>
										<option value="AZ">Arizona</option>
										<option value="AR">Arkansas</option>
										<option value="CA">California</option>
										<option value="CO">Colorado</option>
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="DC">District of Columbia</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="HI">Hawaii</option>
										<option value="ID">Idaho</option>
										<option value="IL">Illinois</option>
										<option value="IN">Indiana</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NV">Nevada</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NM">New Mexico</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="ND">North Dakota</option>
										<option value="OH">Ohio</option>
										<option value="OK">Oklahoma</option>
										<option value="OR">Oregon</option>
										<option value="PA">Pennsylvania</option>
										<option value="PR">Puerto Rico</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="SD">South Dakota</option>
										<option value="TN">Tennessee</option>
										<option value="TX">Texas</option>
										<option value="UT">Utah</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WA">Washington</option>
										<option value="WV">West Virginia</option>
										<option value="WI">Wisconsin</option>
										<option value="WY">Wyoming</option>
									</select>
								</div>
								<div class="sm:col-span-2">
									<label for="shipping_zipcode" class="mb-2 block text-sm font-medium text-slate-700">ZIP Code</label>
									<input id="shipping_zipcode" name="shipping_zipcode" type="text" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="e.g. 90001" class="shipping-input w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" />
								</div>
							</div>
						</div>

						<div>
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Eligibility Details</h3>
							<div class="mt-3 space-y-4">
								<fieldset>
									<legend class="text-sm font-medium text-slate-700">Program Qualification</legend>
									<div class="mt-2 grid gap-3 sm:grid-cols-2">
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100001" class="h-4 w-4" required /> Supplemental Nutrition Assistance Program&nbsp;(SNAP)</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100004" class="h-4 w-4" required /> Medicaid</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100002" class="h-4 w-4" required /> Household Income</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100006" class="h-4 w-4" required /> Supplemental Security Income&nbsp;(SSI)</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100000" class="h-4 w-4" required /> Federal Public Housing Assistance&nbsp;(Section 8)</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100014" class="h-4 w-4" required /> Veteran's Pension or Survivors Benefit&nbsp;Programs</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100011" class="h-4 w-4" required /> Bureau of Indian Affairs General&nbsp;Assistance</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100008" class="h-4 w-4" required /> Tribally-Administered Temporary Assistance for Needy Families&nbsp;(TTANF)</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100010" class="h-4 w-4" required /> Food Distribution Program on Indian Reservations&nbsp;(FDPIR)</label>
										<label class="flex items-center gap-2 rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-700"><input type="radio" name="program" value="100009" class="h-4 w-4" required /> Head Start&nbsp;(if income eligibility criteria are met)</label>
									</div>
								</fieldset>

								<div>
									<label for="contact_method" class="mb-2 block text-sm font-medium text-slate-700">Preferred Contact Method</label>
									<select id="contact_method" name="contact_method" class="w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required>
										<option value="">Select Contact Method</option>
										<option value="phone">Phone Call</option>
										<option value="text">Text Message</option>
										<option value="email">Email</option>
									</select>
								</div>

								<div>
									<label for="phone_type" class="mb-2 block text-sm font-medium text-slate-700">Phone Type</label>
									<select id="phone_type" name="phone_type" class="w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30">
										<option value="Android" selected>Android</option>
										<option value="iPhone">iPhone</option>
									</select>
								</div>
							</div>
						</div>

						<div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy"> Documents </h3>
							<!-- <p class="mt-2 text-sm text-slate-600">Upload both files to continue: one government-issued ID and one proof of program&nbsp;eligibility.</p> -->
							<p class="mt-2 text-sm text-slate-600">Uploading Now will expedite your application</p>

							<div class="mt-4 grid gap-4 sm:grid-cols-2">
								<div>
									<label for="identity_proof_file" class="mb-2 block text-sm font-medium text-slate-700">Government ID</label>
									<input id="identity_proof_file" name="identity_proof_file" type="file" accept=".jpg,.jpeg,.png,.pdf" class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-brand-navy file:px-3 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#02284d]" />
									<p class="mt-1 text-xs text-slate-500">Accepted: JPG, PNG, PDF</p>
									<div id="identity_preview" class="mt-2"></div>
								</div>

								<div>
									<label for="benefit_proof_file" class="mb-2 block text-sm font-medium text-slate-700">Proof of Benefit</label>
									<input id="benefit_proof_file" name="benefit_proof_file" type="file" accept=".jpg,.jpeg,.png,.pdf" class="w-full rounded-md border border-slate-300 bg-white px-3 py-2 text-sm text-slate-700 file:mr-3 file:rounded-md file:border-0 file:bg-brand-navy file:px-3 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#02284d]" />
									<p class="mt-1 text-xs text-slate-500">Accepted: JPG, PNG, PDF</p>
									<div id="benefit_preview" class="mt-2"></div>
								</div>
							</div>
						</div>

						<div class="rounded-lg border border-slate-200 bg-slate-50 p-4">
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Electronic Signature</h3>
							<p class="mt-2 text-sm text-slate-600">By typing your full name, you agree this electronic signature is legally binding for this enrollment&nbsp;request.</p>
							<div class="mt-3">
								<label for="signature_text" class="mb-2 block text-sm font-medium text-slate-700">Type Your Full Name</label>
								<input id="signature_text" name="signature_text" type="text" placeholder="e.g. John A. Smith" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
							</div>
						</div>

						<p class="text-xs text-gray-500">I understand that my information will be used to determine my eligibility through the Lifeline National Verifier or applicable state system.</p>

						<div class="space-y-3 rounded-lg border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700">
							<label class="flex items-start gap-2"><input id="consent_info" name="consent_info" type="checkbox" class="mt-0.5 h-4 w-4" required /> <span>I certify that the information provided is true and&nbsp;accurate.</span></label>
							<label class="flex items-start gap-2"><input id="consent_terms" name="consent_terms" type="checkbox" class="mt-0.5 h-4 w-4" required /> <span>I agree to program terms, conditions, and one benefit per eligible household&nbsp;rules.</span></label>
							<label class="flex items-start gap-2"><input id="fcc_agreement" name="fcc_agreement" type="checkbox" class="mt-0.5 h-4 w-4" required /> <span>Authorized enrollment representatives may assist in submitting your application using the information you provide. These representatives will not modify your information.</span></label>
							<input id="consentdatetime" name="consentdatetime" type="hidden" value="" />
						</div>

						<p class="rounded-md border border-slate-300 bg-slate-50 p-3 text-xs text-slate-700"><strong>By submitting this application, you authorize American Assistance and its authorized representatives to submit your personal information to the Lifeline National Verifier (operated by the Universal Service Administrative Company on behalf of the Federal Communications Commission) to determine your eligibility.</strong></p>
						
						<button type="submit" class="w-full rounded-md bg-brand-navy px-6 py-3 font-semibold text-white transition hover:bg-[#02284d] focus:outline-none focus:ring-2 focus:ring-brand-navy focus:ring-offset-2">
							Submit Application
						</button>

						<p class="text-center text-xs text-gray-500 mt-2">By continuing, you agree to provide your information for Lifeline eligibility determination.</p>
						
						<p id="form-status" class="hidden text-sm font-medium" role="status" aria-live="polite"></p>
					</form>
				</div>
			</div>
		</section>

		<section id="about" class="py-14 sm:py-16">
			<div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
				<div>
					<p class="text-sm font-semibold uppercase tracking-wide text-brand-red">About Our Mission</p>
					<h2 class="mt-2 text-2xl font-bold text-brand-navy sm:text-3xl">Connecting Families to Essential Wireless Service</h2>
					<p class="mt-4 text-slate-600">American Assistance helps eligible households access no-cost phone benefits through Lifeline offerings. Our enrollment process is designed to be simple, secure, and accessible for every&nbsp;applicant.</p>
				</div>
				<div class="rounded-xl border border-slate-200 bg-brand-light p-6">
					<ul class="space-y-4 text-sm text-slate-700">
						<li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-brand-red"></span><span>Transparent eligibility guidance and enrollment&nbsp;support.</span></li>
						<li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-brand-red"></span><span>Reliable nationwide service options tailored to qualifying&nbsp;customers.</span></li>
						<li class="flex items-start gap-3"><span class="mt-1 h-2.5 w-2.5 rounded-full bg-brand-red"></span><span>Commitment to privacy, compliance, and customer-first&nbsp;support.</span></li>
					</ul>
				</div>
			</div>
		</section>

		<section id="plans" class="py-14 sm:py-16">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
				<div class="mx-auto max-w-2xl text-center">
					<h2 class="text-2xl font-bold text-brand-navy sm:text-3xl">Why Choose American Assistance</h2>
					<p class="mt-2 text-slate-600">Trusted connectivity with benefits that keep you connected to family, healthcare, work, and&nbsp;education.</p>
				</div>

				<div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
					<article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
						<div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-brand-light text-brand-navy">
							<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M7 12h10M10 19h4" />
							</svg>
						</div>
						<h3 class="text-lg font-bold text-brand-navy">Unlimited Talk &amp; Text</h3>
						<p class="mt-2 text-sm leading-6 text-slate-600">Stay in touch with loved ones and essential services with unlimited nationwide calling and&nbsp;messaging.</p>
					</article>

					<article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
						<div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-brand-light text-brand-navy">
							<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4-4 4 4 8-8" />
								<path stroke-linecap="round" stroke-linejoin="round" d="M20 12v6H4V6h6" />
							</svg>
						</div>
						<h3 class="text-lg font-bold text-brand-navy">High-Speed Data</h3>
						<p class="mt-2 text-sm leading-6 text-slate-600">Browse the web, access telehealth, and manage daily tasks with reliable high-speed mobile&nbsp;data.</p>
					</article>

					<article class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md sm:col-span-2 lg:col-span-1">
						<div class="mb-4 inline-flex h-12 w-12 items-center justify-center rounded-lg bg-brand-light text-brand-navy">
							<svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
								<rect x="7" y="3" width="10" height="18" rx="2" ry="2"></rect>
								<path stroke-linecap="round" stroke-linejoin="round" d="M11 18h2" />
							</svg>
						</div>
						<h3 class="text-lg font-bold text-brand-navy">Free Wireless Service</h3>
						<p class="mt-2 text-sm leading-6 text-slate-600">Free wireless service provided through the federal Lifeline program, helping eligible households stay connected at no cost.</p>
					</article>
				</div>
			</div>
		</section>
	</main>

<?php include APPROOT . '/views/inc/footer.php'; ?>

	<div id="cookie-banner" class="fixed inset-x-0 bottom-4 z-[60] hidden px-4 sm:px-6 lg:px-8">
		<div class="mx-auto max-w-5xl rounded-2xl border border-slate-200 bg-white/95 p-4 shadow-2xl ring-1 ring-slate-200 backdrop-blur sm:p-5">
			<div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
				<div class="max-w-3xl">
					<p class="text-sm font-semibold uppercase tracking-[0.18em] text-brand-navy">Cookie Notice</p>
					<p class="mt-2 text-sm leading-6 text-slate-600">
						We use cookies and similar technologies to improve site performance, understand traffic, and support your enrollment experience. By continuing, you agree to our
						<a href="<?php echo URLROOT; ?>/pages/privacy" class="font-semibold text-brand-navy underline underline-offset-4 hover:text-brand-red">Privacy Policy</a>
						and
						<a href="<?php echo URLROOT; ?>/pages/terms" class="font-semibold text-brand-navy underline underline-offset-4 hover:text-brand-red">Terms of Service</a>.
					</p>
				</div>
				<div class="flex shrink-0 flex-col gap-2 sm:flex-row">
					<button id="cookie-decline" type="button" class="inline-flex items-center justify-center rounded-md border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
						Close
					</button>
					<button id="cookie-accept" type="button" class="inline-flex items-center justify-center rounded-md bg-brand-red px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-brand-red focus:ring-offset-2">
						Accept Cookies
					</button>
				</div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script>
		const cookieBanner = document.getElementById("cookie-banner");
		const cookieAcceptButton = document.getElementById("cookie-accept");
		const cookieDeclineButton = document.getElementById("cookie-decline");
		const cookieConsentKey = "aa_cookie_consent_v1";
		const menuToggle = document.getElementById("menu-toggle");
		const mobileMenu = document.getElementById("mobile-menu");
		const shippingDifferent = document.getElementById("shipping_different");
		const shippingFields = document.getElementById("shipping-fields");
		const enrollmentForm = document.getElementById("enrollment-form");
		const dobMInput = document.getElementById("dobM");
		const dobDInput = document.getElementById("dobD");
		const dobYInput = document.getElementById("dobY");
		const phoneInput = document.getElementById("phone");
		const ssnInput = document.getElementById("ssn");
		const zipcodeInput = document.getElementById("zipcode");
		const shippingZipcodeInput = document.getElementById("shipping_zipcode");
		const consentTermsCheckbox = document.getElementById("consent_terms");
		const consentDateTimeInput = document.getElementById("consentdatetime");
		const formStatus = document.getElementById("form-status");
		const identityProofFileInput = document.getElementById("identity_proof_file");
		const benefitProofFileInput = document.getElementById("benefit_proof_file");
		const identityPreview = document.getElementById("identity_preview");
		const benefitPreview = document.getElementById("benefit_preview");
		const leadPageUrlParams = <?php echo json_encode(isset($data['lead']['page_url_params']) ? (string) $data['lead']['page_url_params'] : ""); ?>;
		let identityProofBase64 = "";
		let benefitProofBase64 = "";
		let syncShippingFields = function () {};

		const keepOnlyDigits = function (value, maxLength) {
			return String(value || "").replace(/\D/g, "").slice(0, maxLength);
		};

		const formatPhoneMask = function (value) {
			const digits = keepOnlyDigits(value, 10);
			if (digits.length <= 3) {
				return digits.length ? "(" + digits : "";
			}

			if (digits.length <= 6) {
				return "(" + digits.slice(0, 3) + ") " + digits.slice(3);
			}

			return "(" + digits.slice(0, 3) + ") " + digits.slice(3, 6) + "-" + digits.slice(6);
		};

		const isValidDobParts = function (monthValue, dayValue, yearValue) {
			if (!/^\d{2}$/.test(monthValue) || !/^\d{2}$/.test(dayValue) || !/^\d{4}$/.test(yearValue)) {
				return false;
			}

			const month = Number(monthValue);
			const day = Number(dayValue);
			const year = Number(yearValue);
			const dobDate = new Date(year, month - 1, day);

			if (
				dobDate.getFullYear() !== year ||
				dobDate.getMonth() !== month - 1 ||
				dobDate.getDate() !== day
			) {
				return false;
			}

			const today = new Date();
			today.setHours(0, 0, 0, 0);
			dobDate.setHours(0, 0, 0, 0);

			return dobDate <= today;
		};

		const getCurrentDateTime = function () {
			const now = new Date();
			const pad = function (value) {
				return String(value).padStart(2, "0");
			};

			return now.getFullYear() + "-" + pad(now.getMonth() + 1) + "-" + pad(now.getDate()) + " " + pad(now.getHours()) + ":" + pad(now.getMinutes()) + ":" + pad(now.getSeconds());
		};

		const setFormStatus = function (message, isError) {
			if (!formStatus) {
				return;
			}

			formStatus.textContent = message;
			formStatus.classList.remove("hidden", "text-red-600", "text-emerald-700");
			formStatus.classList.add(isError ? "text-red-600" : "text-emerald-700");
		};

		const clearFormStatus = function () {
			if (!formStatus) {
				return;
			}

			formStatus.textContent = "";
			formStatus.classList.add("hidden");
		};

		const getCurrentPageUrlWithLeadParams = function () {
			const currentUrl = window.location.href;
			const extraParamsRaw = String(leadPageUrlParams || "").replace(/^\?+/, "").trim();

			if (!extraParamsRaw) {
				return currentUrl;
			}

			try {
				const url = new URL(currentUrl, window.location.origin);
				const extraParams = new URLSearchParams(extraParamsRaw);

				extraParams.forEach(function (value, key) {
					if (!url.searchParams.has(key)) {
						url.searchParams.append(key, value);
					}
				});

				return url.toString();
			} catch (error) {
				const separator = currentUrl.indexOf("?") === -1 ? "?" : "&";
				return currentUrl + separator + extraParamsRaw;
			}
		};

		const hideCookieBanner = function () {
			if (!cookieBanner) {
				return;
			}

			cookieBanner.classList.add("hidden");
		};

		const persistCookieConsent = function () {
			try {
				window.localStorage.setItem(cookieConsentKey, "accepted");
			} catch (error) {
				// Ignore storage failures and just hide the banner for the current page load.
			}

			hideCookieBanner();
		};

		const setDocumentPreview = function (previewNode, file, base64Value, inputNode, clearCallback) {
			if (!previewNode) {
				return;
			}

			previewNode.innerHTML = "";

			if (file.type.startsWith("image/")) {
				const image = document.createElement("img");
				image.src = base64Value;
				image.alt = file.name;
				image.className = "mb-2 max-h-32 rounded-md border border-slate-300 p-1";
				previewNode.appendChild(image);
			} else {
				const text = document.createElement("p");
				text.className = "mb-2 rounded-md bg-slate-100 px-2 py-1 text-xs text-slate-700";
				text.textContent = "PDF selected: " + file.name;
				previewNode.appendChild(text);
			}

			const removeButton = document.createElement("button");
			removeButton.type = "button";
			removeButton.className = "rounded-md bg-red-600 px-3 py-1 text-xs font-semibold text-white hover:bg-red-700";
			removeButton.textContent = "Remove";
			removeButton.addEventListener("click", function () {
				inputNode.value = "";
				previewNode.innerHTML = "";
				clearCallback();
			});
			previewNode.appendChild(removeButton);
		};

		const toCompressedBase64 = function (file) {
			return new Promise(function (resolve, reject) {
				const reader = new FileReader();

				if (file.type.startsWith("image/")) {
					reader.onload = function (event) {
						const img = new Image();
						img.onload = function () {
							const maxWidth = 800;
							const scale = maxWidth / img.width;
							const canvas = document.createElement("canvas");
							canvas.width = maxWidth;
							canvas.height = img.height * scale;
							const ctx = canvas.getContext("2d");
							ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
							resolve(canvas.toDataURL("image/jpeg", 0.7));
						};
						img.onerror = reject;
						img.src = event.target.result;
					};
					reader.onerror = reject;
					reader.readAsDataURL(file);
					return;
				}

				reader.onload = function (event) {
					resolve(event.target.result);
				};
				reader.onerror = reject;
				reader.readAsDataURL(file);
			});
		};

		if (identityProofFileInput) {
			identityProofFileInput.addEventListener("change", function () {
				const file = identityProofFileInput.files && identityProofFileInput.files[0];
				if (!file) {
					identityProofBase64 = "";
					if (identityPreview) {
						identityPreview.innerHTML = "";
					}
					return;
				}

				toCompressedBase64(file)
					.then(function (base64Value) {
						identityProofBase64 = base64Value;
						setDocumentPreview(identityPreview, file, base64Value, identityProofFileInput, function () {
							identityProofBase64 = "";
						});
					})
					.catch(function () {
						identityProofBase64 = "";
						setFormStatus("Could not process Government ID file.", true);
					});
			});
		}

		if (benefitProofFileInput) {
			benefitProofFileInput.addEventListener("change", function () {
				const file = benefitProofFileInput.files && benefitProofFileInput.files[0];
				if (!file) {
					benefitProofBase64 = "";
					if (benefitPreview) {
						benefitPreview.innerHTML = "";
					}
					return;
				}

				toCompressedBase64(file)
					.then(function (base64Value) {
						benefitProofBase64 = base64Value;
						setDocumentPreview(benefitPreview, file, base64Value, benefitProofFileInput, function () {
							benefitProofBase64 = "";
						});
					})
					.catch(function () {
						benefitProofBase64 = "";
						setFormStatus("Could not process Proof of Benefit file.", true);
					});
			});
		}

		if (cookieBanner) {
			let hasCookieConsent = false;

			try {
				hasCookieConsent = window.localStorage.getItem(cookieConsentKey) === "accepted";
			} catch (error) {
				hasCookieConsent = false;
			}

			if (!hasCookieConsent) {
				cookieBanner.classList.remove("hidden");
			}

			if (cookieAcceptButton) {
				cookieAcceptButton.addEventListener("click", persistCookieConsent);
			}

			if (cookieDeclineButton) {
				cookieDeclineButton.addEventListener("click", hideCookieBanner);
			}
		}

		if (menuToggle && mobileMenu) {
			menuToggle.addEventListener("click", function () {
				const expanded = menuToggle.getAttribute("aria-expanded") === "true";
				menuToggle.setAttribute("aria-expanded", String(!expanded));
				mobileMenu.classList.toggle("hidden");
			});
		}

		if (phoneInput) {
			phoneInput.addEventListener("input", function () {
				phoneInput.value = formatPhoneMask(phoneInput.value);
			});
		}

		if (dobMInput) {
			dobMInput.addEventListener("input", function () {
				dobMInput.value = keepOnlyDigits(dobMInput.value, 2);
			});
		}

		if (dobDInput) {
			dobDInput.addEventListener("input", function () {
				dobDInput.value = keepOnlyDigits(dobDInput.value, 2);
			});
		}

		if (dobYInput) {
			dobYInput.addEventListener("input", function () {
				dobYInput.value = keepOnlyDigits(dobYInput.value, 4);
			});
		}

		if (ssnInput) {
			ssnInput.addEventListener("input", function () {
				ssnInput.value = keepOnlyDigits(ssnInput.value, 4);
			});
		}

		if (zipcodeInput) {
			zipcodeInput.addEventListener("input", function () {
				zipcodeInput.value = keepOnlyDigits(zipcodeInput.value, 5);
			});
		}

		if (shippingZipcodeInput) {
			shippingZipcodeInput.addEventListener("input", function () {
				shippingZipcodeInput.value = keepOnlyDigits(shippingZipcodeInput.value, 5);
			});
		}

		if (shippingDifferent && shippingFields) {
			const shippingInputs = shippingFields.querySelectorAll(".shipping-input");

			syncShippingFields = function () {
				const shouldShow = shippingDifferent.checked;
				shippingFields.classList.toggle("hidden", !shouldShow);

				shippingInputs.forEach(function (input) {
					if (input.id !== "shipping_address2") {
						input.required = shouldShow;
					} else {
						input.required = false;
					}

					if (!shouldShow) {
						input.value = "";
					}
				});

				if (!shouldShow && window.jQuery) {
					window.jQuery("#shipping-fields label.error").remove();
					window.jQuery(shippingInputs).removeClass("border-red-500 ring-1 ring-red-300");
				}
			};

			shippingDifferent.addEventListener("change", syncShippingFields);
			syncShippingFields();
		}

		if (consentTermsCheckbox && consentDateTimeInput) {
			consentTermsCheckbox.addEventListener("change", function () {
				if (consentTermsCheckbox.checked) {
					consentDateTimeInput.value = getCurrentDateTime();
				} else {
					consentDateTimeInput.value = "";
				}
			});
		}

		if (window.jQuery && enrollmentForm) {
			const $enrollmentForm = window.jQuery("#enrollment-form");

			window.jQuery.validator.addMethod("phoneUS", function (value, element) {
				const digits = (value || "").replace(/\D/g, "");
				return this.optional(element) || digits.length === 10;
			}, "Please enter a valid 10-digit phone number.");

			window.jQuery.validator.addMethod("dobPartsUS", function () {
				const month = String(window.jQuery("#dobM").val() || "").trim();
				const day = String(window.jQuery("#dobD").val() || "").trim();
				const year = String(window.jQuery("#dobY").val() || "").trim();
				return isValidDobParts(month, day, year);
			}, "Please enter a valid date of birth.");

			const validator = $enrollmentForm.validate({
				ignore: ":hidden",
				errorElement: "label",
				errorClass: "error mt-1 block text-xs font-medium text-red-600",
				rules: {
					first_name: { required: true, minlength: 2 },
					last_name: { required: true, minlength: 2 },
					dobM: { required: true, digits: true, minlength: 2, maxlength: 2, range: [1, 12] },
					dobD: { required: true, digits: true, minlength: 2, maxlength: 2, range: [1, 31] },
					dobY: { required: true, digits: true, minlength: 4, maxlength: 4, dobPartsUS: true },
					phone: { required: true, phoneUS: true },
						ssn: { required: true, digits: true, minlength: 4, maxlength: 4 },
					email: { required: true, email: true },
					address1: { required: true },
					city: { required: true },
					state: { required: true },
					zipcode: { required: true, digits: true, minlength: 5, maxlength: 5 },
					shipping_address1: {
						required: {
							depends: function () {
								return !!(shippingDifferent && shippingDifferent.checked);
							}
						}
					},
					shipping_city: {
						required: {
							depends: function () {
								return !!(shippingDifferent && shippingDifferent.checked);
							}
						}
					},
					shipping_state: {
						required: {
							depends: function () {
								return !!(shippingDifferent && shippingDifferent.checked);
							}
						}
					},
					shipping_zipcode: {
						required: {
							depends: function () {
								return !!(shippingDifferent && shippingDifferent.checked);
							}
						},
						digits: true,
						minlength: 5,
						maxlength: 5
					},
					program: { required: true },
					contact_method: { required: true },
						signature_text: { required: true, minlength: 3 },
					consent_info: { required: true },
					consent_terms: { required: true },
					fcc_agreement: { required: true }
				},
				messages: {
					first_name: "Please enter your first name.",
					last_name: "Please enter your last name.",
					dobM: {
						required: "Enter month (MM).",
						digits: "Month must be numbers only.",
						minlength: "Month must be 2 digits.",
						maxlength: "Month must be 2 digits.",
						range: "Month must be between 01 and 12."
					},
					dobD: {
						required: "Enter day (DD).",
						digits: "Day must be numbers only.",
						minlength: "Day must be 2 digits.",
						maxlength: "Day must be 2 digits.",
						range: "Day must be between 01 and 31."
					},
					dobY: {
						required: "Enter year (YYYY).",
						digits: "Year must be numbers only.",
						minlength: "Year must be 4 digits.",
						maxlength: "Year must be 4 digits.",
						dobPartsUS: "Please enter a valid date of birth."
					},
					phone: "Please enter a valid 10-digit phone number.",
						ssn: {
							required: "Please enter the last 4 digits of your SSN.",
							digits: "SSN must contain numbers only.",
							minlength: "SSN must be 4 digits.",
							maxlength: "SSN must be 4 digits."
						},
					email: "Please enter a valid email address.",
					address1: "Please enter your service address.",
					city: "Please enter your city.",
					state: "Please select your state.",
					zipcode: {
						required: "Please enter your ZIP code.",
						digits: "ZIP code must contain numbers only.",
						minlength: "ZIP code must be 5 digits.",
						maxlength: "ZIP code must be 5 digits."
					},
					shipping_address1: "Please enter your shipping street address.",
					shipping_city: "Please enter your shipping city.",
					shipping_state: "Please select your shipping state.",
					shipping_zipcode: {
						required: "Please enter your shipping ZIP code.",
						digits: "Shipping ZIP code must contain numbers only.",
						minlength: "Shipping ZIP code must be 5 digits.",
						maxlength: "Shipping ZIP code must be 5 digits."
					},
					program: "Please select your program qualification.",
					contact_method: "Please select your preferred contact method.",
					signature_text: "Please type your full name as your electronic signature.",
					consent_info: "You must certify that your information is accurate.",
					consent_terms: "You must agree to the terms and conditions.",
					fcc_agreement: "You must acknowledge the representative authorization."
				},
				highlight: function (element) {
					window.jQuery(element).addClass("border-red-500 ring-1 ring-red-300");
				},
				unhighlight: function (element) {
					window.jQuery(element).removeClass("border-red-500 ring-1 ring-red-300");
				},
				errorPlacement: function (error, element) {
					if (element.attr("name") === "program") {
						error.insertAfter(element.closest("fieldset").find("div").last());
						return;
					}

					if (element.attr("type") === "checkbox") {
						error.insertAfter(element.closest("label"));
						return;
					}

					error.insertAfter(element);
				},
				submitHandler: function (form, event) {
					if (event) {
						event.preventDefault();
					}

					clearFormStatus();

					const submitButton = form.querySelector('button[type="submit"]');
					const originalButtonLabel = submitButton ? submitButton.textContent : "";
					const formData = new FormData(form);

					formData.set("current_page_url", getCurrentPageUrlWithLeadParams());
					formData.set("shipping_different", shippingDifferent && shippingDifferent.checked ? "1" : "0");
					formData.set("consent_info", document.getElementById("consent_info").checked ? "1" : "0");
					formData.set("consent_terms", document.getElementById("consent_terms").checked ? "1" : "0");
					formData.set("fcc_agreement", document.getElementById("fcc_agreement").checked ? "1" : "0");
					formData.set(
						"dob",
						String(formData.get("dobM") || "").padStart(2, "0") + "/" +
						String(formData.get("dobD") || "").padStart(2, "0") + "/" +
						String(formData.get("dobY") || "")
					);
					formData.set("identity_proof", identityProofBase64);
					formData.set("benefit_proof", benefitProofBase64);
					if (consentTermsCheckbox && consentDateTimeInput && consentTermsCheckbox.checked && !consentDateTimeInput.value) {
						consentDateTimeInput.value = getCurrentDateTime();
					}
					formData.set("consentdatetime", consentDateTimeInput ? consentDateTimeInput.value : "");

					if (submitButton) {
						submitButton.disabled = true;
						submitButton.textContent = "Submitting...";
					}

					fetch(form.getAttribute("action"), {
						method: "POST",
						body: formData,
						headers: {
							"X-Requested-With": "XMLHttpRequest"
						}
					})
						.then(function (response) {
							return response.json()
								.catch(function () {
									return {
										success: false,
										message: "Unexpected server response."
									};
								})
								.then(function (data) {
									if (!response.ok || !data.success) {
										throw {
											message: data.message || "Unable to submit your enrollment request.",
											errors: data.errors || {}
										};
									}

									return data;
								});
						})
						.then(function (data) {
							if (!data.customer_id) {
								throw {
									message: "Enrollment was saved but customer id was not returned."
								};
							}

							setFormStatus("Information saved. Submitting order to carrier...", false);

							const ambtBody = new URLSearchParams();
							ambtBody.append("customer_id", data.customer_id);

							return fetch("<?php echo URLROOT; ?>/enrolls/submitAmbtOrder", {
								method: "POST",
								headers: {
									"Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
									"X-Requested-With": "XMLHttpRequest"
								},
								body: ambtBody.toString()
							})
								.then(function (response) {
									return response.json()
										.catch(function () {
											return {
												success: false,
												message: "Unexpected carrier API response."
											};
										})
										.then(function (apiData) {
											if (!response.ok || !apiData.success) {
												throw {
													message: apiData.message || "Saved locally, but failed to submit order to carrier."
												};
											}

											return {
												landingData: data,
												apiData: apiData
											};
										});
								});
						})
						.then(function (result) {
							setFormStatus(result.apiData.message || "Enrollment submitted successfully.", false);

							const redirectUrl = result.landingData.redirect_url || "<?php echo URLROOT; ?>/pages/thankyou";
							window.location.assign(redirectUrl);
						})
						.catch(function (error) {
							if (error && error.errors && Object.keys(error.errors).length > 0) {
								validator.showErrors(error.errors);
							}

							setFormStatus(error.message || "Unable to submit your enrollment request.", true);
						})
						.then(function (result) {
							if (submitButton) {
								submitButton.disabled = false;
								submitButton.textContent = originalButtonLabel;
							}
						});
					return false;
				}
			});

			window.jQuery("#shipping_different").on("change", function () {
				window.jQuery("#shipping_address1, #shipping_city, #shipping_state, #shipping_zipcode").each(function () {
					window.jQuery(this).valid();
				});
			});
		}
	</script>
</body>
</html>
