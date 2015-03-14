<form name="mainForm" class="uk-form n-abs-fit" novalidate="" ng-submit="save($event)" 
	  ng-modules="setting-general" ng-controller="GuideMainController" 
	  action="<?= base_url("/admin/setting/general"); ?>"
	  ng-init="successMessage = '<?= lang("setting_save_success_message") ?>';"
	  n-dirty-check="" n-focus-on-error="" ng-cloak="">
		  
	<input type="hidden" 
		   name="<?php echo $this->security->get_csrf_token_name(); ?>" 
		   value="<?php echo $this->security->get_csrf_hash();?>" />

	<div class="n-content n-single-page" ng-class="{'n-semi-collapse': mainForm.$dirty}">
		<div class="uk-panel uk-panel-box uk-margin-top">
			<div class="uk-panel-title uk-clearfix">
				<div class="uk-display-inline-block" style="padding-top: 5px">
					Base Cost by Regions
				</div>
				<button type="button" class="uk-button uk-button-success uk-float-right">
					<i class="uk-icon-plus"></i> New Region
				</button>
			</div>
			<hr/>
			<div class="uk-panel">
				<script type="text/ng-template" id="renderer.html">
					<div class="n-item uk-grid uk-grid-small uk-margin-top" ui-tree-handle>
						<div class="uk-width-1-2">
							<a ng-click="toggle(this)"><i class="uk-icon-plus-square-o uk-icon-medium"></i></a>
							<div class="uk-display-inline-block uk-margin-left">
								{{region.title}}
							</div>
						</div>
						<div class="uk-width-1-2 uk-text-right">
							<input type="text" class="n-cost-box uk-text-right" ng-model="region.cost" />
							<select ng-model="region.unit">
								<option value="Tour">Tour</option>
								<option value="Day">Day</option>
							</select>
							<button type="button" class="uk-button uk-button-success">
								<i class="uk-icon-plus"></i>
							</button>
							<button type="button" class="uk-button uk-button-danger">
								<i class="uk-icon-minus"></i>
							</button>
						</div>
					</div>
					<ol ui-tree-nodes="" ng-model="region.regions">
						<li ng-repeat="region in region.regions" ui-tree-node ng-include="'renderer.html'"></li>
					</ol>
				</script>
				<div class="uk-panel uk-panel-box uk-margin-bottom" ng-repeat="region in editingData.regions">
					<div class="n-header uk-panel-title uk-margin-bottom-remove">
						<div class="uk-grid">
							<div class="uk-width-1-2">
								{{region.title}}
							</div>
							<div class="uk-width-1-2 uk-text-right">
								<button type="button" class="uk-button uk-button-success">
									<i class="uk-icon-plus"></i>
								</button>
								<button type="button" class="uk-button uk-button-danger">
									<i class="uk-icon-minus"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="uk-grid uk-grid-small uk-margin-remove" ui-tree>
						<ol ui-tree-nodes="" ng-model="region.regions" class="uk-width-1-1">
							<li ng-repeat="region in region.regions" ui-tree-node ng-include="'renderer.html'"></li>
						</ol>
					</div>
				</div>
			</div>


		</div>
    </div>
</div>