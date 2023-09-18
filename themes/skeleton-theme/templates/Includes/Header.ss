<header>
    <a href="/"><img id="logo" src="$ThemeDir/images/logo.png" alt="Logo"></a>
    
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
                                <li><a class="<% if $isCurrent %>current<% else_if $isSection %>section<% end_if %>" href="$Link">$MenuTitle</a></li>
                            <% end_loop %>
                        </ul>
                    <% end_if %>
                </li>
            <% end_loop %>
        </ul>
    </nav>
</header>

