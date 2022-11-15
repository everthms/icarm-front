<?php $page="user-settings";?>
@extends('layout.mainlayout')
@section('content')		
<div class="content">
			<div class="container">
				<div class="row"> 
					<div class="col-xl-3 col-md-4">
						<div class="mb-4">
							<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
								<img alt="profile image" src="assets/img/customer/user-01.jpg" class="avatar-lg rounded-circle">
								<div class="ml-sm-3 ml-md-0 ml-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
									<h6 class="mb-0">Jeffrey Akridge</h6>
									<p class="text-muted mb-0">Member Since Apr 2020</p>
								</div>
							</div>
						</div>
						<div class="widget settings-menu">
							<ul role="tablist" class="nav nav-tabs">
								<li class="nav-item current">
									<a href="user-dashboard" class="nav-link">
										<i class="fas fa-chart-line"></i> <span>Dashboard</span>
									</a>
								</li>
								<li class="nav-item current">
									<a href="favourites" class="nav-link">
										<i class="fas fa-heart"></i> <span>Favourites</span>
									</a>
								</li>
								<li class="nav-item current">
									<a href="user-bookings" class="nav-link">
										<i class="far fa-calendar-check"></i> <span>My Bookings</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="user-settings" class="nav-link">
										<i class="far fa-user"></i> <span>Profile Settings</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="user-wallet" class="nav-link active">
										<i class="far fa-money-bill-alt"></i> <span>Wallet</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="user-reviews" class="nav-link">
										<i class="far fa-star"></i> <span>Reviews</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="user-payment" class="nav-link">
										<i class="fas fa-hashtag"></i> <span>Payment</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-xl-9 col-md-8">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Wallet</h4>
										<div class="wallet-details">
											<span>Wallet Balance</span>
											<h3>$872.1</h3>
											<div class="d-flex justify-content-between my-4">
												<div>
													<p class="mb-1">Total Credit</p>
													<h4>$29,720.80</h4>
												</div>
												<div>
													<p class="mb-1">Total Debit</p>
													<h4>$29,258.00</h4>
												</div>
											</div>
											<div class="wallet-progress-chart">
												<div class="d-flex justify-content-between">
													<span>$29258</span>
													<span>$29,720.80</span>
												</div>
												<div class="progress mt-1">
													<div class="progress-bar bg-theme" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width:98%">98.44%</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Add Wallet</h4>
										<form action="#">
											<div class="form-group">
												<div class="input-group mb-3">
													<div class="input-group-prepend">
														<label class="input-group-text display-5">$</label>
													</div>
													<input type="text" maxlength="4" class="form-control" name="wallet_amt" id="wallet_amt" placeholder="00.00">
												</div>
											</div>
										</form>
										<div class="text-center mb-3">
											<h5 class="mb-3">OR</h5>
											<ul class="list-inline mb-0">
												<li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;" class="updatebtn">$50</a>
												</li>
												<li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;" data-amount="100" class="updatebtn">$100</a>
												</li>
												<li class="line-inline-item mb-0 d-inline-block">
													<a href="javascript:;" data-amount="150" class="updatebtn">$150</a>
												</li>
											</ul>
										</div>
										<a href="javascript:void(0);" class="btn btn-primary btn-block withdraw-btn">Add to Wallet</a>
									</div>
								</div>
							</div>
						</div>
						<h4 class="mb-4">Wallet Transactions</h4>
						<div class="card transaction-table mb-0">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-center mb-0">
										<thead>
											<tr>
												<th>S.No</th>
												<th>Date</th>
												<th>Wallet</th>
												<th>Credit</th>
												<th>Debit</th>
												<th>Txt amt</th>
												<th>Available</th>
												<th>Reason</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>1</td>
												<td>22 Jul 2020</td>
												<td>$972.1</td>
												<td>$0</td>
												<td>$100</td>
												<td>$0</td>
												<td>$872.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>2</td>
												<td>22 Jul 2020</td>
												<td>$997.1</td>
												<td>$0</td>
												<td>$25</td>
												<td>$0</td>
												<td>$972.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>3</td>
												<td>22 Jul 2020</td>
												<td>$1047.1</td>
												<td>$0</td>
												<td>$50</td>
												<td>$0</td>
												<td>$997.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>4</td>
												<td>22 Jul 2020</td>
												<td>$1061.1</td>
												<td>$0</td>
												<td>$14</td>
												<td>$0</td>
												<td>$1047.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>5</td>
												<td>22 Jul 2020</td>
												<td>$1111.1</td>
												<td>$0</td>
												<td>$50</td>
												<td>$0</td>
												<td>$1061.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>6</td>
												<td>21 Jul 2020</td>
												<td>$1211.1</td>
												<td>$0</td>
												<td>$100</td>
												<td>$0</td>
												<td>$1111.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>7</td>
												<td>21 Jul 2020</td>
												<td>$1461.1</td>
												<td>$0</td>
												<td>$250</td>
												<td>$0</td>
												<td>$1211.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>8</td>
												<td>21 Jul 2020</td>
												<td>$1711.1</td>
												<td>$0</td>
												<td>$250</td>
												<td>$0</td>
												<td>$1461.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>9</td>
												<td>21 Jul 2020</td>
												<td>$2211.1</td>
												<td>$0</td>
												<td>$500</td>
												<td>$0</td>
												<td>$1711.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
											<tr>
												<td>10</td>
												<td>21 Jul 2020</td>
												<td>$2711.1</td>
												<td>$0</td>
												<td>$500</td>
												<td>$0</td>
												<td>$2211.1</td>
												<td>Booked a Service</td>
												<td><span class="badge bg-danger-light">Debit</span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
        </div>
@endsection 
