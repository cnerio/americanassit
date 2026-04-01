<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>American Assist | Free Government Phone Services</title>
	<meta name="description" content="Apply for Lifeline and ACP-supported wireless plans with free phone service, unlimited talk and text, and high-speed data." />

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
</head>
<body class="bg-white text-slate-800 antialiased">
	<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:left-3 focus:top-3 focus:z-50 focus:rounded-md focus:bg-white focus:px-3 focus:py-2 focus:text-brand-navy focus:shadow">
		Skip to main content
	</a>

	<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/95 backdrop-blur">
		<div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
			<a href="#" class="flex items-center gap-3" aria-label="American Assist Home">
				<!-- <div class="flex h-11 items-center justify-center rounded-md bg-brand-navy text-sm font-bold tracking-wide text-white">
					
				</div> -->
				<img src="<?php echo URLROOT; ?>/public/img/AALogo.png" alt="American Assist" class="h-10 w-auto sm:h-11" />
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
							Lifeline + ACP Support
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
						<div>
							<h3 class="text-sm font-semibold uppercase tracking-wide text-brand-navy">Applicant Information</h3>
							<div class="mt-3 grid gap-4 sm:grid-cols-2">
								<div>
									<label for="first_name" class="mb-2 block text-sm font-medium text-slate-700">First Name</label>
									<input id="first_name" name="first_name" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div>
									<label for="last_name" class="mb-2 block text-sm font-medium text-slate-700">Last Name</label>
									<input id="last_name" name="last_name" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div>
									<label for="dob" class="mb-2 block text-sm font-medium text-slate-700">Date of Birth</label>
									<input id="dob" name="dob" type="date" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
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
									<input id="email" name="email" type="email" placeholder="name@example.com" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
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
									<input id="city" name="city" type="text" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
								</div>
								<div>
									<label for="state" class="mb-2 block text-sm font-medium text-slate-700">State</label>
									<select id="state" name="state" class="w-full rounded-md border border-slate-300 bg-white px-4 py-3 text-slate-900 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required>
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
									<label for="zipcode" class="mb-2 block text-sm font-medium text-slate-700">ZIP Code</label>
									<input id="zipcode" name="zipcode" type="text" inputmode="numeric" pattern="[0-9]{5}" maxlength="5" placeholder="e.g. 90001" class="w-full rounded-md border border-slate-300 px-4 py-3 text-slate-900 placeholder-slate-400 focus:border-brand-navy focus:outline-none focus:ring-2 focus:ring-brand-navy/30" required />
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

						<div class="space-y-3 rounded-lg border border-slate-200 bg-slate-50 p-4 text-sm text-slate-700">
							<label class="flex items-start gap-2"><input id="consent_info" name="consent_info" type="checkbox" class="mt-0.5 h-4 w-4" required /> <span>I certify that the information provided is true and&nbsp;accurate.</span></label>
							<label class="flex items-start gap-2"><input id="consent_terms" name="consent_terms" type="checkbox" class="mt-0.5 h-4 w-4" required /> <span>I agree to program terms, conditions, and one benefit per eligible household&nbsp;rules.</span></label>
							<input id="consentdatetime" name="consentdatetime" type="hidden" value="" />
						</div>

						<button type="submit" class="w-full rounded-md bg-brand-navy px-6 py-3 font-semibold text-white transition hover:bg-[#02284d] focus:outline-none focus:ring-2 focus:ring-brand-navy focus:ring-offset-2">
							Submit Enrollment Request
						</button>
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
					<p class="mt-4 text-slate-600">American Assistance helps eligible households access no-cost phone benefits through Lifeline and ACP-supported offerings. Our enrollment process is designed to be simple, secure, and accessible for every&nbsp;applicant.</p>
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
						<h3 class="text-lg font-bold text-brand-navy">Free SIM Card</h3>
						<p class="mt-2 text-sm leading-6 text-slate-600">Quick activation with a no-cost SIM card and simple setup instructions to get started right&nbsp;away.</p>
					</article>
				</div>
			</div>
		</section>
	</main>

	<footer id="contact" class="bg-brand-navy text-slate-100">
		<div class="mx-auto grid max-w-7xl gap-10 px-4 py-12 sm:px-6 lg:grid-cols-4 lg:px-8">
			<div>
				<h3 class="text-lg font-bold text-white">American Assistance</h3>
				<p class="mt-3 text-sm leading-6 text-slate-300">Reliable telecommunications access for qualified households through federally supported social&nbsp;programs.</p>
			</div>

			<div>
				<h4 class="text-sm font-semibold uppercase tracking-wide text-white">Site Links</h4>
				<ul class="mt-3 space-y-2 text-sm text-slate-300">
					<li><a href="#" class="hover:text-white">Home</a></li>
					<li><a href="#about" class="hover:text-white">About Us</a></li>
					<li><a href="#plans" class="hover:text-white">Plans</a></li>
					<li><a href="#eligibility" class="hover:text-white">Apply Now</a></li>
				</ul>
			</div>

			<div>
				<h4 class="text-sm font-semibold uppercase tracking-wide text-white">Contact</h4>
				<ul class="mt-3 space-y-2 text-sm text-slate-300">
					<li>Phone: (800) 555-0142</li>
					<li>Email: support@americanassistance.net</li>
					<li>Hours: Mon-Fri, 9:00 AM-6:00 PM</li>
				</ul>
			</div>

			<div>
				<h4 class="text-sm font-semibold uppercase tracking-wide text-white">Follow Us</h4>
				<div class="mt-3 flex items-center gap-3">
					<a href="#" aria-label="Facebook" class="rounded-md bg-white/10 p-2 transition hover:bg-white/20">
						<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M13 9h3V6h-3c-2.2 0-4 1.8-4 4v2H7v3h2v6h3v-6h3l1-3h-4v-2c0-.6.4-1 1-1z" /></svg>
					</a>
					<a href="#" aria-label="Instagram" class="rounded-md bg-white/10 p-2 transition hover:bg-white/20">
						<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M7 2h10a5 5 0 015 5v10a5 5 0 01-5 5H7a5 5 0 01-5-5V7a5 5 0 015-5zm0 2a3 3 0 00-3 3v10a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H7zm5 3.5A5.5 5.5 0 1112 19a5.5 5.5 0 010-11.5zm0 2A3.5 3.5 0 1012 17a3.5 3.5 0 000-7zm6-2.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z" /></svg>
					</a>
					<a href="#" aria-label="X (Twitter)" class="rounded-md bg-white/10 p-2 transition hover:bg-white/20">
						<svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M18.9 2H22l-6.8 7.8L23 22h-6.7l-5.2-6.8L5.2 22H2l7.3-8.3L1 2h6.8l4.7 6.2L18.9 2zm-2.3 18h1.9L7.1 3.9H5.1L16.6 20z" /></svg>
					</a>
				</div>
			</div>
		</div>

		<div class="border-t border-white/15">
			<div class="mx-auto max-w-7xl px-4 py-6 text-xs leading-6 text-slate-300 sm:px-6 lg:px-8">
				<p>Lifeline is a government assistance program. Eligibility is determined by federal or state criteria. Service is non-transferable, and only one discount is available per household. Terms and conditions apply.</p>
				<p class="mt-2">&copy; 2026 American Assistance. All rights reserved.</p>
			</div>
		</div>
	</footer>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
	<script>
		const menuToggle = document.getElementById("menu-toggle");
		const mobileMenu = document.getElementById("mobile-menu");
		const shippingDifferent = document.getElementById("shipping_different");
		const shippingFields = document.getElementById("shipping-fields");
		const enrollmentForm = document.getElementById("enrollment-form");
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

			const validator = $enrollmentForm.validate({
				ignore: ":hidden",
				errorElement: "label",
				errorClass: "error mt-1 block text-xs font-medium text-red-600",
				rules: {
					first_name: { required: true, minlength: 2 },
					last_name: { required: true, minlength: 2 },
					dob: { required: true },
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
					consent_terms: { required: true }
				},
				messages: {
					first_name: "Please enter your first name.",
					last_name: "Please enter your last name.",
					dob: "Please select your date of birth.",
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
					consent_terms: "You must agree to the terms and conditions."
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

					formData.set("current_page_url", window.location.href);
					formData.set("shipping_different", shippingDifferent && shippingDifferent.checked ? "1" : "0");
					formData.set("consent_info", document.getElementById("consent_info").checked ? "1" : "0");
					formData.set("consent_terms", document.getElementById("consent_terms").checked ? "1" : "0");
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

							const customerId = result.apiData.customer_id || result.landingData.customer_id;
							const redirectUrl = customerId
								? "<?php echo URLROOT; ?>/pages/thankyou/" + encodeURIComponent(customerId)
								: (result.landingData.redirect_url || "<?php echo URLROOT; ?>/pages/thankyou");
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
