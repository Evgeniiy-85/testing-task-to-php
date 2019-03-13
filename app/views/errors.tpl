{if $errors}
	<ul class="errors">
		{foreach $errors as $_error}
		<li>{$_error}</li>
		{/foreach}
	</ul>
{/if}