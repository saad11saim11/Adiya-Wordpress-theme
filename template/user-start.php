<?php
if (! function_exists('adiya_user_start') ) {
	function adiya_user_start(){
		?>
 <!-- login Box Modal -->
<div class="modal fade login-box" id="loginBox" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="login-box-content">
				<div class="sec-title">
					<h3>Login!</h3>
					<p class="sec-explain">Connect, organize and get things done to keep your IT business safe.</p>
				</div>
				<form class="row">
					<div class="col-md-12">
						<div class="quote-item">
							<input type="text" name="name" placeholder="Name" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item">
							<input type="password" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item d-flex align-items-center justify-content-between mb-30">
							<label class="remember-me-box">
								Remember Me!
								<input type="checkbox" checked="checked">
								<span class="checkmark"></span>
							</label>
							<a href="#" class="forget-password">Forget Password?</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item mb-30">
							<button class="btn-1 btn-3 submit" type="submit">Login</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item have-account text-center">
							Don’t Have An Account? <a href="#" class="register-here" data-bs-toggle="modal" data-bs-target="#registerBox">Register Here</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Register Box Modal -->
<div class="modal fade login-box register-box" id="registerBox" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="login-box-content">
				<div class="sec-title">
					<h3>Register!</h3>
					<p class="sec-explain">Connect, organize and get things done to keep your IT business safe.</p>
				</div>
				<form class="row">
					<div class="col-md-12">
						<div class="quote-item">
							<input type="text" name="name" placeholder="Name" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item">
							<input type="password" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item d-flex align-items-center justify-content-between mb-30">
							<label class="remember-me-box">
								I read &amp; agree
								<input type="checkbox" checked="checked">
								<span class="checkmark"></span>
							</label>
							<a href="#" class="forget-password">to Terms &amp; Conditions</a>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item mb-30">
							<button class="btn-1 btn-3 submit" type="submit">Register</button>
						</div>
					</div>
					<div class="col-md-12">
						<div class="quote-item have-account text-center">
							Have An Account? <a href="#" class="register-here" data-bs-toggle="modal" data-bs-target="#loginBox">Login Here</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	}
}