<ul id="admin-menu">
	<li class="menu-item news{if $routes[1] == 'news'} selected{/if}"><a href="/admin/news/">Новости</a></li>
	<li class="menu-item articles{if $routes[1] == 'articles'} selected{/if}"><a href="/admin/articles/">Статьи</a></li>
	<li class="menu-item static-pages{if $routes[1] == 'static-pages'} selected{/if}"><a href="/admin/static-pages/">Статичные страницы</a></li>
	<li class="menu-item static-pages{if $routes[1] == 'products'} selected{/if}"><a href="/admin/products/">Каталог товаров</a></li>
	<li class="menu-item static-pages{if $routes[1] == 'sections'} selected{/if}"><a href="/admin/sections/">Разделы</a></li>
	<li class="menu-item menu{if $routes[1] == 'menu'} selected{/if}"><a href="/admin/menu/">Меню</a></li>
	<li class="menu-item options{if $routes[1] == 'options'} selected{/if}"><a href="/admin/options/">Настройки</a></li>
	<li class="menu-item logout"><a href="/logout/">Выход</a></li>
</ul>