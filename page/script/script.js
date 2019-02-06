 // for (var i = 0; i < document.body.childNodes.length; i++) {
 //      alert( document.body.childNodes[i] ); }// Text, DIV, Text, UL, ..., SCRIPT
 var myfirst = function () {
 	var index = 5;
 	return function () {
 		return index;
 	};
 }

 var secondFunc = function () {
    var index = 15;
    console.log ( myfirst()() );
 };

secondFunc();