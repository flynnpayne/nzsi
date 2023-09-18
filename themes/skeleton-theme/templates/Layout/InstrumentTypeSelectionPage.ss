<div id="main-one">
    <h1>Instruments</h1>
    <p>$Content</p>
</div>
<div id="main-two">
    <% if $InstrumentType %>
        <% loop $InstrumentType %>
            <div class="card">
                <div class="content-container">
                    <h1>$InstrumentTypeName</h1>
                    <a class="link-button" href="$Link">View all $InstrumentTypeName<div class="arrow-wrapper"><div class="arrow"></div></div></a>
                </div>
            </div>
        <% end_loop %>
    <% end_if %>
</div>