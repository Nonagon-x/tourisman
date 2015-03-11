<form name="mainForm" class="uk-form n-abs-fit" novalidate="" ng-submit="save($event)" 
	  ng-modules="setting-general" ng-controller="SettingGeneralController" 
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
					<i class="uk-icon-plus"></i> New
				</button>
			</div>
			<hr/>
			<div class="uk-panel">
				<div class="uk-panel uk-panel-box">
					<div class="uk-panel-title">
						Thailand
						<hr/>
					</div>
					<div class="n-item uk-grid uk-grid-small uk-margin-top">
						<div class="uk-width-1-2">
							<a><i class="uk-icon-plus-square-o uk-icon-medium"></i></a>
							<div class="uk-display-inline-block uk-margin-left">
								Around Thailand
							</div>
						</div>
						<div class="uk-width-1-2 uk-text-right">
							<span class="n-cost-box uk-alert uk-alert-success uk-display-inline-block">1,500 / Day</span>
							<button type="button" class="uk-button uk-button-success">
								<i class="uk-icon-plus"></i>
							</button>
						</div>
					</div>
					<div class="n-children-container">
						<div class="n-item">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-2">
									<a><i class="uk-icon-map-marker uk-icon-medium"></i></a>
									<div class="uk-display-inline-block uk-margin-left">
										Bangkok
									</div>
								</div>
								<div class="uk-width-1-2 uk-text-right">
									<span class="n-cost-box uk-alert uk-alert-warning uk-display-inline-block">500 / Tour</span>
									<button type="button" class="uk-button uk-button-success">
										<i class="uk-icon-plus"></i>
									</button>
								</div>
							</div>
						</div>
						<div class="n-item">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-2">
									<a><i class="uk-icon-map-marker uk-icon-medium"></i></a>
									<div class="uk-display-inline-block uk-margin-left">
										Rachaburi
									</div>
								</div>
								<div class="uk-width-1-2 uk-text-right">
									<span class="n-cost-box uk-alert uk-alert-warning uk-display-inline-block">500 / Tour</span>
									<button type="button" class="uk-button uk-button-success">
										<i class="uk-icon-plus"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>