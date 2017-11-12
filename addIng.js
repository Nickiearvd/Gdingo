// SOME OF THE CODES ARE BORROWED FROM MAXT ( VIDEO )


document.addEventListener("DOMContentLoaded", function () {

	document.getElementById('connectDrinkIng').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('IngToDrink');
		var ing = document.getElementById('Ingredients');
		var newText = document.createElement("li");
		ing.selectedIndex;

		newText.innerText = ing[ing.selectedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = ing[ing.selectedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = ing[ing.selectedIndex].value;
		newHidden.name = "Ingredients[]";
		div.appendChild(newHidden);
		ing.removeChild(ing[ing.selectedIndex]);
		remove = document.createElement("button");
		remove.innerText = "X";
		remove.type = "button";
		remove.setAttribute("class", "btn");
		newText.appendChild(remove);

	})
})

$(document).on("click", ".btn", function(){

		   $(this).parent('li').remove();

});


$(document).ready( function() { // Add a open class, enable to show or not the navigation 
	var button = $(".button2");
	var form = $(".ingredientForm");

	button.click( function(event) {
		event.preventDefault();
		form.toggleClass("open");
		button.toggleClass("open");
		
	} );

} );
