{if $alert_message}
<script>
$(document).ready(function() {
	if ($('#alert-message').length) {
		setTimeout('$(\'#alert-message\').fadeOut(200, function() { $(this).remove(); });', 3500);
	}
});
</script>

<div id="alert-message" class="{$alert_message.type}">
	<div class="text">{$alert_message.text}</div>
</div>
{/if}