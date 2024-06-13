	// Get all the sidebar items
	const links = document.querySelectorAll('a[href^="#"]');

	links.forEach(link => {
		link.addEventListener('click', function (e) {
			e.preventDefault();

			const target = document.querySelector(this.getAttribute('href'));
			const offset = target.offsetTop;

			window.scrollTo({
				top: offset,
				behavior: 'smooth'
			});
		});
	});

	// SIDEBAR DROPDOWN
	const allDropdown = document.querySelectorAll('#sidebar .side-dropdown');
	const sidebar = document.getElementById('sidebar');

	allDropdown.forEach(item=> {
		const a = item.parentElement.querySelector('a:first-child');
	a.addEventListener('click', function (e) {
		e.preventDefault();

	if(!this.classList.contains('active')) {
		allDropdown.forEach(i => {
			const aLink = i.parentElement.querySelector('a:first-child');

			aLink.classList.remove('active');
			i.classList.remove('show');
		})
	}

	this.classList.toggle('active');
	item.classList.toggle('show');
		})
	})





	// SIDEBAR COLLAPSE
	const toggleSidebar = document.querySelector('nav .toggle-sidebar');
	const allSideDivider = document.querySelectorAll('#sidebar .divider');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item => {
			item.textContent = '-'
		})
		allDropdown.forEach(item=> {
			const a = item.parentElement.querySelector('a:first-child');
	a.classList.remove('active');
	item.classList.remove('show');
		})
	} else {
		allSideDivider.forEach(item => {
			item.textContent = item.dataset.text;
		})
	}

	toggleSidebar.addEventListener('click', function () {
		sidebar.classList.toggle('hide');

	if(sidebar.classList.contains('hide')) {
		allSideDivider.forEach(item => {
			item.textContent = '-'
		})

			allDropdown.forEach(item=> {
				const a = item.parentElement.querySelector('a:first-child');
	a.classList.remove('active');
	item.classList.remove('show');
			})
		} else {
		allSideDivider.forEach(item => {
			item.textContent = item.dataset.text;
		})
	}
	})




	sidebar.addEventListener('mouseleave', function () {
		if(this.classList.contains('hide')) {
		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
			allSideDivider.forEach(item=> {
		item.textContent = '-'
	})
		}
	})



	sidebar.addEventListener('mouseenter', function () {
		if(this.classList.contains('hide')) {
		allDropdown.forEach(item => {
			const a = item.parentElement.querySelector('a:first-child');
			a.classList.remove('active');
			item.classList.remove('show');
		})
			allSideDivider.forEach(item=> {
		item.textContent = item.dataset.text;
			})
		}
	})




	// PROFILE DROPDOWN
	const profile = document.querySelector('nav .profile');
	const imgProfile = profile.querySelector('img');
	const dropdownProfile = profile.querySelector('.profile-link');

	imgProfile.addEventListener('click', function () {
		dropdownProfile.classList.toggle('show');
	})




	// MENU
	const allMenu = document.querySelectorAll('main .content-data .head .menu');

	allMenu.forEach(item=> {
		const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	icon.addEventListener('click', function () {
		menuLink.classList.toggle('show');
		})
	})



	window.addEventListener('click', function (e) {
		if(e.target !== imgProfile) {
			if(e.target !== dropdownProfile) {
				if(dropdownProfile.classList.contains('show')) {
		dropdownProfile.classList.remove('show');
				}
			}
		}

		allMenu.forEach(item=> {
			const icon = item.querySelector('.icon');
	const menuLink = item.querySelector('.menu-link');

	if(e.target !== icon) {
				if(e.target !== menuLink) {
					if (menuLink.classList.contains('show')) {
		menuLink.classList.remove('show')
	}
				}
			}
		})
	})


	// PROGRESSBAR
	const allProgress = document.querySelectorAll('main .card .progress');

	allProgress.forEach(item=> {
		item.style.setProperty('--value', item.dataset.value)
	})


	// Image file upload section


	// Get references to the HTML elements we need
	let fileInput = document.getElementById("file-input");
	let fileList = document.getElementById("files-list");
	let numOfFiles = document.getElementById("num-of-files");
	let categoryInput = document.getElementById("category-input");
	let productNameInput = document.getElementById("product-name-input");
	let colorwayInput = document.getElementById("colorway-input");

	// When the user selects files, do this:
	fileInput.addEventListener("change", () => {
		// Clear the file list and update the number of files selected
		fileList.innerHTML = "";
	numOfFiles.textContent = `${fileInput.files.length} Files Selected`;

		// Check that no more than 4 files have been selected
		if (fileInput.files.length > 4) {
		alert("Please select no more than 4 pictures.");
	// Clear the file input and reset the number of files selected
	fileInput.value = "";
	numOfFiles.textContent = "0 Files Selected";
		} else {
			// Loop through the selected files
			for (let i = 0; i < fileInput.files.length; i++) {
		// Create a new FileReader object and a new list item element
		let reader = new FileReader();
	let listItem = document.createElement("li");

	// Create a unique filename for this file by appending its index to "colorway" and its extension
	let fileName = `${colorwayInput}${i + 1}.${fileInput.files[i].name.split(".").pop()}`;

	// Get the file size in kilobytes and display it in the list item
	let fileSize = (fileInput.files[i].size / 1024).toFixed(1);
	listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}KB</p>`;

				// If the file is larger than 1 MB, convert the file size to megabytes and update the display
				if (fileSize >= 1024) {
		fileSize = (fileSize / 1024).toFixed(1);
	listItem.innerHTML = `<p>${fileName}</p><p>${fileSize}MB</p>`;
				}

	// Add the list item to the file list
	fileList.appendChild(listItem);

	// Construct the file path for this file based on the selected category, product name, colorway, and filename
	let category = categoryInput.value;
	let productName = productNameInput.value;
	let colorway = colorwayInput.value;
	let filePath = `../img/`;

	// Determine the appropriate subdirectory for the selected category
	if (category === "Mens clothes" || category === "Womens clothes" || category === "Kids clothes") {
		filePath += "clothes/";
				} else if (category === "Mens accessories" || category === "Womens accessories" || category === "Kids accessories") {
		filePath += "accessories/";
				} else if (category === "Shoes") {
		filePath += "shoes/";
				}

	// Determine the appropriate subdirectory for the selected gender and add it to the file path
	if (category === "Mens clothes" || category === "Mens accessories") {
		filePath += "Mens/";
				} else if (category === "Womens clothes" || category === "Womens accessories") {
		filePath += "Womens/";
				} else if (category === "Kids clothes" || category === "Kids accessories") {
		filePath += "Kids/";
				}

	// Add the product name, colorway, and filename to the file path
	filePath += `${productName}/${colorway}/${fileName}`;
	console.log(filePath); // For testing purposes only

	// Add an event listener for the submit button
	document.getElementById("contact-submit").addEventListener("click", function(event) {
		event.preventDefault(); // Prevent the form from submitting

	// Read the file and upload it
	reader.onload = function (event) {
		let imageData = event.target.result;
	let imgElement = document.createElement("img");
	imgElement.src = imageData;
	document.body.appendChild(imgElement);

	// Upload the file
	let formData = new FormData();
	formData.append("file", fileInput.files[i]);

	// Fetches the file path and moves files to there!
	fetch(filePath + fileName, {
		method: "PUT",
		body: formData
					})
					.then(response => {
						if (response.ok) {
							console.log(`File ${fileName} uploaded successfully.`);
						} else {
							console.error(`Error uploading file ${fileName}.`);
						}
					})
					.catch(error => console.error(error));
					};

	// Start reading the file
	reader.readAsDataURL(fileInput.files[i]);
				});
			}
		}
	});