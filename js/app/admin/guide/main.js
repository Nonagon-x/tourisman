angular.module("guide-main", ['common', 'generic-modal', 'admin', 'ngAnimate', 'ui.tree'])

.controller("GuideMainController", ['$scope', 'submitForm', 'checkFormDirty', 
	function($scope, submitForm, checkFormDirty) {
	
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

	$scope.toggle = function(scope) {

		console.debug(scope);

		if(scope) {
			console.debug(scope);
			scope.toggle();
		}
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

	$scope.$on('init', function(event, args) {
		
		$scope.originalData = angular.copy($scope.editingData);
	});
}]);