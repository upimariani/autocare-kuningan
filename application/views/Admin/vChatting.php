<div class="main-content">

	<main class="content">
		<div class="container p-0">


			<div class="card">
				<div class="card-header">
					<h1 class="h3 mb-3">Messages</h1>

				</div>
				<div class="row g-0">
					<div class="col-12 col-lg-12 col-xl-12">

						<div class="px-4 d-none d-md-block">
							<div class="d-flex align-items-center">
								<div class="flex-grow-1">
									<input type="text" class="form-control my-3" placeholder="Search...">
								</div>
							</div>
						</div>

						<?php
						foreach ($chat as $key => $value) {
						?>
							<a href="<?= base_url('Admin/cChatting/view_chatting/' . $value->id_pelanggan) ?>" class="list-group-item list-group-item-action border-0">
								<?php
								$notif = $this->db->query("SELECT COUNT(id_chatting) as jml FROM `chatting` WHERE id_pelanggan='" . $value->id_pelanggan . "' AND status='1'")->row();
								?>
								<div class="badge bg-success float-right"><?php if ($notif->jml != '0') {
																			?>
										<?= $notif->jml ?>
									<?php
																			} ?></div>
								<div class="d-flex align-items-start">
									<img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
									<div class="flex-grow-1 ml-3">
										<?= $value->nama_pelanggan ?>
										<div class="small"><span class="fas fa-circle chat-online"></span> Online</div>
									</div>
								</div>
							</a>
						<?php
						}
						?>



						<hr class="d-block d-lg-none mt-1 mb-0">
					</div>

				</div>
			</div>
		</div>
	</main>

</div>