	<meta property="og:title" content="<?= $artwork->first_name.' '.$artwork->last_name ?>" />
    <meta property="og:description" content="<?= $artwork->lesson_name ?>" />
    <meta property="og:url" content="<?= base_url('artwork_view/view/'.$artwork->id) ?>" />
    <meta property="og:image" content="<?= $artwork->artwork_upload ?>" />

				<div class="page-container">
					<!-- Content Wrapper START -->
					<div class="main-content">
						<div class="page-header no-gutters">
							<div class="row align-items-md-center">
								<div class="col-md-4 text-center">
									<h3 class="m-b-0">
										<a class="text-dark" href="javascript:void(0);"><?= ucwords($artwork->lesson_name) ?></a>
									</h3>
								</div>
							</div>
						</div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 offset-lg-3">
                                <div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">
												<img class="img-fluid" src="<?= $artwork->artwork_upload ?>" alt="">
											</div>
											
											<div class="col-md-6 m-l-10">
												<h4 class="m-b-0"> <?= $artwork->first_name.' '.$artwork->last_name ?></h4>
												<p class="m-b-0">Class: <?= $artwork->class_name ?></p>
												<p class="m-b-0">Lesson: <?= $artwork->lesson_name ?></p>
												<p class="m-b-0">Artist comment: <?= $artwork->comments ?></p>
											</div>
													
											
											<br>
											<div class="sharetastic m-20"></div>
										</div>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
                <!-- Content Wrapper END -->

               