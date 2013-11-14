
<div class="page-header" id="banner" >
	<div class="row" ng-controller="Skills">
		<div class="col-lg-12">
			<h3>Skills</h3>
			<p class="lead"></p>
		</div>
		<div class="col-lg-4 col-sm-4 margin-bottom-30" ng-repeat="category in categories" >
			<div class="preview">
				<div class="image">
					<a target="_blank" href="#">
						<img class="img-responsive" src="{{category.thumb}}" alt="{{category.name}}" >
					</a>
				</div>
				<div class="options">
					<h3>{{category.name | cut:true:25:' ...'}}</h3>

				</div>
			</div>
		</div>
		<div class="col-lg-12 text-center" >
			<button type="button" class="btn btn-danger btn-large" ng-show="has_more()" ng-click="show_more()">Show more...</button>
		</div>
	</div>
</div>