{if $product}
	<div class="product-list-item">
		<div class="photo">
			<a href="{$product_url}" title="{$product.name}">
				{if $product.photo}
					<img src="/_upload/images/products/{$product.photo}" alt="{$product.name}" />
				{/if}
			</a>
		</div>
		<div class="info">
			<div class="name">
				<a href="{$product_url}" title="{$product.name}">{$product.name}</a>
			</div>
			{if $product.content}
				<div class="description">
					{$product.content nofilter}
				</div>
			{/if}
			<br>
			{if $links}
				<div class="dealer-links content">
					{foreach $links as $link}
						{if $link.name eq '' or $link.favicon eq ''}
							{continue}
						{/if}
						<a class="dealer-link" href="{$link.href}" title="{$link.name}" target="_blank">
							<img class="dealer-link-favicon" src="/_assets/images/sites-favicons/{$link.favicon}" alt='favicon'>
							<span class="dealer-link-name">{$link.name}</span>
							<br>
						</a>
					{/foreach}
				</div>
			{/if}
		</div>
	</div>
{/if}