
<!-- Original:  Shawn Seley -->
function wordcounter(this_field) {
	show_word_count = false;
	show_char_count = false;
	var char_count = this_field.value.length;
	var fullStr = this_field.value + " ";
	var initial_whitespace_rExp = /^[^A-Za-z0-9]+/gi;
	var left_trimmedStr = fullStr.replace(initial_whitespace_rExp, "");
	var non_alphanumerics_rExp = rExp = /[^A-Za-z0-9']+/gi;
	var cleanedStr = left_trimmedStr.replace(non_alphanumerics_rExp, " ");
	var splitString = cleanedStr.split(" ");
	var word_count = splitString.length -1;
	if (fullStr.length <2) {
	word_count = 0;
	}
	if (word_count == 0) {
	wordOrWords = " word";
	}
	else {
	wordOrWords = " words";
	}
	if (char_count == 1) {
	charOrChars = " character";
	} else {
	charOrChars = " characters";
	}
document.getElementById('counted').innerHTML = "    " + word_count + wordOrWords +  "\n";
}

//
