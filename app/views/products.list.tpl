{if $products}
	<div class="products-list">
		{foreach $products as $_product}
			<div class="product-list-item">
			<div class="photo">
				<a href="{$_product.sect_url}{$_product.slug}/" title="{$_product.name}">
					{if $_product.photo}
						<img src="/_upload/images/products/{$_product.photo}" alt="{$_product.name}" />
					{/if}
				</a>
			</div>
			<div class="info">
				<div class="name">
					<a href="{$_product.sect_url}{$_product.slug}/" title="{$_product.name}">{$_product.name}</a>
				</div>
				<div class="description">
					{$_product.content nofilter}
				</div>
			</div>
		</div>
		{/foreach}
	</div>
	
	{include 'listing.tpl'}
{/if}