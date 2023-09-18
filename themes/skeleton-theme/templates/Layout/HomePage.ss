<div id="main-one">

    <div id="mobile-main-image">
        <% if $MobileMainImage %>
            <% with $MobileMainImage.ScaleWidth(750) %>
                <img class="main-image" src="$URL" alt="" width="$Width" height="$Height">
            <% end_with %>
        <% end_if %>
    </div>

    <div id="desktop-main-image">
        <% if $DesktopMainImage %>
            <% with $DesktopMainImage.ScaleWidth(750) %>
                <img class="main-image" src="$URL" alt="" width="$Width" height="$Height">
            <% end_with %>
        <% end_if %>
    </div>

    $Content
</div>

<div id="main-two">
    
    <% if $Person %>
        <% loop $Person %>
            <div class="profile-card">
                <div>
                    <div class="image-container">
                        <% if $ProfileImage %>
                            <img class="profile-image" src="$ProfileImage.Fill(500,500).URL" alt="$ProfileAltText">
                        <% end_if %>
                    </div>
                    <div class="content-container">
                        <div>
                            <h1>$fullname</h1>
                            <p>$BioSum</p>
                        </div>
                    </div>
                </div>
                <div class="link-flex">
                    <a class="link-button" href="$Link">Read more about $FirstName<div class="arrow-wrapper"><div class="arrow"></div></div></a>
                </div>
            </div>
        <% end_loop %>
    <% end_if %>
</div>