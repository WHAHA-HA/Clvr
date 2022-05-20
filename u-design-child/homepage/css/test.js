/*
*
* Write a Directive and necessary services for the implementation of the functional:
*
* Display user data in different forms depending on the type of user
*  - User types 'admin' 'customer'
*  - show all the fields available in the source data
*  - for 'admin' load and show responibilities list
*  - for 'customer' load and show purchased list
*
* Provide methods to view for actions related on user type.
* Implementation of these methods is not neccessary
*
*   Admin
*   ----------
*   + requestMerge(revisionId)
*   + submitIssue(issueText)
*
*   Customer
*   ---------
*   + sendEmail(text)
*   + addToGroup(groupId)
*
* Implementation requirements:
* Create "Classes" for both User types.
* 
* Create abstract Class to inherit common from.
*
* */


(function (undefined) {
	'use strict';

	function api($filter) {
		var _data = {
			users: [
				{
					id: 142,
					name: 'Jack',
					type: 'admin',
					age: 32,
					skills: ['unix', 'windows', 'http']
				},
				{
					id: 523,
					name: 'Bob',
					type: 'customer',
					age: 23,
					likes: ['shoes', 't-shirts', '<b>Clubs</b>&nbsp;<br/><i>bars</i>']
				}
			],

			responsibilities: {
				142: [
					{
						name: 'project 1'
					},
					{
						name: 'project 2'
					}
				]
			},

			purchasedItems: {
				523: [
					{
						name: 'adidas sneakers #24124'
					},
					{
						name: 'Jack Daniel\'s 18 years'
					}
				]
			}

		};

		this.getData = function (resourceName) { return _data[resourceName]; };
        
        this.getUser = function (type) {
            console.log(_data.users);
            return _data.users.filter(function(user) {
                console.log(user);
               return user.type == type;
            });
        };
	}
    
    function User() {
        var _user = [];
        
        return {
            setUser: function(user) {
                _user = user;
            },
            
            getUser: function() {
                return _user;
            }
        };
    }
    
    function Admin(User) {
        var admin = Object.create(User);
        
        var _responsibility = {};
        
        admin.setResponsibility = function (responsibility) {
            _responsibility = responsibility;
        };
        
        admin.getResponsibility = function () {
            return _responsibility;
        };
        
        return admin;
    }
    
    function Customer(User) {
        var customer = Object.create(User);
        
        var _responsibility = {};
        
        customer.setResponsibility = function (responsibility) {
            _responsibility = responsibility;
        };
        
        customer.getResponsibility = function () {
            return _responsibility;
        };
        
        return customer;
    }
    
	function PageController($scope, api, Admin, Customer) {
        $scope.data = {};
        
        var init = function() {
            Admin.setUser(api.getUser('admin'));
            Customer.setUser(api.getUser('customer'));
        }
        
        $scope.showAdmin = function () {
            $scope.data.user = Admin.getUser();
        }
        
        $scope.showCustomer = function () {
            $scope.data.user = Customer.getUser();
        }
        
        $scope.arrToStr(arr) {
            return arr.join();
        }       
        
        init();
	}

	angular.module('app', ['ng'])
		.service('api', api)
        .factory('User', User)
        .factory('Admin', Admin)
        .factory('Customer', Customer)
        .controller('PageController', PageController);

}).call(window && typeof window.document !== 'undefined' ? window : global);
