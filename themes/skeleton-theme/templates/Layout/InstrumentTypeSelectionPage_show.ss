<% with InstrumentType %>
    <div id="main-one" class="instrument-type">
        <h1>$InstrumentTypeName</h1>
    </div>
    <div id="main-two">
        <div id="instruments">

            <% if $Instruments %>
                <% loop $Instruments %>
                    <div class="instruments-card">
                        <div>
                            <img class="instrument-image" src="$InstrumentImage.Pad(1000,1000).URL" alt="$InstrumentAltText">
                            <h1>$InstrumentName</h1>
                            <p>$Caption</p>
                        </div>
                        <div>
                            <h2>Made by: $Person.fullname</h2>
                            <a class="link-button" href="/contact-us/#main-two">Enquire about this Item<div class="arrow-wrapper"><div class="arrow"></div></div></a>
                        </div>
                    </div>
                <% end_loop %>
            <% else %>
                <h1>No instruments of this type yet</h1>
            <% end_if %>


        </div>
    </div>
<% end_with %>