<div class="main-content">

	<main class="content">
		<div class="container p-0">

			<h1 class="h3 mb-3">Messages</h1>

			<div class="card">
				<div class="row g-0">

					<div class="col-12 col-lg-12 col-xl-12">
						<div class="py-2 px-4 border-bottom d-none d-lg-block">
							<div class="d-flex align-items-center py-1">
								<div class="position-relative">
									<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
								</div>
								<div class="flex-grow-1 pl-3">
									<strong>Admin</strong>
									<div class="text-muted small"><em>Typing...</em></div>
								</div>
							</div>
						</div>
						<div class="position-relative">
							<div class="chat-messages p-4">
								<?php
								foreach ($chatting as $key => $value) {
									if ($value->pertanyaan != '') {
								?>
										<div class="chat-message-right pb-4">
											<div>
												<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
												<div class="text-muted small text-nowrap mt-2"><?= $value->time ?></div>
											</div>
											<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
												<div class="font-weight-bold mb-1"><?= $value->nama_pelanggan ?></div>
												<?= $value->pertanyaan ?>
											</div>
										</div>
									<?php
									} else if ($value->jawaban != '') {
									?>
										<div class="chat-message-left pb-4">
											<div>
												<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
												<div class="text-muted small text-nowrap mt-2"><?= $value->time ?></div>
											</div>
											<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
												<div class="font-weight-bold mb-1">Admin</div>
												<?= $value->jawaban ?>
											</div>
										</div>
									<?php
									}
									?>
								<?php
								}
								?>

							</div>
						</div>

						<div class="flex-grow-0 py-3 px-4 border-top">
							<form action="<?= base_url('Admin/cChatting/balasan/' . $id_pelanggan) ?>" method="POST">
								<div class="input-group">
									<input type="text" class="form-control" name="jawaban" placeholder="Type your message" required>
									<button type="submit" class="btn btn-primary">Send</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

</div>