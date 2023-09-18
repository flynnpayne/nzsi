<button id="menu-open-button" onclick="toggleMenu()">&#9776;</button>
<nav id="main-menu">
    <button id="menu-close-button" onclick="toggleMenu()">&times;</button>
	<ul>
		<% loop $Menu(1) %>
			<li>
				<a href="$Link" class="<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>">$MenuTitle</a>
            
                <% if $Children %>
                    <ul class="secondary">
                        <% loop $Children %>
                            <li class="<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>"><a href="$Link">$MenuTitle</a></li>
                        <% end_loop %>
                    </ul>
                <% end_if %>
            </li>
		<% end_loop %>
	</ul>
</nav>
