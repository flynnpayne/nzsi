<% require css('silverstripe/blog: client/dist/styles/main.css') %>


    <div id="main-one" class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
        <article>
            <% include SilverStripe\\Blog\\MemberDetails %>
        </article>
    </div>
    <div id="main-two">
        <article id="all-posts">
            <% if $PaginatedList.Exists %>
                <% loop $PaginatedList %>
                    <div class="blog-card">
                        <% include SilverStripe\\Blog\\PostSummary %>
                    </div>
                <% end_loop %>
            <% end_if %>

            <% with $PaginatedList %>
                <% include SilverStripe\\Blog\\Pagination %>
            <% end_with %>
        </article>
    </div>


<% include SilverStripe\\Blog\\BlogSideBar %>
