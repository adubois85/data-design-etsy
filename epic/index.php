<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>A Lesson in Data Design</title>
	</head>
	<body>
		<h1>Persona</h1>
			<p>
				Elaine Atwood is a 21 year-old computer science undergraduate at the University of California, Los
				Angeles.  While she doesn't have as much time these days to devote to it, since she was a little girl,
				she has been making jewelry as gifts for friends and family.  Both to keep in practice and to bring in a
				little extra money for those long nights in the coffee shop finishing projects, she wants a quick and
				simple way to sell what she creates.
			</p>
			<p>
				Her main method of staying connected with the world is her previous model-year 13" Macbook Pro.  However,
				she also has an iPhone 7 that she mostly uses for checking on the status of her friends, sending quick
				messages, and taking photographs.  School keeps her quite busy these days, so she doesn't have much free
				time, and much of that goes to her jewelry-making hobby.  She want things to just work so she doesn't
				have to waste her valuable time troubleshooting issues.
			</p>
			<p>
				Her goal with using this site is quite simple: she wants to be able quickly and easily list for sale items
				that she has made.  Then, when those items sell, she wants the profits from the sale to be securely
				transferred into her bank account.
			</p>
		<h1>Use Case</h1>
			<p>
				Elaine finished a new piece a few weeks back, but hasn't had the time or attention to spare to sell it as
				the past few weeks have been hectic with projects at school.  In the scant free time she has had, she
				wrote a description for the item and began planning her next piece.
			</p>
			<p>
				Finally, she has completed her midterms and has a brief respite before her classes start to load up her
				schedule again.  Tonight she will be meeting with her friends for some drinks to commiserate about their
				respective classes and tests.
			</p>
			<p>
				She wants to quickly post the item she made to the website so she has time to get ready for the evening
				ahead.  Furthermore, since it is likely to be sold after her classes start up again in earnest, she
				doesn't want to have to deal with all of the back-end minutia (such as payment processing); simply, she
				wants to sell the item, put a name an address on a box, and then send it.
			</p>

		<h1>Interaction Flow</h1>
			<header>Elaine wishes to sell an item on the site.</header>
				<h2>Logging in</h2>
				<ol>
					<li>Elaine enters the url of the site in her preferred browser.</li>
					<li>The website delivers its homepage to her browser, which it loads.</li>
					<li>Elaine clicks on the sign in button and enters her credentials into the fields.</li>
					<li>The website checks her credentials against those on file.</li>
					<li>When it sees the correct information, it sends her phone a two-factor authentication code and
						her browser a page requesting she enter the code.</li>
					<li>Elaine checks her phone for the code and enters it into the box in her browser.</li>
					<li>The website again checks that code entered is correct, then returns her personal profile page.</li>
				</ol>

				<h2>Listing an item for sale</h2>
				<ol>
					<li>From her profile page, she navigates to the button for a new listing and clicks it.</li>
					<li>The server processes her request and returns a listing page with blank fields.</li>
					<li>Elaine switches over to a text editor where she had prepared the items description previously
						.</li>
					<li>She selects all of the text, copies it to her clipboard, switches back to the website page.</li>
					<li>She focuses the text box for the main item description, then pastes the text in.</li>
					<li>Elaine clicks on the button to add photographs to her listing.</li>
					<li>The browser interprets this request and brings up a file system prompt for selecting a
						photograph on her computer's hard drive.</li>
					<li>Elaine navigates her computer's file system until she finds the photos she wants to list,
						highlights the first one, then selects it.</li>
					<li>The browser closes the prompt and instructs the server to begin uploading the file Elaine had
						selected.</li>
					<li>Elaine repeats the previous four steps as needed until she has either uploaded all of the
						photographs she wishes to use for this listing or hits a limit on the size or number of files
						imposed by the server.</li>
					<li>Elaine completes her item listing by choosing options from drop-down lists, checkboxes, radio
						buttons, and form fields about her item (e.g. number of items, price).</li>
					<li>With all necessary fields filled out, the previously greyed out button to list her item is
						now active.</li>
					<li>Eliane clicks on the button to list her item.</li>
					<li>The browser sends the information of the various fields to the server.</li>
					<li>The server creates an entry for a new listing.</li>
					<li>The server then popultates that entry with attributes according to the information uploaded
						in the various fields.</li>
					<li>When it completes the entry in the database, it returns Elaine's personal profile page along
						with a message that the item was successfully listed.</li>
					<li>The brower displays Elains personal profile page with a small pop-up that indicates a
						successful posting.</li>
					<li>Elaine may now click the button to log out, continue browsing the website for other items she
						may be interested in, or click on the new listing button to start this process over again.</li>
				</ol>

		<h1>Conceptual Model</h1>
			<h2>Types of relations and their use in our example</h2>
				<h3>Profile</h3>
				<ul>
					<li>profileId (primary key)</li>
					<li>profileAtHandle</li>
					<li>profilePhoneNumber</li>
					<li>profileEmail</li>
					<li>profileHash (password)</li>
					<li>profileSalt(password)</li>
				</ul>
				<h3>Listing</h3>
				<ul>
					<li>listingId (primary key)</li>
					<li>listingProfileId (foreign key)</li>
					<li>listingContent</li>
					<li>listingDate</li>
					<li>listingNumberOfItems</li>
				</ul>
				<h3>Photos</h3>
				<ul>
					<li>photoListingId (foreign key)</li>
					<li>photoProfileId (foreign key)</li>
					<li>photoDate</li>
				</ul>
			<h2>Relations</h2>
				<ul>
					<li>one <em>Profile</em> may have many <em>Listings</em>. (1-to-n)</li>
					<li>one <em>Listing</em> may have many <em>Photos</em>. (1-to-n)</li>
					<li>many <em>Profiles</em> may buy many <em>Listings</em>. (m-to-n)</li>
				</ul>
	</body>
</html>