<form name="mainForm" class="uk-form n-abs-fit" novalidate="" ng-submit="save($event)" 
	  ng-modules="guide-main" ng-controller="GuideMainController" 
	  action="<?= base_url("/admin/guide/main"); ?>"
	  ng-init="successMessage = '<?= lang("setting_save_success_message") ?>';"
	  n-dirty-check="" n-focus-on-error="" ng-cloak="">
		  
	<input type="hidden" 
		   name="<?php echo $this->security->get_csrf_token_name(); ?>" 
		   value="<?php echo $this->security->get_csrf_hash();?>" />

	<div class="n-content n-single-page" ng-class="{'n-semi-collapse': mainForm.$dirty}">
		<div class="uk-panel uk-panel-box uk-margin-top">
			<div class="uk-panel-title uk-clearfix">
				<div class="uk-display-inline-block" style="padding-top: 5px">
					Base Cost by Regions / Places
				</div>
				<button type="button" class="uk-button uk-button-success uk-float-right"
						ng-click="addRegion(editingData)">
					<i class="uk-icon-plus"></i> New Region
				</button>
			</div>
			<hr/>
			<div class="uk-panel">
				<script type="text/ng-template" id="renderer.html">
					<div class="n-item uk-margin-top uk-form" ui-tree-handle>
						<div class="uk-grid uk-grid-small">
							<div class="uk-width-1-2">
								<a ng-click="toggle(this)" ng-if="region.regions && region.regions.length > 0">
									<i class="uk-icon-plus-square-o uk-icon-medium" ng-show="collapsed"></i>
									<i class="uk-icon-minus-square-o uk-icon-medium" ng-show="!collapsed"></i>
								</a>
								<i class="uk-icon-square uk-icon-medium" ng-if="!region.regions || !region.regions.length"></i>
								<div class="uk-display-inline-block uk-margin-left">
									<span ng-click="editTitle($event, region)" ng-show="!region.editing">
									{{region.title}}
									</span>
									<input type="text" class="uk-width-1-1 ng-hide" ng-show="region.editing" 
										   ng-model="region.title" ng-blur="region.editing = false"
										   ng-keydown="handleTitleKeyDown($event, region)" />
								</div>
							</div>
							<div class="uk-width-1-2 uk-text-right">
								<input type="text" class="n-cost-box uk-text-right" ng-model="region.cost" />
								<select ng-model="region.unit">
									<option value="Tour">Tour</option>
									<option value="Day">Day</option>
								</select>
								<button type="button" class="uk-button uk-button-success"
										ng-click="addRegion(region)">
									<i class="uk-icon-plus"></i>
								</button>
								<button type="button" class="uk-button uk-button-danger"
										ng-click="removeRegion(this)">
									<i class="uk-icon-minus"></i>
								</button>
							</div>
						</div>
					</div>
					<ol ui-tree-nodes="" ng-model="region.regions" ng-class="{'ng-hide': collapsed}">
						<li ng-repeat="region in region.regions" ui-tree-node ng-include="'renderer.html'"></li>
					</ol>
				</script>
				<div class="uk-panel uk-panel-box uk-margin-bottom n-region-root" ng-repeat="region in editingData.regions">
					<div class="n-header uk-panel-title uk-margin-bottom-remove">
						<div class="uk-grid">
							<div class="uk-width-1-2">
								<span ng-click="editTitle($event, region)" ng-show="!region.editing">
								{{region.title}}
								</span>
								<input type="text" class="uk-width-1-1 ng-hide" ng-show="region.editing" 
									   ng-model="region.title" ng-blur="region.editing = false"
									   ng-keydown="handleTitleKeyDown($event, region)" />
							</div>
							<div class="uk-width-1-2 uk-text-right">
								<button type="button" class="uk-button uk-button-success"
										ng-click="addRegion(region)">
									<i class="uk-icon-plus"></i>
								</button>
								<button type="button" class="uk-button uk-button-danger"
										ng-click="removeRootRegion(region)">
									<i class="uk-icon-minus"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="uk-grid uk-grid-small uk-margin-remove" ui-tree="regionTreeOptions" data-drag-delay="100">
						<ol ui-tree-nodes="" ng-model="region.regions" class="uk-width-1-1">
							<li ng-repeat="region in region.regions" ui-tree-node ng-include="'renderer.html'"></li>
						</ol>
					</div>
				</div>
			</div>


		</div>
    </div>
</form>