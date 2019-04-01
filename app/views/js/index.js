jQuery(document).ready(function ($) {
    // INIT VARS
    var ecc_submit = $('.ecc input[type="submit"]')[0];
    
    var def = {};
    def.apiKey = 'apiKey=' + '265279dd7a7ee6646676';
    def.apiPath = 'https://free.currencyconverterapi.com/';
    def.apiComands = {};
    def.apiComands.currencies = 'api/v6/currencies?';
    def.apiComands.convert = 'api/v6/convert?q=USD_PHP,PHP_USD&compact=ultra&';
    def.resFolder = $('#result');
    var data = {};

    // ACTION
    data.request = function () {
        // INIT VARS
        data.numm = $('.ecc #amount').val();
        data.from = $('.ecc #from').val();
        data.to = $('.ecc #to').val();
        data.fromSumb = $('.ecc #from').find('option:selected').attr('data-sumb');
        data.toSumb = $('.ecc #to').find('option:selected').attr('data-sumb');
        def.path = def.apiPath + 'api/v6/convert?q=' + data.from + '_' + data.to + '&compact=ultra&' + def.apiKey;

        // ACTION
        $.ajax({
            method: "GET",
            url: def.path,
            dataType: 'html',
            success: function (res) {
                var res = JSON.parse(res);
                $.each(res, function (index, value) {
                    var cur = index.split('_');
                    devData = '<h4>From ' + cur[0] + ' To ' + cur[1] + '  ' + data.numm + data.fromSumb + ' = ' + (value * data.numm) + data.toSumb + ' </h4>';
                    def.resFolder.prepend(devData);
                });
            }
        });
    }
    

    $(ecc_submit).on('click', function (e) {
        e.preventDefault();
        data.request();
    });
});