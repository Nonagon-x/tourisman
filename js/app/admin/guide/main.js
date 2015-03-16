angular.module("guide-main", ['common', 'generic-modal', 'admin', 'ngAnimate', 'ui.tree'])

.controller("GuideMainController", ['$scope', 'submitForm', 'checkFormDirty', 'modal',
	function($scope, submitForm, checkFormDirty, modal) {
	
	$scope.regionTreeOptions = {};
	$scope.editingData = {};

	$scope.editingData.regions = [{
			id: 1,
			title: "Thailand",
			regions: [{

				id: 2,
				title: "Around Thailand",
				cost: 1500,
				unit: "Day",
				regions: [{

					id: 3,
					title: "Bangkok",
					cost: 500,
					unit: "Tour",
					regions: []
				}, {

					id: 6,
					title: "Ratchaburi",
					cost: 800,
					unit: "Tour",
					regions: []
				}]
			}]
		}, {

			id: 8,
			title: "Laos",
			regions: []
		}
	];

	$scope.addRegion = function(parent) {

		var data = {

			title: "Untitled",
			regions: []
		};

		if(parent != $scope.editingData) {

			data.unit = "Day";
		}

		parent.regions.push(data);
	};

	$scope.removeRegionConfirmation = function(proceed) {

		modal.show(
			"Are you sure you want to remove this item?<br/>" +
			"All children items will be also removed if presented.", 
			"Confirmation", {
				
				danger: true,
				bgclose: true,
				icon: "exclamation-circle"
			})
			.ok(function() {
				
				proceed();
			});
	}

	$scope.removeRegion = function(scope) {

		$scope.removeRegionConfirmation(function() {

			scope.remove();
		});
	}

	$scope.removeRootRegion = function(region) {

		$scope.removeRegionConfirmation(function() {

			$scope.editingData.regions = $.grep($scope.editingData.regions, function(item) {

				return item != region;
			});
		});
	}

	$scope.toggle = function(scope) {

		scope.toggle();
	}

	$scope.save = function($event) {
		
		if($event)
			$event.preventDefault();
		
		submitForm($scope, $scope.mainForm, "POST",
			$event.target.attributes.action.value, $scope.editingData).
			success(function(data, status, headers, config) {
				
				$scope.originalData = angular.copy($scope.editingData);
				
				$scope.mainForm.$setPristine(); 
				$scope.mainForm.$setUntouched();
				
				UIkit.notify("<i class='uk-icon-check'></i> " + 
					$scope.successMessage, { status: "success", timeout: 1000, pos: "top-right" });
			});
	}
	
	$scope.cancel = function() {
		
		checkFormDirty($scope.mainForm).confirm(function() {
			
			$scope.editingData = angular.copy($scope.originalData);
			
			$scope.mainForm.$setPristine(); 
			$scope.mainForm.$setUntouched();
		});
	}

	$scope.editTitle = function($event, region) {

		region.editing = true;
		region.__titleBackup = region.title;

		setTimeout(function() {

			var input = $($event.target).parent().find('input[type=text]');

			input.focus();
			input.select();

		}, 100);
	}

	$scope.handleTitleKeyDown = function($event, region) {

		if($event.keyCode == 13 || $event.keyCode == 27) {

			region.editing = false;

			if($event.keyCode == 27) {

				region.title = region.__titleBackup;
			}
		}
	}

	$scope.$on('init', function(event, args) {
		
		$scope.originalData = angular.copy($scope.editingData);
	});
}]);