<% with Person %>
    <div id="main-one" class="single-person">
        <h1>$fullname</h1>
        <% if $ProfileImage %>
            <img class="profile-image-full" src="$ProfileImage.URL" alt="$ProfileAltText">
        <% end_if %>
        <p>$Biography</p>
    </div>
    <div id="main-two" class="testimonial-flex">
        <% if $Testimonials %>
            <h1>Testimonials</h1>
            <div id="testimonial-content-flex">
                <div id="testimonials">
                    <% loop $Testimonials.Limit(2) %>
                        <div class="testies">
                            <p>"$Description"</p>
                            <% if $From %>
                                <p class="bottom">From: $From</p>
                            <% end_if %>
                        </div>
                    <% end_loop %>
                </div>
                <% if $SecondaryImage %>
                    <div id="secondary-image">
                        <img class="secondary-image-full" src="$SecondaryImage.URL" alt="$SecondaryAltText">
                    </div>
                <% end_if %>
            </div>
        <% end_if %>
    </div>
<% end_with %>