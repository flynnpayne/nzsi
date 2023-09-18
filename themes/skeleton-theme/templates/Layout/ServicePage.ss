<div id="main-one">
    <h1>Services</h1>
    <p>$Content</p>
</div>
<div id="main-two">
    <% if $Service %>
        <div id="services">
            <% loop $Service %>
                <div class="services-card">
                    <div>
                        <h1>$ServiceName</h1>
                        <p>$Description</p>
                    </div>
                    <div>
                        <% with $Person %>
                            <h2>by $fullname</h2>
                        <% end_with %>
                        <a class="link-button" href="/contact-us/#main-two">Enquire about this Service<div class="arrow-wrapper"><div class="arrow"></div></div></a>
                    </div>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
    
</div>