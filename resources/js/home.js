const closeNav = document.querySelector('.nav__close');
const nav = document.querySelector('.nav__list');

openNav.addEventListener('click', () => {
    const navLeft = nav.getBoundingClientRect().left
    if(navLeft < 0){
        nav.style.left = 0;
        document.body.classList.add('active');
    }
});



closeNav.addEventListener('click', () => {
   const navLeft = nav.getBoundingClientRect().left
    if(navLeft === 0){
        nav.style.left = '-40rem';
        document.body.classList.remove('active');
    }
});


//smooth scroll
// ... rest syntax
const scrollLink = [... document.querySelectorAll('.scroll-link')];
scrollLink.forEach(link => {
    link.addEventListener('click', e => {
        const id = e.target.getAttribute('href').slice(1);
        const element = document.getElementById(id);
        const position = element.offsetTop;

        window.scrollTo({
            left: 0,
            top: position
        })

        nav.style.left = "-40rem";
        document.body.classList.remove("active");
    })
})

// Displays filtered beers
function filterSearch() {
    $('.searchResult').html('<div id="loading">Loading .....</div>');
    var action = "fetch_data";
    var brand = getFilterData("Brand_Name");
    var brewer = getFilterData("Brewer");
    var region = getFilterData("Origin_region");
    var country = getFilterData("Origin_Country")

    $.ajax({
        url:"action.php",
        method:"POST",
        dataType: "json",
        data:{action:action, Brand_Name:brand, Brewer:brewer, Origin_region:region, Origin_Country:country},
        success:function(data) {
            $('.searchResult').html(data.html);
        }
    });
}

// Finds checked categories
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function() {
		filter.push($(this).val());
	});
	return filter;
}