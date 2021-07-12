<?php
    // require 'exception.php';
    require 'design.php';
	require 'getuser.php';
	$user = userfunction("getalluser");
	$arr = json_decode($user,true);
	
session_start();

?>
<!DOCTYPE html>

<html>

<head>
	<style>

	</style>
</head>

<body>
<?php if(isset($_SESSION['status']))
{
   
    
?>
	<div class="container">
		<div class="row">
			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 bhoechie-tab-container">
				<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
					<div class="list-group">
						<a href="#" class="list-group-item active text-center">
							<h4 class="glyphicon glyphicon-plane"></h4><br />Buat Akun Baru
						</a>
						<a href="#" class="list-group-item text-center">
							<h4 class="glyphicon glyphicon-road"></h4><br />Buat Kode Unik
						</a>
						<!-- <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Hotel
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Restaurant
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                </a> -->
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
					<!-- flight section -->
					<div class="bhoechie-tab-content active">
						<h1>Buat Akun Baru</h1>

						<form method="POST" enctype='multipart/form-data' id="formbuatuser">
							<input type="hidden" name="tipe" value="buatuser">
							<h3>Data Barang</h3>
							
							<div class="form-group">
								<label class="control-label">Nilai Barang</label>
								<div>
									<input type="text" class="form-control input-lg" name="totalnominalcicilan" value="" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Foto Barang</label>
								<div>
								<input type="file" class="form-control input-lg" name="fotobarang[]" id="fotokartu"
										accept="image/x-png,image/jpeg" multiple required>
								</div>
							</div>
						
							<div class="form-group">
								<div class="field_wrapper">
									<div>
										<label class="control-label">Kuantiti Cicilan</label>
										<div class="row">
											<div class="col-lg-8">
												<input type="text" name="kuantiticicilan" class="form-control input-lg"
													value="" id="totalcicilan"
													onInput="return isNumberKeygenerate(event)" />
											</div>
											<div class="col-lg-3">
												<div data-toggle="collapse" data-target="#dinamicinput"
													class="btn btn-success">Show / Hide Daftar Cicilan</div>
											</div>

										</div>

									</div>
									<div id="dinamicinput"></div>
								</div>
							</div>
							<h3>Data User</h3>

							<div class="form-group">
								<label class="control-label">Nama User</label>
								<div>
									<input type="text" class="form-control input-lg" name="Nama" value="" required>
								</div>
							</div>


							<div class="form-group">
								<label class="control-label">Email User (Optional)</label>
								<div>
									<input type="email" class="form-control input-lg" name="email" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Nomor Handphone (Optional)</label>
								<div>
									<input type="text" class="form-control input-lg"   onkeypress="return isNumberKey(event)" name="nohp" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Foto Passport</label>
								<div>
									<input type="file" class="form-control input-lg" name="fotopassports[]"
										accept="image/x-png,image/jpeg" id="fotopassport" multiple required>
								</div>
							</div>
							<h3>Data Kartu</h3>

							<div class="form-group">
								<label class="control-label">Jenis Kartu</label>
								<div>
									<select class="selectpicker" name="jeniskartu" style="background-color: red;">
										<option data-thumbnail="logo/visa.png">
											Visa</option>
										<option data-thumbnail="logo/mastercard.png">
											MasterCard</option>
										<option data-thumbnail="logo/americanexpress.png">
											American Express</option>
										<option data-thumbnail="logo/unionpay.png">
											Union Pay</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Nomor Kartu (16 digit)</label>
								<div>
									<input type="text" class="form-control input-lg" name="nomorkartu" maxlength="16"
										pattern="\d*" min="0" max="16" onkeypress="return isNumberKey(event)" required>
								</div>
							</div>
					
							<div class="form-group">
								<div class="row align-items-start">
									<div class="col-lg-6">
										<label class="control-label">Expired</label>
										<label class="control-label">Month (ex : 09) </label>
										<input type="text" class="form-control input-lg" maxlength="2"
											name="expiredmonth" id="expiredmonth" onkeypress="return isNumberKey(event)"
											required>
									</div>
									<div class="col-lg-6">
										<label class="control-label">Expired</label>
										<label class="control-label">Year (ex : 2021)</label>
										<input type="text" class="form-control input-lg" maxlength="4"
											name="expiredyear" id="expiredyear" onkeypress="return isNumberKey(event)"
											required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label">Foto Kartu</label>
								<div>

									<input type="file" class="form-control input-lg" name="fotokartu[]" id="fotokartu"
										accept="image/x-png,image/jpeg" multiple required>

								</div>
							</div>

							<input type="submit" class="btn btn-primary" value="Buat Akun" id="buttonsubmitform">
						</form>
					</div>


					<!-- train section -->
					<div class="bhoechie-tab-content">
						<h1>Buat Kode Unik</h1>
						<h3>Pilih data user yang akan dibuatkan kode</h3>
						<div class="form-group">
							<table id="table_id" class="table table-striped table-bordered" style="width:95%">
								<thead class="thead-dark">
							
									<tr>

										<th>No</th>
										<th>Nama </th>
										<th>Cicilan Ke</th>
										<th>Kode</th>
									</tr>
								</thead>
								<tbody>
								<?php  $j = 0;
								if($arr)
								{
									echo "ada";
								
								
								for($i = 0 ; $i< count($arr);$i++)
								{
									
								 ?>
									<tr>
										<td><?php echo $j;?></td>
										<td><?php echo $arr[$i]['namauser'];?></td>
										<td><?php echo $arr[$i]['progrescicilan'];?>  </td>

										<td>
											
											<input type="submit" class="btn btn-success" value="Generate Kode"
												style="width:100%;" onclick= "buatkode('<?php echo base64_encode($arr[$i]['id'])?>')">
										</td>
									</tr>
								<?php
								$j++;
								}
							}
								else{
									
								}
								?>
								
								</tbody>
							</table>
						</div>
					</div>

					<!-- hotel search -->
					<div class="bhoechie-tab-content">
						<center>
							<h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#55518a"></h1>
							<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
							<h3 style="margin-top: 0;color:#55518a">Hotel Directory</h3>
						</center>
					</div>
					<div class="bhoechie-tab-content">
						<center>
							<h1 class="glyphicon glyphicon-cutlery" style="font-size:12em;color:#55518a"></h1>
							<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
							<h3 style="margin-top: 0;color:#55518a">Restaurant Diirectory</h3>
						</center>
					</div>
					<div class="bhoechie-tab-content">
						<center>
							<h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#55518a"></h1>
							<h2 style="margin-top: 0;color:#55518a">Cooming Soon</h2>
							<h3 style="margin-top: 0;color:#55518a">Credit Card</h3>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
	else
	{
		echo "<script> Swal.fire({
            icon: 'error',
            title: 'Login',
            allowOutsideClick: false,
            text: 'Untuk admin, silahkan login terlebih dahulu',
        }).then(function() {
            window.location.href = 'loginadmin.php';
        });  
  	  </script>";
	}
	?>
</body>

</html>
<script>
	var request;
	$(document).ready(function () {
		var test = $("#fotopassport").required = true;
		$("#fotokartu").required = true;
		$('#table_id').DataTable();


		var maxField = 10; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		// var wrapper = $('#dinamicinput'); //Input field wrapper
		var x = 0; //Initial field counter is 1

	

	});

	function buatkode(myid)
	{
		request = $.ajax({
				url: "generatetoken/generateexisting.php",
				type: "POST",
				data: {id:myid},
				success: function (data) {
					
						Swal.fire(
							'Berhasil!',
							'<h3>Kode Berhasil Dibuat</h3><br><br> <h3>Kode:</h3>' + data,
							'success'
						)
						
					
				},
			});

			// Callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// Log a message to the console
				console.log(response);

			});

			// Callback handler that will be called on failure
			request.fail(function (jqXHR, textStatus, errorThrown) {
				// Log the error to the console
				// console.error(
				// 	"The following error occurred: " +
				// 	textStatus, errorThrown
				// );
			});

			// Callback handler that will be called regardless
			// if the request failed or succeeded	
			request.always(function () {
				// Reenable the inputs
				// $inputs.prop("disabled", false);
			});
	}
	var wrapper = $('#dinamicinput'); //Input field wrapper

	function isNumberKeygenerate(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		var status = true
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;

		}
		// var totalcicilan =  $(evt.target).text();
		// alert(evt.target.value);

	
		var edValue = document.getElementById("totalcicilan");
		var s = edValue.value;
		var myval = $("#totalcicilan").val();

		if (myval == "" || myval == 0) {
			$(wrapper).empty();
		} else {
			$(wrapper).empty();
			for (var i = 1; i <= myval; i++) {

				var fieldHTML = '<div> <label class="control-label">Cicilan ke -' + i +
					'</label> <input type="text" class = "form-control input-lg" name="cicilan[]" value="" required/></div>'; //New input field html 
				$(wrapper).append(fieldHTML); //Add field html
			}
		}

		return true;

	};

	$('#dSuggest').keypress(function () {
		var dInput = this.value;
		console.log(dInput);
		$(".dDimension:contains('" + dInput + "')").css("display", "block");
	});
	$("#formbuatuser").on('submit', function (e) {
		e.preventDefault()

		var month = $('#expiredmonth').val();
		var year = $('#expiredyear').val();
		var today, someday;
		today = new Date();
		someday = new Date();
		someday.setFullYear(year, month, 1);

		if (someday < today) {
			Swal.fire({
				icon: 'error',
				title: 'Card Expired',
				text: "Card Has Expired",
			})
		} else {

			var $form = $(this);

			// $inputs.prop("disabled", true);

			// Fire off the request to /form.php
			request = $.ajax({
				url: "admin.php",
				type: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				success: function (data) {
					if (data.includes("Sukses")) {
						Swal.fire(
							'Created Successfully!',
							'<h3>Akun Berhasil Dibuat</h3><br><br> <h3>Kode:</h3>' + data,
							'success'
						)
						$(wrapper).empty();
						$("#totalcicilan").val(0);
						$('#formbuatuser').trigger("reset");

					} else {
						Swal.fire({
							icon: 'error',
							title: 'Error while creating account',
							text: "<h3>Akun gagal dibuat, error: </h3>" + data,
						})
					}
				},
			});

			// Callback handler that will be called on success
			request.done(function (response, textStatus, jqXHR) {
				// Log a message to the console
				console.log(response);

			});

			// Callback handler that will be called on failure
			request.fail(function (jqXHR, textStatus, errorThrown) {
				// Log the error to the console
				console.error(
					"The following error occurred: " +
					textStatus, errorThrown
				);
			});

			// Callback handler that will be called regardless
			// if the request failed or succeeded	
			request.always(function () {
				// Reenable the inputs
				// $inputs.prop("disabled", false);
			});
		}

	});

	function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	};
</script>