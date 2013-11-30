jQuery(document).ready(function(){

	
	//add all elements with data-gallery property
	//to array pathes
	var pathes= new Array();
		$('[data-gallery]').each(function(i)
			{
			pathes.push($(this).attr("href"));
			});
	// preload images
    preload(pathes);

function preload(images) {
    if (typeof document.body == "undefined") return;
    try {

        var div = document.createElement("div");
        var s = div.style;
		    s.position = "absolute";
        s.top = s.left = 0;
        s.visibility = "hidden";
        document.body.appendChild(div);
		div.innerHTML = "<img src=\"" + images.join("\" /><img src=\"") + "\" />";
		var lastImg = div.lastChild;
		lastImg.onload = function() { document.body.removeChild(document.body.lastChild); };
	 }
	 catch(e) {
        // Error. Do nothing.
	}
}
});