<div class="row">
	<div class="span6">
		<h2>Bumblebee</h2>
		<p>
			Bumblebee is a cross-platform python app designed to interface with BotQueue.  This application will pull down jobs from BotQueue, and drive your 3D printer to produce them.  It is currently capable of controlling the following machines:  (STILL UNDER DEVELOPMENT!!!)
			<ul>
				<li>MakerBot Thing-o-Matic</li>
				<li>MakerBot Replicator</li>
				<li>Any machine using <a href="https://github.com/grbl/grbl/">grbl</a>, <a href="https://github.com/kliment/Sprinter">Sprinter</a>, <a href="https://github.com/ErikZalm/Marlin/">marlin</a>, or other direct gcode parsing firmware</li>
			</ul>
		</p>
		<h3>Getting Bumblebee</h3>
		<p>
			Bumblebee is currently under development, and a release will be made soon.  In the meantime, you can get it from the <a href="git@github.com:Hoektronics/BotQueue.git">BotQueue github repository</a>.
		</p>
		<h3>Installing Bumblebee</h3>
		<p>
			TBD.
		</p>
	</div>
	<div class="span6">
		<h2>Users - Your Authorized Apps</h2>
		<p>
			These are the apps that you have authorized to have access to your account.  If you use multiple computers, the same app may be listed multiple times below.  If you want to remove an app's access to your account, simply click the revoke link.
		</p>
		<? if (!empty($authorized)): ?>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Deactivate</th>
					</tr>
				</thead>
				<tbody>
					<? foreach ($authorized AS $row): ?>
						<? $a = $row['OAuthConsumer'] ?>
						<? $t = $row['OAuthToken'] ?>

						<tr>
							<td><?=$a->getLink()?></td>
							<td><a href="/app/revoke/<?=$t->get('token')?>">revoke</a></td>
						</tr>
					<? endforeach ?>
				</tbody>
			</table>
		<? else: ?>
			<b>No authorized apps found.</b>
		<? endif ?>

		<? if (!empty($apps)): ?>
			<h2>Developers - Your Registered Apps</h2>
			<p>
				If you are a developer, your app will need its own API key.  First you must <a href="/app/register">register one</a>, and then it will be listed below.  Next, you'll want to visit our <a href="/apiv1">API documentation page</a>.
			</p>
			<table class="table table-striped table-bordered table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Active?</th>
				</tr>
				<tbody>
					<? foreach ($apps AS $row): ?>
						<? $a = $row['OAuthConsumer'] ?>
						<tr>
							<td><?=$a->getLink()?></td>
							<td><?= $a->isActive() ? 'yes' : 'no' ?></td>
						</tr>
					<? endforeach ?>
				</tbody>
			</table>
		<? endif ?>
	</div>
</div>