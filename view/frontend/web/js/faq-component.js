define([
    'uiComponent',
    'ko',
    'jquery'
], function (Component, ko, $) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Magebit_Faq/faq-component-tpl'
        },

        initialize: function () {
            this._super();

            this.fetchData();

            return this;
        },

        fetchData: function () {
            var self = this;

            $.ajax({
                url: 'http://magento.local/rest/V1/faqs',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    self.apiData(data);
                },
                error: function (error) {
                    console.error('Error fetching data:', error);
                },
            });
        },

        apiData: ko.observableArray([]),
    });
});
