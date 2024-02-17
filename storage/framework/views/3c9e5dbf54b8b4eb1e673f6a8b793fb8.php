<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo e(config('admin.title'), false); ?> | <?php echo e(__('admin.login'), false); ?></title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

		<?php if(!is_null($favicon = Admin::favicon())): ?>
		<link rel="shortcut icon" href="<?php echo e($favicon, false); ?>">
		<?php endif; ?>

		<link rel="stylesheet" href="<?php echo e(Admin::asset("open-admin/css/styles.css"), false); ?>">
		<script src="<?php echo e(Admin::asset("bootstrap5/bootstrap.bundle.min.js"), false); ?>"></script>

	</head>
	<body class="bg-light" <?php if(config('admin.login_background_image')): ?>style="background: url(<?php echo e(config('admin.login_background_image'), false); ?>) no-repeat;background-size: cover;"<?php endif; ?>>
		<div class="d-flex justify-content-center align-items-center h-100">
			<div class="container m-4" style="max-width:400px;">
				<h1 class="text-center mb-3 h2"><a class="text-decoration-none text-dark" href="<?php echo e(admin_url('/'), false); ?>"><?php echo e(config('admin.name'), false); ?></a></h1>
				<div class="bg-body p-4 shadow-sm rounded-3">

					<?php if($errors->has('attempts')): ?>
						<div class="alert alert-danger m-0 text-center"><?php echo e($errors->first('attempts'), false); ?></div>
					<?php else: ?>

					<form action="<?php echo e(admin_url('auth/login'), false); ?>" method="post">

						<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
						<div class="mb-3">

							<?php if($errors->has('username')): ?>
								<div class="alert alert-danger"><?php echo e($errors->first('username'), false); ?></div>
							<?php endif; ?>

							<label for="username" class="form-label"><?php echo e(__('admin.username'), false); ?></label>
							<div class="input-group mb-3">
								<span class="input-group-text"><i class="icon-user"></i></span>
								<input type="text" class="form-control" placeholder="<?php echo e(__('admin.username'), false); ?>" name="username" id="username" value="<?php echo e(old('username'), false); ?>" required>
							</div>
						</div>

						<div class="mb-3">
							<label for="password" class="form-label"><?php echo e(__('admin.password'), false); ?></label>
							<div class="input-group mb-3">
								<span class="input-group-text"><i class="icon-eye"></i></span>
								<input type="password" class="form-control" placeholder="<?php echo e(__('admin.password'), false); ?>" name="password" id="password" required>
							</div>

							<?php if($errors->has('password')): ?>
								<div class="alert alert-danger"><?php echo e($errors->first('password'), false); ?></div>
							<?php endif; ?>
						</div>

						<?php if(config('admin.auth.remember')): ?>
						<div class="mb-3 form-check">
							<input type="checkbox" class="form-check-input" name="remember" id="remember" value="1"  <?php echo e((old('remember')) ? 'checked="checked"' : '', false); ?>>
							<label class="form-check-label" for="remember"><?php echo e(__('admin.remember_me'), false); ?></label>
						</div>
						<?php endif; ?>

						<div class="clearfix">
							<button type="submit" class="btn float-end btn-secondary"><?php echo e(__('admin.login'), false); ?></button>
						</div>

					</form>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</body>
</html>
<?php /**PATH D:\Visual Studio\VS Code Projects\Personal\Laravel\multi_vendor_ecommerce\vendor\open-admin-org\open-admin\src/../resources/views/login.blade.php ENDPATH**/ ?>