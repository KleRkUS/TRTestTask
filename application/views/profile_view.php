<div class="profile_wrapper">
	<div class="profile">
			<?php
				
				echo "<img src='/profile_pics/".$data['pic']."' alt='".$data['login']."'><br>
						<div id='login_wrapper'>
						<h2 id='login'>".$data['login']."</h2>
						</div>";
							if ($data['changeName']) {
								echo "<span onclick='changeName()' id='changer'>&#9998;</span><br>";
							}
						echo "
						<span id='change_checker'></span><br>
						<span>".$data['email']."</span>
						<span style='color: ".$data['color'].";'>".$data['priveleges']."</span>
				";
			?>
	</div>
	<div class="profile__pic">	
		<h2>Change avatar</h2>	
		<form id="change_pic" enctype='multipart/form-data' action='profile/change_pic' method='POST'>
			<input name='uploadfile' type='file'><br><br>
			<input type='submit' value='Ready' class="pic_change_submit" />
		</form>
	</div>
</div>
<script type="text/javascript" src="/js/profile.js"></script> 