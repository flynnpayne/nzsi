<div id="main-one">
    <h1>About Us</h1>
    <p>$Content</p>
</div>
<div id="main-two">
    <% if $Person %>
        <% loop $Person %>
            <div class="card">
                <div class="image-container">
                    <% if $ProfileImage %>
                        <% with $ProfileImage.Fill(500, 500).Pad(1000,1000) %>
                            <img class="profile-image" src="$URL" alt="$ProfileAltText" width="$Width" height="$Height">
                        <% end_with %>
                    <% end_if %>
                </div>
                <div class="content-container">
                    <h1>$fullname</h1>
                    <a class="link-button" href="$Link">Learn more about $FirstName<div class="arrow-wrapper"><div class="arrow"></div></div></a>
                </div>
            </div>
        <% end_loop %>
    <% end_if %>
</div>