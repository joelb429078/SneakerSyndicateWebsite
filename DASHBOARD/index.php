<?php
	
	session_start();
	require "../connect.php";

	// Check if the session has a SessionUserID value
	if (isset($_SESSION["SessionUserID"])) {

		// Get the userID from the session and escape it for use in the query
		$userID = mysqli_real_escape_string($conn, $_SESSION["SessionUserID"]);

		// Execute the query to check if the user is an admin
		$SQL = "SELECT AdminAccess FROM users WHERE UserID='$userID'";
		$result = mysqli_query($conn, $SQL) or die("Bad Query: $SQL");
		$row = mysqli_fetch_array($result);

		// Check if the user is an admin
		if ($row["AdminAccess"] == 1) {
			// User is an admin, continue with the rest of the code
		} else {
			// User is not an admin, redirect to an error page
			header('Location: ../signpageog.php?/cannotfinduser');
		}

	} else {
		// Session does not have a SessionUserID value, redirect to an error page
		header('Location: index.php?/cannotfinduser');
	}

	if (isset($_GET['error'])) {
		$error = $_GET['error'];
		echo "<div class=\"alert showAlert show\">
				<span class=\"fa-fw fas fa-exclamation-circle\"></span>
				<span class=\"alertmsg\">" . $error . "</span>
				<div class=\"alertclose-btn\">
				<span class=\"fa-fw fas fa-times\"></span>
				</div>
			</div>

			<script>
			// When the X close button is clicked 
			document.querySelectorAll('.alertclose-btn').forEach(function (button) {
				button.addEventListener('click', function () {
				// Remove the parent element of the clicked button
				button.parentElement.remove();
				// Remove the \"show\" class and add the \"hide\" class to the element with the \"alert\" class
				document.querySelectorAll('.alert').forEach(function (alert) {
					alert.classList.remove('show');
					alert.classList.add('hide');
				});
				});
			});
			</script>";
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!--==Using-Font-Awesome-for-Icons=====-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<title>Sneaker Sydnicate - AdminSite</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="../index.php" class="brand"><img src="../img/SneakSyndicateLogo.png"/></a>
		<ul class="side-menu">
			<li><a href="#" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="#finances"><i class='bx bxs-chart icon'></i>Finances</a></li>
			<li><a href="#product-control"><i class='bx bxs-widget icon'></i>Product Control</a></li>
			<li><a href="#recent-sales"><i class='bx bx-table icon'></i>Recent Sales</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
				</div>
			</form>
			<a href="#" class="nav-link">
				<span class="badge"></span>
			</a>
			<a href="#" class="nav-link">
				<span class="badge"></span>
			</a>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="../logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
					<li><a href="../index.php"><i class='bx bxs-home-circle'></i> Home</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>

			<!--calculating finacial and social values-->
			<?php
			// Calculate new orders

			$new_orders = 0;
			$current_month = date('F');

			
			$query = "SELECT COUNT(*) FROM orders WHERE Month = '$current_month'";
			$result = mysqli_query($conn, $query);

			if ($result) {
				$row = mysqli_fetch_row($result);
				$new_orders = $row[0];
			} else {
				$new_orders= "Error";
			}

			mysqli_free_result($result);
			
			// Calculate total earnings and total sales
			$total_earnings = 0;
			$total_sales = 0;

			$result = $conn->query("SELECT TotalPrice FROM orders");

			while ($row = $result->fetch_assoc()) {
				$total_earnings += $row['TotalPrice'];
				$total_sales++;
			}


			?>

			<section id="finances">
				<div class="info-data">
					<div class="card">
						<div class="head">
							<div>
								<h2><?php echo $total_sales; ?></h2>
								<p>Total Sales</p>
							</div>
						</div>
						<span class="progress" data-value="<?php echo sprintf('%0.2f', ($total_sales/2400)*100);?>%"></span>
						<span class="label"><?php echo sprintf("%0.2f", ($total_sales/2400)*100);?>%</span>
					</div>
					<div class="card">
						<div class="head">
							<div>
								<h2>£<?php echo number_format($total_earnings, 2); ?></h2>
								<p>Total Earnings</p>
							</div>
						</div>
						<span class="progress" data-value="<?php echo sprintf("%0.2f",$total_earnings/5000);?>%"></span>
						<span class="label"><?php echo sprintf("%0.2f",$total_earnings/5000);?>%</span>
					</div>
					<div class="card">
						<div class="head">
							<div>
								<h2><?php echo $new_orders; ?></h2>
								<p>New orders</p>
							</div>
						</div>
						<span class="progress" data-value="<?php echo sprintf('%0.2f',$new_orders/5);?>%"></span>
						<span class="label"><?php echo sprintf("%0.2f",$new_orders/5);?>%</span>
					</div>
				</div>
			</section>
			<section id="product-control">
				<div class="data">
					<div class="content-data" style="flex-basis: 700px;">
						<div class="head">
							<h3>Sales Report</h3>
						</div>
						<canvas id="line-chart" style="max-height:350px;"></canvas>
					</div>
					<div class="content-data" style="flex-basis: 700px;">
						<div class="head">
							<h3>Top Brands</h3>
						</div>
						<canvas id="pie-chart" style="max-height:350px;"></canvas>
					</div>

					<!--pie chart data fetch-->

					<?php
					// Get the count of each brand
					$result = $conn->query("SELECT ProductBrand, COUNT(*) AS Count FROM orders GROUP BY ProductBrand");
					$data = array();
					while ($row = $result->fetch_assoc()) {
						// Separate brand names if they are grouped together
						$brands = explode(",", $row['ProductBrand']);
						foreach ($brands as $brand) {
							$brand = trim($brand);
							if (!isset($data[$brand])) {
								$data[$brand] = 0;
							}
							$data[$brand] += $row['Count'];
						}
					}

					// Format data for chart
					$chart_data = array();
					foreach ($data as $key => $value) {
						$chart_data[] = array(
							'label' => $key,
							'value' => $value
						);
					}

					// Echo out script for chart
					echo "<script>";
					echo "var pieData = " . json_encode($chart_data) . ";";
					echo "var ctx = document.getElementById('pie-chart');";
					echo "var myPieChart = new Chart(ctx, {type: 'pie', data: {datasets: [{data: pieData}],labels: pieData.map(function (e) {return e.label;})}});";
					echo "</script>";
					?>


					<div class="content-data" style="flex-basis: 850px;">
						<div class="head">
							<h3>Product Creation</h3>
						</div>
							<div class="productcreateform">
							<!--form information-->
								<div class="productmakecontainer">
										<h3>Product Details:</h3>
										<form id="productmake" action="poductinfoupdate.php" method="post">
											<fieldset>
												<input placeholder="Product Name" id="prodname" name="prodname" type="text" tabindex="1" required autofocus>
											</fieldset>
											<fieldset>
												<input placeholder="Product Colourway" name="colourway" type="text" tabindex="2" required>
											</fieldset>
											<fieldset>
												<input placeholder="Product Category" name="category" type="text" tabindex="3" required>
											</fieldset>
											<fieldset>
												<input placeholder="Product Brand" name="brand" type="text" tabindex="3" required>
											</fieldset>
											<fieldset>
												<input placeholder="Product Price" name="price" type="text" tabindex="4" required>
											</fieldset>
											<fieldset>
												<input placeholder="Quanity Available" name="stock" type="number" tabindex="4" required>
											</fieldset>
											<fieldset>
												<textarea placeholder="Enter product description... "  name="description" tabindex="5" required></textarea>
											</fieldset>
											<fieldset>
												<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
											</fieldset>
										</form>
								</div>
							<div class="productimgcontainer">
								<input type="file" id="file-input" multiple />
								<label for="file-input">
									<i class="fa-solid fa-arrow-up-from-bracket"></i>
									&nbsp; Upload Product Images
								</label>
								<div id="num-of-files">No Images Choosen</div>
								<ul id="files-list"></ul>
							</div>
						</div>
					</div>

					<!--finding out top categories-->

					<?php
						// Get a list of all product IDs
						$product_ids = array();
						$result = $conn->query("SELECT ProductID FROM orders");
						while ($row = $result->fetch_assoc()) {
							$product_ids[] = $row['ProductID'];
						}

						// Count the number of products in each category
						$categories = array();
						foreach ($product_ids as $product_id) {
							$result = $conn->query("SELECT ProductCategory FROM product WHERE ProductID = '$product_id'");
							$row = $result->fetch_assoc();
							$category = $row['ProductCategory'];
							if (isset($categories[$category])) {
								$categories[$category]++;
							} else {
								$categories[$category] = 1;
							}
						}

						// Sort the categories by count in descending order
						arsort($categories);

						// Get the top 4 categories
						$top_categories = array_slice(array_keys($categories), 0, 4);
					?>

					<div class="content-data" style="flex-basis: 550px;">
						<div class="head">
							<h3>Top Sellers</h3>
						</div>
						    <div class="topproducts">
								<div class="section-heading">
									<h2>Top Categories</h2>
								</div>
								<ol class="most-list">
									<?php foreach ($top_categories as $category): ?>
										<li><?= htmlspecialchars($category) ?></li>
									<?php endforeach ?>
								</ol>
								<div class="section-heading">
									<h2>Top Products</h2>
								</div>
								<?php
								// Get a list of all product names
								$product_names = array();
								$result = $conn->query('SELECT ProductName FROM orders');
								while ($row = $result->fetch_assoc()) {
									// Split the product names by comma
									$names = explode(',', $row['ProductName']);
									foreach ($names as $name) {
										$name = trim($name); // remove extra spaces
										if (!empty($name)) {
											// Increment the count for this product name
											if (isset($product_names[$name])) {
												$product_names[$name]++;
											} else {
												$product_names[$name] = 1;
											}
										}
									}
								}

								// Sort the product names by count in descending order
								arsort($product_names);

								// Get the top 4 product names
								$top_names = array_slice(array_keys($product_names), 0, 4);
								?>
								<!-- Display the top product names -->
								<ol class="most-list">
									<?php foreach ($top_names as $name) { ?>
										<li><?php echo $name; ?></li>
									<?php } ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="recent-sales">
				<div class="data">
					<div class="content-data" style="flex-basis: 100px;">
						<div class="head">
							<h3>All users</h3>
						</div>
						<div class="alluserstable">
							<table>
								<?php 
		
									$sql = "SELECT * FROM users LIMIT 5 OFFSET 0";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);

									if ($resultCheck > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
											echo  "<tr><td width='60px'><div class='imgBx'><img src='../img/Promo/user.png'></div></td><td><h4>" .$row['FirstName'] ."<br><span>". $row['Surname']  ."</span></h4></td><tr>";
										}
									}

								?>
							</table>
						</div>
					</div>
					<div class="content-data" style="flex-basis: 850px;">
						<div class="head">
							<h3>Order table</h3>
						</div>
						<p>(Showing most recent orders.)</p>
						<?php
							require "../connect.php";

							// Check if "View All" button has been clicked
							if(isset($_GET['viewall'])) {
								// Retrieve all rows from the orders table
								$sql = "SELECT * FROM orders";
							} else {
								// Retrieve the last 5 rows from the orders table
								$sql = "SELECT * FROM orders ORDER BY OrderID DESC LIMIT 8";
							}

							$stmt = mysqli_prepare($conn, $sql);
							mysqli_stmt_execute($stmt);
							$orders_result = mysqli_stmt_get_result($stmt);

							// Create an array to store the user IDs
							$userIds = array();

							// Loop through the results and store the user IDs in the array
							while ($row = mysqli_fetch_assoc($orders_result)) {
								$userIds[] = $row['UserID'];
							}

							// Retrieve the user data from the users table
							$userData = array();
							foreach (array_unique($userIds) as $userId) {
								$sql2 = "SELECT FirstName, Surname FROM users WHERE UserID = ?";
								$stmt2 = mysqli_prepare($conn, $sql2);
								mysqli_stmt_bind_param($stmt2, "i", $userId);
								mysqli_stmt_execute($stmt2);
								$user_result = mysqli_stmt_get_result($stmt2);
								$userdatarow = mysqli_fetch_assoc($user_result);
								$userData[$userId] = $userdatarow;
							}

							// Retrieve the last 5 rows from the orders table again
							$sql3 = "SELECT * FROM orders ORDER BY OrderID DESC LIMIT 5";
							$stmt3 = mysqli_prepare($conn, $sql3);
							mysqli_stmt_execute($stmt3);
							$orders_result2 = mysqli_stmt_get_result($stmt3);

							// Display the table header
							echo '<div class="recentOrders">';
							echo '<table>';
							echo '<thead>';
							echo '<tr>';
							echo '<td>User</td>';
							echo '<td>Brand</td>';
							echo '<td>Product</td>';
							echo '<td>Price</td>';
							echo '<td>Number of Items</td>';
							echo '<td>Size</td>';
							echo '<td>Delivery Details</td>';
							echo '<td>Payment Status</td>';
							echo '<td>Status</td>';
							echo '</tr>';
							echo '</thead>';
							echo '<tbody>';

							// Loop through the results and display the data
							while ($ordersrow = mysqli_fetch_assoc($orders_result2)) {
								// Retrieve the user data for this order
								$user_id = $ordersrow['UserID'];
								$user_first_name = $userData[$user_id]['FirstName'];
								$user_last_name = $userData[$user_id]['Surname'];
								// Retrieve the product data for this order
								$product_data = array();
								$product_brand = explode(',', $ordersrow['ProductBrand']);
								$product_name = explode(',', $ordersrow['ProductName']);
								$product_price = explode(',', $ordersrow['TotalPrice']);
								$product_basket_id = explode(',', $ordersrow['BasketID']);
								$num_items = count($product_basket_id);
								$product_size = explode(',', $ordersrow['ProductSize']);
								// Display the data for each product in this order
								for ($i = 0; $i < $num_items; $i++) {
									echo '<tr>';
									echo '<td>' . $user_first_name . ' ' . $user_last_name . '</td>';
									echo '<td>' . $product_brand[$i] . '</td>';
									echo '<td>' . $product_name[$i] . '</td>';
									echo '<td>' . $product_price[$i] . '</td>';
									echo '<td>' . $num_items . '</td>'; // new code to display number of items
									echo '<td>' . $product_size[$i] . '</td>';
									// Display the delivery status and details
									$delivered = $ordersrow['Delivered'];
									if ($delivered == 1) {
										echo '<td><span class="status delivered">Delivered</span></td>';
									} else {
										echo '<td><span class="status inprogress">In Progress</span></td>';
									}
									// Display the payment status
									$paid = $ordersrow['Paid'];
									if ($paid == 1) {
										echo '<td>paid</td>';
									} else {
										echo '<td>due</td>';
									}
									echo '<td>' . $ordersrow['DeliveryDetails'] . '</td>';
									echo '</tr>';
								}
							}

							// Close statement
							mysqli_stmt_close($stmt);

							echo '</tbody>';
							echo '</table>';
							echo '</div>'; // close the recentOrders div
	
						?>
					</div>
					<!--messages section-->
					<div class="content-data" style="flex-basis: 1050px;">
						<div class="head">
							<h3>Form messages</h3>
						</div>
							<div class="usermsg-inner">
								<div class="usermsgborder"></div>
      
								<div class="usermsgrow">
										<?php
										require_once "../connect.php";

										// Fetch the 10 most recent messages
										$sql = "SELECT * FROM messages ORDER BY MessageID DESC LIMIT 4";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// Display the 10 most recent messages
											while($row = $result->fetch_assoc()) {
												echo '<div class="usermsgcol">';
												echo '<div class="usermsg">';
												echo '<img src="../img/Promo/user.png" alt="">';
												echo '<div class="usermsgname">' . $row["Name"] . '</div>';
												echo '<p>' . $row["Message"] . '</p>';
												echo '</div>';
												echo '</div>';

											}
										} else {
											echo "No messages found.";
										}

										// Fetch all messages from the database
										$sql = "SELECT * FROM messages ORDER BY MessageID DESC";
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											// Display all messages
											echo '<div id="all-messages" style="display:none;">';
											while($row = $result->fetch_assoc()) {
												echo '<div class="usermsgcol">';
												echo '<div class="usermsg">';
												echo '<img src="../img/Promo/user.png" alt="">';
												echo '<div class="usermsgname">' . $row["Name"] . '</div>';
												echo '<p>' . $row["Message"] . '</p>';
												echo '</div>';
												echo '</div>';
											}
											echo '</div>';
										} else {
											echo "No messages found.";
										}

										?>
								</div>
								<div class="show-more-container">
									<button id="show-more-btn">Show More</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</main>
		<!-- MAIN -->
	</section>
	


	<?php
	  // Fetch data from orders table
	  $query = "SELECT Year, Month, SUM(TotalPrice) AS TotalPrice FROM orders GROUP BY Year, Month ORDER BY Year, Month";
	  $result = mysqli_query($conn, $query);

	  // Create datasets and labels for line chart
	  $data = array();
	  while ($row = $result->fetch_assoc()) {
		$year = $row['Year'];
		$month = $row['Month'];
		$date_string = $year . "-" . $month . "-01";
		$timestamp = strtotime($date_string);
		$data[] = array(
		  'date' => date('Y-m', $timestamp),
		  'total_price' => $row['TotalPrice'],
		);
	  }
  
	  // Sort data by date in ascending order
	  usort($data, function($a, $b) {
		return strtotime($a['date']) - strtotime($b['date']);
	  });
  
	  // Create datasets and labels for line chart
	  $labels = array();
	  $dataset1 = array();
	  foreach ($data as $row) {
		$labels[] = $row['date'];
		$dataset1[] = $row['total_price'];
	  }
	  $datasets = array(
		array(
		  'label' => 'Revenue',
		  'data' => $dataset1,
		  'yAxisID' => 'pounds',
		  'borderColor' => "#40c9a2",
		  'backgroundColor' => "#40c9a2",
		  'tooltipTemplate' => "£<%= value %>"
		),
	  );
	?>

	<script>
	// line chart stuff
	var linechartlabels = <?php echo json_encode($labels); ?>;
	var linechartdatasets = <?php echo json_encode($datasets); ?>;
	var linechartdata = { labels: linechartlabels, datasets: linechartdatasets };
	new Chart(document.getElementById('line-chart'), {
		type: 'line',
		data: linechartdata,
		options: {
			responsive: true,
			plugins: {
				legend: {
					position: 'top',
				},
				title: {
					display: true,
					text: 'Sales Trend (£)'
				}
			},
			scales: {
				yAxes: [{
					id: 'pounds',
					ticks: {
						callback: function(value, index, values) {
							return '£' + value;
						}
					},
					scaleLabel: {
						display: true,
						labelString: 'Revenue (£)'
					}
				}]
			}
		},
	});
	</script>

	<!-- code for fetching data for pie chart -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
</body>
</html>
