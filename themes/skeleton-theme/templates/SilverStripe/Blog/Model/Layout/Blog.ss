<% require css('silverstripe/blog: client/dist/styles/main.css') %>

<div id="main-one" class="blog-entry content-container <% if $SideBarView %>unit size3of4<% end_if %>">
	<article>
		<h1>
			<% if $ArchiveYear %>
				<%t SilverStripe\\Blog\\Model\\Blog.Archive 'Archive' %>:
				<% if $ArchiveDay %>
					$ArchiveDate.Nice
				<% else_if $ArchiveMonth %>
					$ArchiveDate.format('MMMM, y')
				<% else %>
					$ArchiveDate.format('y')
				<% end_if %>
			<% else_if $CurrentTag %>
				<%t SilverStripe\\Blog\\Model\\Blog.Tag 'Tag' %>: $CurrentTag.Title
			<% else_if $CurrentCategory %>
				<%t SilverStripe\\Blog\\Model\\Blog.Category 'Category' %>: $CurrentCategory.Title
			<% else %>
				$Title
			<% end_if %>
		</h1>
		<div class="content">$Content</div>
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
		<% else %>
			<p><%t SilverStripe\\Blog\\Model\\Blog.NoPosts 'There are no posts' %></p>
		<% end_if %>

		<% with $PaginatedList %>
			<% include SilverStripe\\Blog\\Pagination %>
		<% end_with %>
	</article>
</div>

<% include SilverStripe\\Blog\\BlogSideBar %>
