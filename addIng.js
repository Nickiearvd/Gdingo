document.addEventListener("DOMContentLoaded", function adda() {

	document.getElementById('connectDrink').addEventListener('click', function (e) {
		e.preventDefault();
		var div = document.getElementById('AllIng');
		var ing = document.getElementById('ing1');
		var newText = document.createElement("li");
		ing.seletedIndex
		newText.innerText = ing[ing.seletedIndex].innerText;
		div.appendChild(newText);
		hiddenValue = ing[ing.seletedIndex].value;
		newHidden = document.createElement("input");
		newHidden.type = "hidden";
		newHidden.value = ing[ing.seletedIndex].value;
		newHidden.name = "ing1[]";
		div.appendChild(newHidden);
		ing.removeChild(ing[ing.seletedIndex]);

	})
})