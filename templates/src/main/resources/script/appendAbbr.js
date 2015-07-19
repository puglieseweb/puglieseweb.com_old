function StartPage(){
	addAbbrHelp(document.getElementById('main'));
	tabs('article nav ul');	
}

// initialize the function
onload = StartPage;

tabs = function(options) {
    
    var defaults = {  
        selector: '.tabs',
        selectedClass: 'selected'
    };  
    
    if(typeof options == 'string') defaults.selector = options;
    var options = $.extend(defaults, options); 

    return $(options.selector).each(function(){
                                
        var obj = this;	
        var targets = Array();

        function show(i){
            $.each(targets,function(index,value){
                $(value).hide();
            })
            $(targets[i]).fadeIn('fast');
            $(obj).children().removeClass(options.selectedClass);
            selected = $(obj).children().get(i);
            $(selected).addClass(options.selectedClass);
        };

        $('a',this).each(function(i){	
            targets.push($(this).attr('href'));
            $(this).click(function(e){
                e.preventDefault();
                show(i);
            });
        });
        
        show(0);

    });			
}

var addAbbrHelp = (function() {
	var abbrs = {
		'JPA' : 'Java Persistence API',
		'ORM' : 'Object-relational mapping',
		'JDBC': 'Java DataBase Connectivity',
		'GWT' : 'Google Web Toolkit',
		'POJO': 'Plain Old Java Object',
		'CDN' : 'Content Delivery Network',
		'XML' : 'Extensible Markup Language',
		'RPC' : 'Remote Procedure Calls - Application protocol'
	};
	

	
	return function(el) {
		var node, nodes = el.childNodes;
		var word, words;
		var adding, text, frag;
		var abbr, oAbbr = document.createElement('abbr');
		var frag, oFrag = document.createDocumentFragment()

		for ( var i = 0, iLen = nodes.length; i < iLen; i++) {
			node = nodes[i];

			if (node.nodeType == 3) { // if text node
				words = node.data.split(/\b/);
				adding = false;
				text = '';
				frag = oFrag.cloneNode(false);

				for ( var j = 0, jLen = words.length; j < jLen; j++) {
					word = words[j];

					if (word in abbrs) {
						adding = true;

						// Add the text gathered so far
						frag.appendChild(document.createTextNode(text));
						text = '';

						// Add the wrapped word
						abbr = oAbbr.cloneNode(false);
						abbr.title = abbrs[word];
						abbr.appendChild(document.createTextNode(word));
						frag.appendChild(abbr);

						// Otherwise collect the words processed so far
					} else {
						text += word;
					}
				}

				// If found some abbrs, replace the text
				// Otherwise, do nothing
				if (adding) {
					frag.appendChild(document.createTextNode(text));
					node.parentNode.replaceChild(frag, node);
				}

				// If found another element, add abbreviation help
				// to its content too
			} else if (node.nodeType == 1) {
				addAbbrHelp(node);
			}
		}
	}
}());

