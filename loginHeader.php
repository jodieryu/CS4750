<?php if(isset($_SESSION["username"])) : ?>
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $_SESSION["fname"];?>!<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="bucketList.php">Bucket List</a>
				</li>
				<li>
					<form class="form-inline" action="logout.php">
						<button class="btn btn-outline-danger">Log out</button>
					</form>
				</li>
			</ul>
		</li>
	</ul>
<?php else : ?>
	<form class="form-inline" action="login.php">
		<button class="btn btn-outline-success">Login</button>
	</form>
<?php endif; ?>


