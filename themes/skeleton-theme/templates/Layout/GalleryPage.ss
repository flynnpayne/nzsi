<div id="main-one">
    <h1>Gallery</h1>
    <p>$Content</p>
</div>

<div id="main-two">
    <% if $Gallery %>
        <div id="gallery">
            <% loop $Gallery %>
                <div class="gallery-card">
                    <div>
                        <img class="gallery-image" src="$GalleryImage.Pad(1000,1000).URL" alt="$GalleryAltText">
                        <h1>$ImageName</h1>
                        <p>$Caption</p>
                    </div>
                    <% with $Person %>
                        <h2>by $fullname</h2>
                    <% end_with %>
                </div>
            <% end_loop %>
        </div>
    <% end_if %>
</div>