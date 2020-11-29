// Initializes search when input is passed from home page.
function filterSearch() {
    $('.searchResult').html('<div id="loading">Loading .....</div>');
    var action = 'fetch_data';
    var brand = getFilterData('Brand_Name');
    var brewer = getFilterData('Brewer');
    var region = getFilterData('Origin_region');
    var country = getFilterData('Origin_Country')
    $.ajax({
        url:"action.php",
        method:"POST",
        dataType: "json",
        data:{action:action, brand:brand, brewer=brewer, region=region, country=country},
        success:function(data){
            $('.searchResult').html(data.html);
        }
    });
}